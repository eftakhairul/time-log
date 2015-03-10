<?php

/**
 * Description of Log Times
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */
class Logtimes extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('logtimes', 'id');
    }
}