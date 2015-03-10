<?php
/**
 * Migration File
 * Create teams table
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
class Migration_add_team extends CI_Migration {


    public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
			'type' => 'INT',
			'constraint' => 5,
			'unsigned' => TRUE,
			'auto_increment' => TRUE
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
		$this->dbforge->create_table('teams');
	}

	public function down()
	{
		$this->dbforge->drop_table('teams');
	}
}