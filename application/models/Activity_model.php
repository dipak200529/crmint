<?php

class Activity_model extends CI_Model {

    public $table = "crm_activity";

    public $activity_id;
    public $fk_user_id;
    public $fk_cust_id;
    public $activity_type;
    public $description;
    public $createdby;
    public $createdon;
    public $modifiedby;
    public $modifiedon;

    public function fetchById($user_id)
    {
        $query = $this->db->get_where($this->table, array('activity_id' => $user_id), 1, 0);
        if($row = $query->row()) {
            return (array) $this->toDao($row);
        }

        return false;
    }

    public function fetchAll($createdby = 0)
    {
        if(!empty($createdby)) {
            $query = $this->db->get_where($this->table, array('createdby' => $createdby));
        } else {
            $query = $this->db->get($this->table);
        }
        
        if($results = $query->result_array()) {
            return $results;
        }

        return false;
    }

    public function fetchAllFor($for = 0)
    {
        if(!empty($for)) {
            $query = $this->db->get_where($this->table, array('fk_user_id' => $for));
        } else {
            return false;
        }
        
        if($results = $query->result_array()) {
            return $results;
        }

        return false;
    }

    private function toDao($data) {
        $this->activity_id = $data->activity_id;
        $this->fk_user_id = $data->fk_user_id;
        $this->fk_cust_id = $data->fk_cust_id;
        $this->activity_type = $data->activity_type;
        $this->description = $data->description;
        $this->createdby = $data->createdby;
        $this->createdon = $data->createdon;
        $this->modifiedby = $data->modifiedby;
        $this->modifiedon = $data->modifiedon;

        return $this;
    }


    public function getValidationRules() {
        return array(
                array(
                        'field' => 'fk_user_id',
                        'label' => 'User',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'fk_cust_id',
                        'label' => 'Customer',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'activity_type',
                        'label' => 'Activity Type',
                        'rules' => 'trim|required|in_list[call,email,visit]'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Description',
                        'rules' => 'trim|required|min_length[10]|max_length[500]'
                ),
                array(
                        'field' => 'lead_user',
                        'label' => 'Created By',
                        'rules' => 'required'
                )
        );
    }

    public function add($data) {
        return $this->db->insert($this->table, $data);
    }

}