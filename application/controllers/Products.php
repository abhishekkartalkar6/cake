<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    /* public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->library('session');
    } */

	public function index()
	{
		$this->load->view('admin/categories');
	}
    public function add_category() {
        if(!empty($this->input->post())){
            // Load the form validation and upload libraries
            $this->load->library('form_validation');
            $this->load->library('upload');
            
        
            // Set the validation rules for the form fields
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('product_category', 'Product Category', 'required');
            $this->form_validation->set_rules('product_description', 'Product Description', 'required');
            $this->form_validation->set_rules('product_size[]', 'Product Size', 'required');
            $this->form_validation->set_rules('product_status', 'Product Status', 'required');
    
            // Check if the form was submitted and validated
            if ($this->form_validation->run() == TRUE) {

                $config['upload_path'] = './assets/uploads/category_images'; // Set the upload path
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG'; // Set the allowed file types
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    
                    $image_url = base_url() . 'assets/uploads/category_images/' . $this->upload->data('file_name');
                } else {
                    $image_url = '';
                }
echo $image_url;die;
                // Insert the product data into the database
                $this->load->model('Product_model');
                $this->Product_model->insert_product($image_url);
        
                // Redirect to the product list page
                redirect('products');
            }
        
            // Load the form view
            // $this->load->view('admin/products');

        }
        // $this->load->view('admin/products');
    }
}
	
