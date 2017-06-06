<?php
use Orm\Model;

class Model_Amigosecreto extends Model
{
	protected static $_properties = array(
		'id',
		'descricao',
		'iduserowner',
		'sorteado',
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
		$val->add_field('descricao', 'Descricao', 'required|max_length[255]');
		$val->add_field('iduserowner', 'Iduserowner', 'required|valid_string[numeric]');

		return $val;
	}
	
	protected static $_many_many = array(
    'users' => array(
        'key_from' => 'id',
        'key_through_from' => 'idAmigosSecreto', // column 1 from the table in between, should match a posts.id
        'table_through' => 'userxamigosecretos', // both models plural without prefix in alphabetical order
        'key_through_to' => 'idUser', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_User',
        'key_to' => 'id',
		)
	);

}
