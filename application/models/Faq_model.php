<?php

class Faq_model extends CI_Model {

    public $table = "crm_faq";

    public $faq_id;
    public $ques;
    public $ans;
    public $createdby;
    public $createdon;
    public $modifiedby;
    public $modifiedon;

    public function fetchAll()
    {
        
       $query = $this->db->get($this->table);
     
        if($results = $query->result_array()) {
            return $results;
        }

        return false;
    }

    private function toDao($data) {
        $this->faq_id = $data->faq_id;
        $this->ques = $data->ques;
        $this->ans = $data->ans;
        $this->createdby = $data->createdby;
        $this->createdon = $data->createdon;
        $this->modifiedby = $data->modifiedby;
        $this->modifiedon = $data->modifiedon;

        return $this;
    }


    public function getValidationRules() {
        return array(
               
                array(
                        'field' => 'ques',
                        'label' => 'Question',
                        'rules' => 'trim|required|min_length[10]|max_length[500]'
                ),
                array(
                        'field' => 'ans',
                        'label' => 'Answer',
                        'rules' => 'trim|required|min_length[10]|max_length[500]'
                )
        );
    }

    public function add($data) {
        return $this->db->insert($this->table, $data);
    }

}