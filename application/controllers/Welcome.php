<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function admin()
	{
		$this->load->view('admin/admin_login_page');
	}

	public function check_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Load the database library and model
        $this->load->database();
        $this->load->model('user_model');

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

	public function dashboardy() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $this->load->view('dashboard');
    }
}
