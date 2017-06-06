<?php
use Orm\Model;

class Model_Mensagen extends Model
{
	protected static $_properties = array(
		'id',
		'mensagem',
		'idusersend',
		'iduserreceived',
		'read',
		'data'
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
		$val->add_field('mensagem', 'Mensagem', 'required');
		$val->add_field('idusersend', 'Idusersend', 'required|valid_string[numeric]');
		$val->add_field('iduserreceived', 'Iduserreceived', 'required|valid_string[numeric]');
		$val->add_field('read', 'Read', 'required|max_length[255]');
		$val->add_field('data', 'Data', 'required');

		return $val;
	}
	protected static $_belongs_to = array(
		'users' => array(
			'key_from' => 'idusersend',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		)
	);
}
