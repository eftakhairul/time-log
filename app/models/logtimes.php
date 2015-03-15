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


    /**
     * Return all entries based filter parameter
     *
     * @param array $options
     * @return mixed
     */
    public function getAll($options = array())
    {
        $fields = "{$this->table}.{$this->primaryKey},
                   {$this->table}.notes,
                   {$this->table}.date,
                   {$this->table}.hours,
                   {$this->table}.mins,
                   users.username as username,
                   projects.title as project_title,
                   teams.title as team_title";

        $this->db->select($fields);
        $this->db->from($this->table);
        $this->db->join('projects', "projects.id = {$this->table}.project_id");
        $this->db->join('teams', "teams.id = {$this->table}.team_id");
          $this->db->join('users', "users.id = {$this->table}.user_id");
        $this->_setQueryParts($options);

        $this->db->order_by("{$this->table}.date ASC");

        if(!empty($options['page'])) {
            $this->db->limit($this->config->item('rowsPerPage'), $options['page']);
        }

        return $this->db->get()->result_array();
    }

    /**
     * Return only this week data
     *
     * @param array $options
     * @return mixed
     */
    public function getWeeklyData($options = array())
    {
        $fields = "{$this->table}.{$this->primaryKey},
                   {$this->table}.notes,
                   {$this->table}.date,
                   {$this->table}.hours,
                   {$this->table}.mins
                   projects.title as project_title,
                   teams.title as team_title";

        $this->db->select($fields);
        $this->dn->from($this->table);
        $this->db->join('projects', "projects.id = {$this->table}.project_id");
        $this->db->join('teams', "teams.id = {$this->table}.team_id");
        $this->db->where("YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)");
        $this->_setQueryParts($options);

        $this->db->order_by("{$this->table}.date ASC");


        if(!empty($options['page'])) {
            $this->db->limit($this->config->item('rowsPerPage'), $options['page']);
        }

        return $this->db->get()->result_array();
    }
}