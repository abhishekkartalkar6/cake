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
		$this->load->model('Product_model');
		$data['four_Categories'] = $this->Product_model->get_four_categories();
		$data['allCategories'] = $this->Product_model->get_categories();
		$d= array();
		foreach($data['four_Categories'] as $cat){
		$d[$cat->category_name."/".$cat->id] = $this->Product_model->get_four_products_by_id($cat->id);
		}
		$data['fourProducts']=$d;
		$data['banners'] = $this->Product_model->get_banner();
		$data['nav_bar'] = $this->get_navbar();
		// echo  "<pre>";
        // print_r($d);
        // die;
		$this->load->view('welcome_message',$data);
	}

	public function all_cats(){
		$this->load->model('Product_model');
		$data['allCategories'] = $this->Product_model->get_categories();
		$data['nav_bar'] = $this->get_navbar();
		$this->load->view('category_page',$data);
	}
	public function all_products(){
		$this->load->model('Product_model');
		$data['allProducts'] = $this->Product_model->get_products();
		$data['nav_bar'] = $this->get_navbar();
		$this->load->view('products_page',$data);
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

	public function get_navbar() {
		$this->load->model('Product_model');
		$all_cat = $this->Product_model->get_navbar_arr();
		return $all_cat;

	}

	public function get_cat_sub_cat($sub_cat = '',$cat_key = 0) {
		$this->load->model('Product_model');
		$data['product_by_cat_subcat'] = $this->Product_model->get_cat_subcat_product($cat_key,$sub_cat);
		$data['nav_bar'] = $this->get_navbar();
		$this->load->view('products_page',$data);
	}
	public function get_category($cat_key = 0) {
		$this->load->model('Product_model');
		$data['product_by_cat'] = $this->Product_model->get_catwise_product($cat_key);
		$data['nav_bar'] = $this->get_navbar();
		$this->load->view('products_page',$data);
	}


	
}
