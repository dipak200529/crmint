<?php

class Customer_model extends CI_Model {

    public $table = "crm_customer";

    public $cust_id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $status;
    public $createdby;
    public $createdon;
    public $modifiedby;
    public $modifiedon;

    public function fetchById($cust_id)
    {
        $query = $this->db->get_where($this->table, array('cust_id' => $cust_id), 1, 0);
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

    private function toDao($data) {
        $this->cust_id = $data->cust_id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->address = $data->address;
        $this->status = $data->status;
        $this->createdby = $data->createdby;
        $this->createdon = $data->createdon;
        $this->modifiedby = $data->modifiedby;
        $this->modifiedon = $data->modifiedon;

        return $this;
    }


    public function getValidationRules() {
        return array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|max_length[50]'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|is_unique['.$this->table.'.email]'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'Phone Confirmation',
                        'rules' => 'trim|required|exact_length[10]'
                ),
                array(
                        'field' => 'address',
                        'label' => 'Address',
                        'rules' => 'trim|required|min_length[10]|max_length[200]'
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