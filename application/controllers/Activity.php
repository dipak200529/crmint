<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

	private $logged_in = false;
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		if(isset($this->session->user) && !empty($this->session->user)) {
			$this->data['user'] = $this->user_model->fetchById($this->session->user);
			$this->logged_in = true;
		} else {
			$this->load->view('welcome_message');
		}

        $this->load->model('Customer_model');
        $this->load->model('Activity_model');
	}
    
    public function index()
	{
		redirect('activity/list');
    }
    
    public function list() {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if($this->data['user']['type'] == 'Admin')
			$this->data['activities'] = $this->Activity_model->fetchAll();
		else
			$this->data['activities'] = $this->Activity_model->fetchAllFor($this->data['user']['user_id']);

		if($this->data['activities']) {
			foreach($this->data['activities'] as &$activity) {
				if($created_by = $this->user_model->fetchById($activity['createdby'])) {
					$activity['created_by_username'] = $created_by['username'];
                } 
                
                if($cust_name = $this->Customer_model->fetchById($activity['fk_cust_id'])) {
					$activity['cust_name'] = $cust_name['name'];
                } 
                
                if($username = $this->user_model->fetchById($activity['fk_user_id'])) {
					$activity['username'] = $username['username'];
				} 
			}
		}

		$this->load->view('dashboard/activities', $this->data);
	}
    
    public function add()
	{

		$this->data['error_msg'] = "";
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		
		if(count($_POST) > 0) {

			$this->form_validation->set_error_delimiters('<div class="alert alert-sm alert-danger">', '</div>');

            $this->form_validation->set_rules($this->Activity_model->getValidationRules());
            
            $_POST['lead_user'] = $this->data['user']['user_id'];
            if($this->data['user']['type'] != 'Admin') {
				$_POST['fk_user_id'] = $this->data['user']['user_id'];
			}

			if($this->form_validation->run() == TRUE && $this->user_model->fetchById($this->input->post('lead_user'))) {
				$data = array(
					'fk_user_id' => $this->input->post('fk_user_id'),
					'fk_cust_id' => $this->input->post('fk_cust_id'),
					'activity_type' => $this->input->post('activity_type'),
					'description' => $this->input->post('description'),
					'createdby' => $this->input->post('lead_user'),
				);
				if($this->Activity_model->add($data)) {
					redirect('activity/list');
				} else {
					$this->data['error_msg'] = "Something went wrong. Unable to add activity.";
				}
			}
		}

        $this->data['users'] = $this->user_model->fetchAll();
        
        if($this->data['user']['type'] == "Admin") {
            $this->data['customers'] = $this->Customer_model->fetchAll();
        } else {
            $this->data['customers'] = $this->Customer_model->fetchAll($this->data['user']['user_id']);
        }
        

		$this->load->view('dashboard/add_activity', $this->data);
	}


	public function customer($cust_id = 0) {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if(empty($cust_id)) {
			redirect('activity/list');
		}

		if($this->data['user']['type'] == 'Admin')
			$this->data['activities'] = $this->Activity_model->fetchAll();
		else
			$this->data['activities'] = $this->Activity_model->fetchAllFor($this->data['user']['user_id']);

		if($this->data['activities']) {
			foreach($this->data['activities'] as $key => &$activity) {
				if($activity['fk_cust_id'] != $cust_id) {
					unset($this->data['activities'][$key]);
					continue;
				}

				if($created_by = $this->user_model->fetchById($activity['createdby'])) {
					$activity['created_by_username'] = $created_by['username'];
                } 
                
                if($cust_name = $this->Customer_model->fetchById($activity['fk_cust_id'])) {
					$activity['cust_name'] = $cust_name['name'];
                } 
                
                if($username = $this->user_model->fetchById($activity['fk_user_id'])) {
					$activity['username'] = $username['username'];
				} 
			}
		}

		$this->load->view('dashboard/activities', $this->data);
	}


	public function user($user_id = 0) {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if(empty($user_id)) {
			redirect('activity/list');
		}

		if($this->data['user']['type'] == 'Admin')
			$this->data['activities'] = $this->Activity_model->fetchAll();
		else
			$this->data['activities'] = $this->Activity_model->fetchAllFor($this->data['user']['user_id']);

		if($this->data['activities']) {
			foreach($this->data['activities'] as $key => &$activity) {
				if($activity['fk_user_id'] != $user_id) {
					unset($this->data['activities'][$key]);
					continue;
				}

				if($created_by = $this->user_model->fetchById($activity['createdby'])) {
					$activity['created_by_username'] = $created_by['username'];
                } 
                
                if($cust_name = $this->Customer_model->fetchById($activity['fk_cust_id'])) {
					$activity['cust_name'] = $cust_name['name'];
                } 
                
                if($username = $this->user_model->fetchById($activity['fk_user_id'])) {
					$activity['username'] = $username['username'];
				} 
			}
		}

		$this->load->view('dashboard/activities', $this->data);
	}
}