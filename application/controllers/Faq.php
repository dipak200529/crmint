<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

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
	$this->load->model('Faq_model');
	}
    
    public function index()
	{
		redirect('faq/list');
    }
    
    public function list() {

		if(!$this->logged_in) {
			redirect('/user/logout/');
		}

		if($this->data['user']['type'] == 'Admin')
			$this->data['faq'] = $this->Faq_model->fetchAll();

		$this->load->view('dashboard/faq', $this->data);
	}
    
    public function add()
	{

		$this->data['error_msg'] = "";
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		
		if(count($_POST) > 0) {

			$this->form_validation->set_error_delimiters('<div class="alert alert-sm alert-danger">', '</div>');

            $this->form_validation->set_rules($this->Faq_model->getValidationRules());
            
            if($this->data['user']['type'] == 'Admin') {
				$_POST['createdby'] = $this->data['user']['user_id'];
			}
			
			if($this->form_validation->run() == TRUE ) {
				$data = array(
					'createdby' => $this->input->post('createdby'),
					'ques' => $this->input->post('ques'),
					'ans' => $this->input->post('ans'),
				);
				if($this->Faq_model->add($data)) {
					redirect('faq/list');
				} else {
					$this->data['error_msg'] = "Something went wrong. Unable to add FAQ.";
				}
			}
		}     

		$this->load->view('dashboard/add_faq', $this->data);
	}
}