<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User_phone_model extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'device_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'users_id' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
			'device_brand' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
			'device_model' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
			'device_unique_id' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
            'status' => array(
                    'type' => 'INT',
                    'constraint' => 1,
                    'null' => TRUE,
            ),
            'dt_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'dt_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
		));
                
        $this->dbforge->add_key('device_id', TRUE);
		$this->dbforge->create_table('users_device', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('users_device');
	}
}
