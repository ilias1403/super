<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
                                'null' => TRUE,
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '16',
				'null' => TRUE,
			),
            'password' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'user_status' => array(
                    'type' => 'INT',
                    'constraint' => 1,
                    'null' => TRUE,
            ),
			'fcm_token' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
            'dt_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'dt_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
		));
                
        $this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->create_table('users', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
