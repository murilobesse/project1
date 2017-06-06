<?php
class Controller_Amigosecreto extends Controller_Template
{

	public function action_index()
	{
		$data['amigosecretos'] = Model_Amigosecreto::find('all');
		$this->template->title = "Amigosecretos";
		$this->template->content = View::forge('amigosecreto/index', $data);

	}

	public function action_view($id = null)
	{
		session_start();
		is_null($id) and Response::redirect('amigosecreto');
		
		$_SESSION["amigoSecretoId"] = $id;
		
		if ( ! $data['amigosecreto'] = Model_Amigosecreto::find($id))
		{
			$user = Model_User::find('all');
			$data->users = $user;
			Session::set_flash('error', 'Could not find amigosecreto #'.$id);
			Response::redirect('amigosecreto');
		}

		$this->template->title = "Amigosecreto";
		$this->template->content = View::forge('amigosecreto/view', $data);

	}

	public function action_create()
	{
		session_start();
		if (Input::method() == 'POST')
		{
			$val = Model_Amigosecreto::validate('create');

			if ($val->run())
			{
				$amigosecreto = Model_Amigosecreto::forge(array(
					'descricao' => Input::post('descricao'),
					'iduserowner' => Input::post('iduserowner'),
				));

				if ($amigosecreto and $amigosecreto->save())
				{
					//Session::set_flash('success', 'Added amigosecreto #'.$amigosecreto->id.'.');
					$query = DB::insert('userxamigosecretos');
					$query->set(array(
						'idUser' => $_SESSION["userId"],
						'idAmigosSecreto' => $amigosecreto->id,
					));
					$query->execute();
					
					Response::redirect('amigosecreto/view/'.$amigosecreto->id);
				}

				else
				{
					Session::set_flash('error', 'Could not save amigosecreto.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Amigosecretos";
		$this->template->content = View::forge('amigosecreto/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('amigosecreto');

		if ( ! $amigosecreto = Model_Amigosecreto::find($id))
		{
			Session::set_flash('error', 'Could not find amigosecreto #'.$id);
			Response::redirect('amigosecreto');
		}

		$val = Model_Amigosecreto::validate('edit');

		if ($val->run())
		{
			$amigosecreto->descricao = Input::post('descricao');

			if ($amigosecreto->save())
			{
				Session::set_flash('success', 'Updated amigosecreto #' . $id);

				Response::redirect('amigosecreto');
			}

			else
			{
				Session::set_flash('error', 'Could not update amigosecreto #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$amigosecreto->descricao = $val->validated('descricao');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('amigosecreto', $amigosecreto, false);
		}

		$this->template->title = "Amigosecretos";
		$this->template->content = View::forge('amigosecreto/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('amigosecreto');

		if ($amigosecreto = Model_Amigosecreto::find($id))
		{
			$amigosecreto->delete();

			Session::set_flash('success', 'Deleted amigosecreto #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete amigosecreto #'.$id);
		}

		Response::redirect('amigosecreto');

	}
	
	public function action_deleteParticipante($id = null)
	{
		session_start();
		
		is_null($id) and Response::redirect('amigosecreto');
		
		$query = DB::delete('userxamigosecretos');
		$query->where('idUser', $id);
		$query->where('idAmigosSecreto', $_SESSION["amigoSecretoId"]);
		
		$query->execute();
		
		if ( ! $data['amigosecreto'] = Model_Amigosecreto::find($_SESSION["amigoSecretoId"]))
		{
			$user = Model_User::find('all');
			$data->users = $user;
			Session::set_flash('error', 'Could not find amigosecreto #'.$id);
			Response::redirect('amigosecreto');
		}
		
		Response::redirect('amigosecreto/view/' . $_SESSION["amigoSecretoId"]);
		//$this->template->title = "Amigosecreto";
		//$this->template->content = View::forge('amigosecreto/view', $data);
	}
	
	public function action_addParticipante($id = null)
	{
		session_start();
		
		$query = DB::insert('userxamigosecretos');
		$query->set(array(
			'idUser' => $id,
			'idAmigosSecreto' => $_SESSION["amigoSecretoId"],
		));
		$query->execute();
		
		Response::redirect('amigosecreto/adicionarParticipantes/'.$_SESSION["amigoSecretoId"]);
		
	}
	
	public function action_adicionarParticipantes($id = null)
	{
		session_start();
		
		if (isset($_SESSION["userId"]))
		{
			is_null($id) and Response::redirect('amigosecreto');
		
			if ( ! $data['amigosecreto'] = Model_Amigosecreto::find($id))
			{
				$data['user'] = Model_User::find('all');
				$users = Model_User::find('all');
				$data->users = $users;
			}
			$data['users'] = Model_User::find('all');
			$this->template->title = "Adicionar Participantes";
			$this->template->content = View::forge('amigosecreto/adicionarParticipantes', $data);
		}
	}
	
	public function insertSortUser($sortUser = null, $idUser = null, $idAmigoSecreto = null)
	{
		$query = DB::update('userxamigosecretos');
		$query->value('idUserSort', $sortUser);
		$query->where('idUser', $idUser);
		$query->where('idAmigosSecreto', $idAmigoSecreto);
		$query->execute();
	}
	
	public function sendMesageAmigoSecreto($descricao = null, $nameSort = null, $lastnameSort = null, $idUser)
	{
		$query = DB::insert('mensagens');
		$query->set(array(
			'mensagem' => 'Sorteio amigo secreto: ' . $descricao . ' | Seu amigo é: ' . $nameSort . ' ' . $lastnameSort,
			'idUserSend' => -1,
			'idUserReceived' => $idUser,
			'read' => 'false',
			'data' => date('Y-m-d'),
		));
		$query->execute();
	}
	
	public function action_sorteio($id = null)
	{
			session_start();
			is_null($id) and Response::redirect('amigosecreto');
			
			if ( ! $data['amigosecreto'] = Model_Amigosecreto::find($id))
			{
				$user = Model_User::find('all');
				$data->users = $user;
				Session::set_flash('error', 'Could not find amigosecreto #'.$id);
				Response::redirect('amigosecreto');
			}

			sort($data['amigosecreto']->users);
			foreach ($data['amigosecreto']->users as $amigo)
			{
				$a[] = $amigo->id;
			}
			
			rsort($data['amigosecreto']->users);
			foreach ($data['amigosecreto']->users as $amigo)
			{
				$b[] = $amigo->id;
			}

			//1º user -> ultimo user
			$this->insertSortUser($b[0], $a[0], $id);
			$query = DB::select('*')->from('users');
			$query->where('id', $b[0]);
			$userSort = $query->execute()->as_array();

			$this->sendMesageAmigoSecreto($data['amigosecreto']->descricao, $userSort[0]['name'], $userSort[0]['lastName'], $a[0]);

			unset($a[0]);
			unset($b[0]);
			
			$x = 0;
			do
			{
				$aux1 = array_rand($a, 1);
				$aux2 = array_rand($b, 1);
				
				if ($a[$aux1] <> $b[$aux2])
				{ 
					$this->insertSortUser($b[$aux2], $a[$aux1], $id);
					
					$query = DB::select('*')->from('users');
					$query->where('id', $b[$aux2]);
					$user = $query->execute()->as_array();
					
					$this->sendMesageAmigoSecreto($data['amigosecreto']->descricao, $userSort[0]['name'], $userSort[0]['lastName'], $a[$aux1]);
					
					unset($a[$aux1]);
					unset($b[$aux2]);
					$x++;
				}
			}while($x < count($data['amigosecreto']->users) -1);

			$query = DB::update('amigosecretos');
			$query->value('sorteado', 'true');
			$query->where('id', $id);
			$query->execute();
			
			Response::redirect('amigosecreto/view/' . $id);
	}
}
