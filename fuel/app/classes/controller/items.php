<?php
class Controller_Items extends Controller_Template
{

	public function action_index()
	{
		$data['items'] = Model_Item::find_all();
		$this->template->title = "Items";
		$this->template->content = View::forge('items/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('items');

		$data['item'] = Model_Item::find_by_pk($id);

		$this->template->title = "Item";
		$this->template->content = View::forge('items/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Item::validate('create');

			if ($val->run())
			{
				$item = Model_Item::forge(array(
					'id_items' => Input::post('id_items'),
					'nombre_items' => Input::post('nombre_items'),
					'tinta_items' => Input::post('tinta_items'),
				));

				if ($item and $item->save())
				{
					Session::set_flash('success', 'Added item #'.$item->id.'.');
					Response::redirect('items');
				}
				else
				{
					Session::set_flash('error', 'Could not save item.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Items";
		$this->template->content = View::forge('items/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('items');

		$item = Model_Item::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Item::validate('edit');

			if ($val->run())
			{
				$item->id_items = Input::post('id_items');
				$item->nombre_items = Input::post('nombre_items');
				$item->tinta_items = Input::post('tinta_items');

				if ($item->save())
				{
					Session::set_flash('success', 'Updated item #'.$id);
					Response::redirect('items');
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

		$this->template->set_global('item', $item, false);
		$this->template->title = "Items";
		$this->template->content = View::forge('items/edit');

	}

	public function action_delete($id = null)
	{
		if ($item = Model_Item::find_one_by_id($id))
		{
			$item->delete();

			Session::set_flash('success', 'Deleted item #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete item #'.$id);
		}

		Response::redirect('items');

	}

}
