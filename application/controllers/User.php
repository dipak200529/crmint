<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $logged_in = false;
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		if(isset($this->session->user) && !empty($this->session->user)) {
			$this->data['user'] = $this->user_model->fetchById($this->session->user);
			$this->logged_in = true;
		}
	}
    
    public function index()
	{
		redirect('/welcome');
    }
    
    public function login()
	{

		if($this->logged_in) {
			redirect('/welcome');
		}

		$data = array(
			"error_msg" => ""
		);

		if($this->input->post('username') && $this->input->post('password')) {
			$user = $this->user_model->fetchByUsernamePassword(
				$this->input->post('username'), 
				$this->input->post('password')
			);

			if(!$user) {
				$data['error_msg'] = "Invalid Username/Password";
			} else {
				$this->session->user = $user['user_id'];
				redirect('/welcome');
			}
		}


		$this->load->view('login/user', $data);
	}

	public function logout() {
		if(isset($this->session))
			$this->session->sess_destroy();
		redirect('/user/login/');
	}


	public function dashboard() {
		if(!$this->logged_in) {
			redirect('/user/logout');
		}

		$this->load->model('Customer_model');
		$this->load->model('Activity_model');

		$this->data['stats'] = array(
			
			'activities' => $this->db->query(
				"SELECT count(*) as c FROM " . $this->Activity_model->table . ( ($this->data['user']['type'] == "Admin") ? "" : (" WHERE fk_user_id = " . $this->data['user']['user_id']) ) 
			)->row(),
			
			'users' => ($this->data['user']['type'] == "Admin")?$this->db->query(
				"SELECT count(*) as c FROM " . $this->user_model->table  
			)->row():0,
			
			'customers' => $this->db->query(
				"SELECT count(*) as c FROM " . $this->Customer_model->table . ( ($this->data['user']['type'] == "Admin") ? "" : (" WHERE createdby = " . $this->data['user']['user_id']) ) 
			)->row(),
		);

		$this->load->view('dashboard/dashboard', $this->data);
	}


	public function profile($user_id) {
		
		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if(!isset($user_id) || empty($user_id) || ($this->data['user']['type'] != 'Admin' && $this->data['user']['user_id'] != $user_id) ) {
			show_404();
			return;
		}

		$this->data['user_profile'] = $this->data['user'] = $this->user_model->fetchById(intval($user_id));

		if(!$this->data['user_profile']) {
			show_404();
			return;
		}


		$this->load->view('dashboard/profile', $this->data);
	}


	public function list() {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if($this->data['user']['type'] != "Admin") {
			redirect('/user/profile/' . $this->data['user']['user_id']);
		}

		$this->data['users'] = $this->user_model->fetchAll();

		if($this->data['users']) {
			foreach($this->data['users'] as &$user) {
				if($created_by = $this->user_model->fetchById($user['createdby'])) {
					$user['created_by_username'] = $created_by['username'];
                } else {
					$user['created_by_username'] = 'NA';
				}
			}
		}

		$this->load->view('dashboard/users', $this->data);
	}


	public function add()
	{

		if($this->data['user']['type'] != 'Admin') {
			redirect('user/list');
		}

		$this->data['error_msg'] = "";
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		
		if(count($_POST) > 0) {

			$this->form_validation->set_error_delimiters('<div class="alert alert-sm alert-danger">', '</div>');

            $this->form_validation->set_rules($this->user_model->getValidationRules());
            
            $_POST['createdby'] = $this->data['user']['user_id'];

			if($this->form_validation->run() == TRUE) {
				$data = array(
					'name' => $this->input->post('name'),
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'createdby' => $this->input->post('createdby'),
				);
				if($this->user_model->add($data)) {
					redirect('user/list');
				} else {
					$this->data['error_msg'] = "Something went wrong. Unable to add user.";
				}
			}
		}
        

		$this->load->view('dashboard/add_user', $this->data);
	}
}