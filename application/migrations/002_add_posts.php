<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Posts extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'post_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'post_title' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
			'post_body' => array(
                'type' => 'TEXT',
                'null' => TRUE,
			),
			'author' => array(
				'type' => 'VARCHAR',
				'constraint' => '16',
				'null' => TRUE,
			),
			'category' => array(
				'type' => 'VARCHAR',
				'constraint' => '16',
				'null' => TRUE,
			),
            'cover_image' => array(
                'type' => 'TEXT',
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
			'likes' => array(
				'type' => 'INT',
				'constraint' => 11,
                'null' => TRUE,
			),
            'dt_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'dt_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
		));
                
        $this->dbforge->add_key('post_id', TRUE);
		$this->dbforge->create_table('posts', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('quotes');
	}
}
