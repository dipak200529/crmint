<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function index()
	{
		show_404(); // This function may not be needed.
		$this->load->view('welcome_message');
    }
    
    public function customer()
	{
		show_404(); // This function may not be needed.
		$this->load->view('login/customer');
    }
    
    public function user()
	{
		show_404(); // This function may not be needed.
		$this->load->view('login/user');
	}
}