<?php
/**
 * Description of Users
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */

class Statuses extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('statuses', 'id');
    }
}