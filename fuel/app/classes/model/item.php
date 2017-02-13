<?php
class Model_Item extends Model_Crud
{
	protected static $_table_name = 'items';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id_items', 'Id Items', 'required|valid_string[numeric]');
		$val->add_field('nombre_items', 'Nombre Items', 'required|max_length[255]');
		$val->add_field('tinta_items', 'Tinta Items', 'required|max_length[255]');

		return $val;
	}

}
