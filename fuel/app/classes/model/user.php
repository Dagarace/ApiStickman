<?php
class Model_User extends Model_Crud
{
	protected static $_table_name = 'users';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id_user', 'Id User', 'required|valid_string[numeric]');
		$val->add_field('url_foto', 'Url Foto', 'required|max_length[255]');
		$val->add_field('email_user', 'Email User', 'required|max_length[255]');
		$val->add_field('password_user', 'Password User', 'required|max_length[255]');

		return $val;
	}

}
