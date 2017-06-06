<?php
class Controller_User extends Controller_Template
{

	public function action_index()
	{
		session_start();
		if (isset($_SESSION["userId"]))
		{
			$data['users'] = Model_User::find($_SESSION["userId"]);
			$this->template->title = "Users";
			$this->template->content = View::forge('user/index', $data);
		}		
		else
		{
			//echo $_SESSION["userId"];
			//$data['users'] = Model_User::find($_SESSION["userId"]);
			//$this->template->title = "Users";
			//$this->template->content = View::forge('user/index', $data);
		}
	}

	public function action_view($id = null)
	{
		session_start();
		is_null($id) and Response::redirect('user');
		
		if ( ! $data['user'] = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('user');
		}

		$this->template->title = "User";
		$this->template->content = View::forge('user/meusAmigosSecretos', $data);

	}
	
	public function action_meusAmigosSecretos($id = null)
	{
	
		session_start();
			is_null($id) and Response::redirect('user');
			if ( ! $data['user'] = Model_User::find($id))
			{
				$amigosecretos = Model_Amigosecreto::find('all');
				$data->users = $user;
				Session::set_flash('error', 'Could not find user #'.$id);
				Response::redirect('user');
			}

			$this->template->title = "Meus Amigos Secretos";
			$this->template->content = View::forge('user/meusAmigosSecretos', $data);

	}
	
		
	public function action_minhasMensagens()
	{
		session_start();
		$data['mensagens'] = Model_Mensagen::find('all', array('where' => array(array('iduserreceived', '=', $_SESSION["userId"])), 'related' => array('users')));
		$this->template->title = "Mensagens";
		$this->template->content = View::forge('user/minhasMensagens', $data);

	}

	public function action_create()
	{
		session_start();
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'name' => Input::post('name'),
					'lastname' => Input::post('lastname'),
					'email' => Input::post('email'),
					'pass' => Input::post('pass'),
				));

				if ($user and $user->save())
				{
					$_SESSION["userId"] = $user->id;
					$_SESSION["userName"] = Input::post('name');
					
					$query = DB::insert('mensagens');
					$query->set(array(
						'mensagem' => 'Seja bem vindo ao Amigo X.',
						'idUserSend' => -1,
						'idUserReceived' => $_SESSION["userId"],
						'read' => 'false',
						'data' => date('Y-m-d'),
					));
					$query->execute();
					Response::redirect('user/index');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Cadastro";
		$this->template->content = View::forge('user/create');

	}

	public function action_edit($id = null)
	{
		session_start();
		is_null($id) and Response::redirect('user');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('user');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->name = Input::post('name');
			$user->lastname = Input::post('lastname');
			$user->email = Input::post('email');
			$user->pass = Input::post('pass');

			$_SESSION["userId"] = $id;
			$_SESSION["userName"] = Input::post('name');
			
			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' . $id);
				
				$this->template->title = "Users";
				$this->template->content = View::forge('user/index');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->name = $val->validated('name');
				$user->lastname = $val->validated('lastname');
				$user->email = $val->validated('email');
				$user->pass = $val->validated('pass');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('user');

		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('user');

	}
	
	public function action_login()
	{
		//$user = null;
		if (Input::method() == 'POST')
		{
			$query = DB::select('*')->from('users');
			$query->where('name', Input::post('name'));
			$query->where('pass', Input::post('pass'));
			$user = $query->execute()->as_array();

			if (count($user) > 0)
			{
				session_start();
				$_SESSION["userId"] = $user[0]['id'];
				$_SESSION["userName"] = $user[0]['name'];
				
				$user = Model_User::find($user[0]['id']);
				$this->template->set_global('user', $user, false);
				
				//$this->template->title = "Home";
				//$this->template->content = View::forge('user/index');
				Response::redirect('user/index');
			}
			else
			{
				Session::set_flash('error', 'E-mail ou senha inválidos #');
				$this->template->title = "Login";
				$this->template->content = View::forge('user/login');
			}
		}
		else
		{
			$this->template->title = "Login";
			$this->template->content = View::forge('user/login');
		}
	}
	
	public function action_logout()
	{
		session_start();
		session_destroy();
		$this->template->title = "Login";
		$this->template->content = View::forge('welcome/index');
		//return Response::forge(View::forge('welcome/index'));
	}
	

}
