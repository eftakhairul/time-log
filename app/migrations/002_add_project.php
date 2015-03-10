<?php
/**
 * Migration File
 * Create projects table
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
class Migration_add_project extends CI_Migration {


    public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
			'type' => 'INT',
            'constraint' => '11',
			'auto_increment' => TRUE,
                'unsigned' => TRUE,
			),

			'title' => array(
			'type' => 'VARCHAR',
			'constraint' => '100',

			),

			'description' => array(
			'type' => 'TEXT',
			'null' => TRUE,
			),
		));

        $this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('projects');
	}

	public function down()
	{
		$this->dbforge->drop_table('projects');
	}
}