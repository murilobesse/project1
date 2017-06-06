<?php

namespace Fuel\Migrations;

class Create_mensagens
{
	public function up()
	{
		\DBUtil::create_table('mensagens', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'mensagem' => array('constraint' => 255, 'type' => 'varchar'),
			'idUserSend' => array('constraint' => 11, 'type' => 'int'),
			'idUserReceived' => array('constraint' => 11, 'type' => 'int'),
			'read' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('mensagens');
	}
}