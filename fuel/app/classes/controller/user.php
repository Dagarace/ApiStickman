<?php
class Controller_User extends Controller_Template
{

	public function action_index()
	{
		$data['users'] = Model_User::find_all();
		$this->template->title = "Users";
		$this->template->content = View::forge('user/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('user');

		$data['user'] = Model_User::find_by_pk($id);

		$this->template->title = "User";
		$this->template->content = View::forge('user/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'id_user' => Input::post('id_user'),
					'url_foto' => Input::post('url_foto'),
					'email_user' => Input::post('email_user'),
					'password_user' => Input::post('password_user'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', 'Added user #'.$user->id.'.');
					Response::redirect('user');
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

		$this->template->title = "Users";
		$this->template->content = View::forge('user/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('user');

		$user = Model_User::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('edit');

			if ($val->run())
			{
				$user->id_user = Input::post('id_user');
				$user->url_foto = Input::post('url_foto');
				$user->email_user = Input::post('email_user');
				$user->password_user = Input::post('password_user');

				if ($user->save())
				{
					Session::set_flash('success', 'Updated user #'.$id);
					Response::redirect('user');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('user', $user, false);
		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');

	}

	public function action_delete($id = null)
	{
		if ($user = Model_User::find_one_by_id($id))
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

}
