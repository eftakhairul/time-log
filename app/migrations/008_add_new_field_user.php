<?php
/**
 * Migration File
 * 
 * Add new field to user table
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
class Migration_add_new_field_user extends CI_Migration {


    public function up()
	{
		$this->db->query("ALTER TABLE `users` ADD `type` TINYINT( 1 ) NOT NULL ;");
	}

	public function down()
	{
		$this->dbforge->drop_table('ALTER TABLE `users` DROP `type`;');
	}
}