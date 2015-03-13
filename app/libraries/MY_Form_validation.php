<?php

class MY_Form_validation extends CI_Form_validation
{
    public function  __construct ()
    {
        parent::__construct();
        $this->set_error_delimiters('','');
    }

    public function setRulesForCreateEntry()
    {
        $config = array(
            array(
                'field' => 'project_id',
                'label' => 'Porject name',
                'rules' => 'required'
            ),
             array(
                'field' => 'team_id',
                'label' => 'Team',
                'rules' => 'required'
            ),
            array(
                'field' => 'status_id',
                'label' => 'Status',
                'rules' => 'required'
            ),
            array(
                'field' => 'type_id',
                'label' => 'Type',
                'rules' => 'required'
            ),
            array(
                'field' => 'activity_id',
                'label' => 'Activity',
                'rules' => 'required'
            ),
            array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'required'
            ),
        );

        $this->set_rules($config);
    }

    
    public function setRulesForSignIn()
    {
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|alpha'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            )
        );

        $this->set_rules($config);
    }
}