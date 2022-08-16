<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Quotes extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'quote_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'quote' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
			'author' => array(
				'type' => 'VARCHAR',
				'constraint' => '16',
				'null' => TRUE,
			),
            'image' => array(
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
                
        $this->dbforge->add_key('quote_id', TRUE);
		$this->dbforge->create_table('quotes', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('quotes');
	}
}
