<?php
use Orm\Model;

class Model_User extends Model
{
	
	protected static $_properties = array(
		'id',
		'name',
		'lastname',
		'email',
		'pass',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('lastname', 'Lastname', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('pass', 'Pass', 'required|max_length[255]');

		return $val;
	}
	
	protected static $_many_many = array(
    'amigosecretos' => array(
        'key_from' => 'id',
        'key_through_from' => 'idUser', // column 1 from the table in between, should match a posts.id
        'table_through' => 'userxamigosecretos', // both models plural without prefix in alphabetical order
        'key_through_to' => 'idAmigosSecreto', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Amigosecreto',
        'key_to' => 'id',
		)
	);
}
