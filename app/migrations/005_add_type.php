<?php
/**
 * Migration File
 * Create types table
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
class Migration_add_type extends CI_Migration {


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
			'constraint' => '100'
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('types');
	}

	public function down()
	{
		$this->dbforge->drop_table('types');
	}
}