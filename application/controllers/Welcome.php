<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function admin()
	{ 
		if(empty($this->input->post)){
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');
	
			// Check if the email and password match in the database
			$user = $this->user_model->get_user_by_email_password($email, $password);
			
			if ($user) {
				// Set session data
				$this->session->set_userdata('user_id', $user['id']);
				$this->session->set_userdata('email', $user['email']);
	
				// Redirect to the dashboard
				redirect('dashboard');
			} else {
				
				// Email and password do not match
				$data['error'] = 'Invalid email or password';
				$this->load->view('admin/admin_login_page', $data);
			}
		}
		$this->load->view('admin/admin_login_page');
	}



	public function dashboardy() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $this->load->view('dashboard');
    }
}
