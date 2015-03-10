<?php
/**
 * Description of Users
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>
 */

class Users extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('users', 'id');
    }

    /**
     *  Check username and password
     *
     * @param $data
     * @return bool| array
     */
    public function validateUser($data)
    {
        if (!empty ($data['password'])) {
            $data['password'] = sha1($data['password']);
        }

        return $this->find($data, 'username, id');
    }
}