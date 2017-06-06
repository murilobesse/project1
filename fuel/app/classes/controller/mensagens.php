<?php
class Controller_Mensagens extends Controller_Template
{

	public function action_index()
	{
		$data['mensagens'] = Model_Mensagen::find('all');
		$this->template->title = "Mensagens";
		$this->template->content = View::forge('mensagens/index', $data);

	}

	public function action_view($id = null)
	{
		session_start();
		is_null($id) and Response::redirect('mensagens');

		if ( ! $data['mensagen'] = Model_Mensagen::find($id))
		{
			Session::set_flash('error', 'Could not find mensagen #'.$id);
			Response::redirect('mensagens');
		}
		
		$entry = Model_Mensagen::find($id);
		if ($entry->read = 'false')
		{
			$entry->read = 'true';
			$entry->save();
		}
		
		$this->template->title = "Mensagen";
		$this->template->content = View::forge('mensagens/view', $data);

	}

	public function action_create($id = null)
	{
		session_start();
		if (Input::method() == 'POST')
		{
			$val = Model_Mensagen::validate('create');

			if ($val->run())
			{
				$mensagen = Model_Mensagen::forge(array(
					'mensagem' => Input::post('mensagem'),
					'idusersend' => Input::post('idusersend'),
					'iduserreceived' => Input::post('iduserreceived'),
					'data' => Input::post('data'),
					'read' => Input::post('read'),
				));

				if ($mensagen and $mensagen->save())
				{
					Response::redirect('user/minhasmensagens');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		
		$data['users'] = Model_User::find($id);
		$this->template->title = "Criar Mensagem";
		$this->template->content = View::forge('mensagens/create', $data);

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('mensagens');

		if ( ! $mensagen = Model_Mensagen::find($id))
		{
			Session::set_flash('error', 'Could not find mensagen #'.$id);
			Response::redirect('mensagens');
		}

		$val = Model_Mensagen::validate('edit');

		if ($val->run())
		{
			$mensagen->mensagem = Input::post('mensagem');
			$mensagen->idusersend = Input::post('idusersend');
			$mensagen->iduserreceived = Input::post('iduserreceived');
			$mensagen->read = Input::post('read');

			if ($mensagen->save())
			{
				Session::set_flash('success', 'Updated mensagen #' . $id);

				Response::redirect('mensagens');
			}

			else
			{
				Session::set_flash('error', 'Could not update mensagen #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$mensagen->mensagem = $val->validated('mensagem');
				$mensagen->idusersend = $val->validated('idusersend');
				$mensagen->iduserreceived = $val->validated('iduserreceived');
				$mensagen->read = $val->validated('read');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('mensagen', $mensagen, false);
		}

		$this->template->title = "Mensagens";
		$this->template->content = View::forge('mensagens/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('mensagens');

		if ($mensagen = Model_Mensagen::find($id))
		{
			$mensagen->delete();

		}


		Response::redirect('user/minhasmensagens');

	}
	
	public function action_selecionarUsuario($id = null)
	{
		session_start();
		$data['users'] = Model_User::find('all');
		$this->template->title = "Selecionar Usuário";
		$this->template->content = View::forge('mensagens/selecionarUsuario', $data);

	}

}
