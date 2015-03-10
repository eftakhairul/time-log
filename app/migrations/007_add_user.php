<?php
/**
 * Migration File
 * Create users table
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
class Migration_add_user extends CI_Migration {


    public function up()
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS `users` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `username` varchar(300) NOT NULL,
                          `password` varchar(300) NOT NULL,
                          `last_logged_in` datetime DEFAULT NULL,
                          `created_on` datetime NOT NULL,
                          `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                          PRIMARY KEY (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHARSET=utf8 AUTO_INCREMENT=1;");
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}