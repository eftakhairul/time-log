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


    public function getAll($options = array())
    {
        $fields = "{$this->table}.{$this->primaryKey},
                   {$this->table}.note,
                   {$this->table}.date,
                   {$this->table}.hours,
                   {$this->table}.mins,
                   projects.title as project_title,
                   teams.title as team_title";

        $this->db->select($fields);
        $this->_setQueryParts($options);

        $this->db->orderby("{$this->table}.date ASC");
        $this->db->limit($this->config->item('rowsPerPage'), $options['page']);

        return $this->db->get()->result_array();
    }
}