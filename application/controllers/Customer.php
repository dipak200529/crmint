<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
	}
    
    public function index()
	{
		redirect('customer/list');
    }
    
    public function list() {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if($this->data['user']['type'] == 'Admin')
			$this->data['customers'] = $this->Customer_model->fetchAll();
		else
			$this->data['customers'] = $this->Customer_model->fetchAll($this->data['user']['user_id']);

		if($this->data['customers']) {
			foreach($this->data['customers'] as &$customer) {
				if($created_by = $this->user_model->fetchById($customer['createdby'])) {
					$customer['created_by_username'] = $created_by['username'];
				} 
			}
		}

		$this->load->view('dashboard/customers', $this->data);
	}

	public function view($cust_id = 0) {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if(empty($cust_id)) {
			redirect('customer/list');
		}

		$customer = $this->Customer_model->fetchById($cust_id);

		if($customer && ($this->data['user']['type'] != "Admin" && $customer['createdby'] == $this->data['user']['user_id'] ) ) {

			$this->data['customers'] = array($customer); // Bad quick way!

			foreach($this->data['customers'] as &$customer) {
				if($created_by = $this->user_model->fetchById($customer['createdby'])) {
					$customer['created_by_username'] = $created_by['username'];
				} 
			}
		}

		$this->load->view('dashboard/customers', $this->data);
	}


	public function user($user_id = 0) {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if(empty($user_id)) {
			redirect('customer/list');
		}

		if($this->data['user']['type'] == 'Admin')
			$this->data['customers'] = $this->Customer_model->fetchAll();
		else
			$this->data['customers'] = $this->Customer_model->fetchAll($this->data['user']['user_id']);

		if($this->data['customers']) {
			foreach($this->data['customers'] as $key => &$customer) {

				if($customer['createdby'] != $user_id) {
					unset($this->data['customers'][$key]);
				}

				if($created_by = $this->user_model->fetchById($customer['createdby'])) {
					$customer['created_by_username'] = $created_by['username'];
				} 
			}
		}

		$this->load->view('dashboard/customers', $this->data);
	}
    
    public function add()
	{

		$this->data['error_msg'] = "";
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		
		if(count($_POST) > 0) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-sm alert-danger">', '</div>');

			$this->form_validation->set_rules($this->Customer_model->getValidationRules());

			if($this->data['user']['type'] != 'Admin') {
				$_POST['lead_user'] = $this->data['user']['user_id'];
			}

			if($this->form_validation->run() == TRUE && $this->user_model->fetchById($this->input->post('lead_user'))) {
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'createdby' => $this->input->post('lead_user'),
				);
				if($this->Customer_model->add($data)) {
					redirect('customer/list');
				} else {
					$this->data['error_msg'] = "Something went wrong. Unable to add customer.";
				}
			}
		}

		$this->data['users'] = $this->user_model->fetchAll();

		$this->load->view('dashboard/add_customer', $this->data);
	}
}