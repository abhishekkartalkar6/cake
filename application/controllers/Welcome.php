<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->library('session');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function admin()
	{ 
		if(!empty($this->input->post())){
					
			$email = $this->input->post('email');
			$password = $this->input->post('password');
	
			// Load the database library and model
			
			// Check if the email and password match in the database
			$user = $this->user_model->get_user_by_email_password($email, $password);
			
			if ($user) {

				// Set session data
				$this->session->set_userdata('name', $user['name']);
				$this->session->set_userdata('email', $user['email']);
	
				// Redirect to the dashboard
				redirect('dashboard');
			} else {
				
				// Email and password do not match
				$data['error'] = 'Invalid email or password';
				$this->load->view('admin/admin_login_page', $data);
			}
		}else{
			$this->load->view('admin/admin_login_page');
		}
	}


	public function dashboard() {
        // Check if the user is logged in
        if (!$this->session->userdata('name')) {
            redirect('admin');
			exit;
        }

        $this->load->view('admin/dashboard');
    }

	public function logout() {
		$this->load->library('session');
		$this->session->unset_userdata('name');
		redirect('admin');
	}

	public function products() {
		if(!empty($this->input->post())){
			// Load the form validation and upload libraries
			$this->load->library('form_validation');
			$this->load->library('upload');
			

			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_category', 'Product Category', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			$this->form_validation->set_rules('product_size[]', 'Product Size', 'required');
			$this->form_validation->set_rules('product_status', 'Product Status', 'required');
	

			if ($this->form_validation->run() == TRUE) {

				$config['upload_path'] = './assets/uploads/product_images'; // Set the upload path
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG'; // Set the allowed file types
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')) {
					
					$image_url = base_url() . 'assets/uploads/product_images/' . $this->upload->data('file_name');
				} else {
					$image_url = '';
				}


				$this->load->model('Product_model');
				$this->Product_model->insert_product($image_url);
		

				redirect('products');
			}
		
			// Load the form view
			$this->load->view('admin/products');

		}
		$this->load->view('admin/products');
	}

	
}
