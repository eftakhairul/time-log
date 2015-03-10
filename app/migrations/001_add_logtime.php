<?php
/**
 * Migration File
 * Create logtimes table
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
class Migration_add_logtime extends CI_Migration {


    public function up()
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS `logtimes` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `user_id` int(11) NOT NULL,
                          `project_id` int(11) NOT NULL,
                          `team_id` int(11) NOT NULL,
                          `status_id` int(11) NOT NULL,
                          `type_id` int(11) NOT NULL,
                          `activity_id` int(11) NOT NULL,
                          `date` date NOT NULL,
                          `created_on` datetime NOT NULL,
                          `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                          `notes` text,
                          `hours` int(11) DEFAULT NULL,
                          `mins` int(11) DEFAULT NULL,
                          PRIMARY KEY (`id`),
                          KEY `user_id` (`user_id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHARSET=utf8 AUTO_INCREMENT=1;");
	}

	public function down()
	{
		$this->dbforge->drop_table('logtimes');
	}
}