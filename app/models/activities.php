<?php
/**
 * Description of Users
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */

class Activities extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('activities', 'id');
    }
}