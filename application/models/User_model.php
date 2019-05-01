<?php

class User_model extends CI_Model {

    public $table = "crm_user";

    public $user_id;
    public $name;
    public $username;
    public $email;
    public $phone;
    public $type;

    public function fetchByUsernamePassword($username, $password)
    {
        $query = $this->db->get_where($this->table, array('username' => $username), 1, 0);
        if($row = $query->row()) {
            if(password_verify($password, $row->password)) {
                return (array) $this->toDao($row);
            }
        }

        return false;
    }

    public function fetchById($user_id)
    {
        $query = $this->db->get_where($this->table, array('user_id' => $user_id), 1, 0);
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
        $this->user_id = $data->user_id;
        $this->name = $data->name;
        $this->username = $data->username;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->type = $data->type;

        return $this;
    }

    public function getValidationRules() {
        return array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|min_length[1]|max_length[50]'
                ),
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required|min_length[4]|max_length[20]|is_unique['.$this->table.'.username]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[8]|max_length[16]'
                ),
                array(
                        'field' => 'repeat_password',
                        'label' => 'Repeat Passsword',
                        'rules' => 'trim|required|min_length[8]|max_length[16]|matches[password]'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|is_unique['.$this->table.'.email]'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'Phone Confirmation',
                        'rules' => 'trim|required|exact_length[10]|regex_match[/\d/]'
                ),
                array(
                        'field' => 'type',
                        'label' => 'User Type',
                        'rules' => 'trim|required|in_list[Admin,User]'
                ),
                array(
                        'field' => 'createdby',
                        'label' => 'Created By',
                        'rules' => 'required'
                )
        );
    }


    public function add($data) {
        return $this->db->insert($this->table, $data);
    }

}