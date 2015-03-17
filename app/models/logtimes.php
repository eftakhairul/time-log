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

        $this->db->join('projects', "projects.id = {$this->table}.project_id");
        $this->db->join('teams', "teams.id = {$this->table}.team_id");
        $this->db->join('users', "users.id = {$this->table}.user_id");
        $this->_setQueryParts($options);

        $this->db->order_by("{$this->table}.date ASC");


        return $this->db->get()->result();
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
                   {$this->table}.mins,
                   users.username as username,
                   projects.title as project_title,
                   teams.title as team_title";

        $this->db->select($fields);
        $this->db->join('projects', "projects.id = {$this->table}.project_id");
        $this->db->join('teams', "teams.id = {$this->table}.team_id");
        $this->db->where("YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)");
        $this->db->join('users', "users.id = {$this->table}.user_id");
        $this->_setQueryParts($options);

        $this->db->order_by("{$this->table}.date ASC");
        return $this->db->get()->result();
    }


    public function findById($id)
    {
        $this->db->select("{$this->table}.*");
        $this->db->where(array('id' => $id));
        $query = $this->db->get($this->table);

        return $query->row() ;
    }

    protected function _setQueryParts($options = array())
    {
        $this->db->from($this->table);

        if(!empty($options['user_id'])) {
            $this->db->where("{$this->table}.user_id", $options['user_id']);
        }

        if(!empty($options['project_id'])) {
            $this->db->where("{$this->table}.project_id", $options['project_id']);
        }

        if(!empty($options['team_id'])) {
            $this->db->where("{$this->table}.team_id", $options['team_id']);
        }

        if (!empty ($options['status_id'])) {
            $this->db->where("{$this->table}.status_id", $options['status_id']);
        }


        if (!empty ($options['activity_id'])) {
            $this->db->where("{$this->table}.activity_id", $options['activity_id']);
        }

        if (!empty ($options['type_id'])) {
            $this->db->where("{$this->table}.type_id", $options['type_id']);
        }

        if (!empty ($options['date'])) {
             $this->db->where("{$this->table}.date >=", $options['date']);
        }

         if(!empty($options['page'])) {
            $this->db->limit($this->config->item('rowsPerPage'), $options['page']);
        }
    }
}