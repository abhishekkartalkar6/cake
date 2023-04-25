<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        // $this->load->model('user_model');
        // $this->load->library('session');
        $this->load->model('Product_model');
    }

    public function add_category() {
        if(!empty($this->input->post())){
            // Load the form validation and upload libraries
            $this->load->library('form_validation');
            $this->load->library('upload');
            
            // Set the validation rules for the form fields
            $this->form_validation->set_rules('category', 'Category Name', 'required');
    
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
                // Insert the product data into the database
                
                $this->Product_model->add_category($image_url);
        
                // Redirect to the product list page
                redirect('add_cat');
                exit();
            }
        
            // Load the form view
            // $this->load->view('admin/categories');

        }
        $data['data'] = $this->Product_model->get_categories();
        
            // print_r($data);die;
            $this->load->view('admin/categories',$data);
        
    }

    public function update_cat() {
        // print_r($this->input->post('id'));die;
        if(!empty($this->input->post())){

            // Load the form validation and upload libraries
            $this->load->library('form_validation');
            $this->load->library('upload');
            
            // Set the validation rules for the form fields
            $this->form_validation->set_rules('category', 'Category Name', 'required');
    
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
                // Insert the product data into the database
                
                $this->Product_model->update_category($image_url);
        
                // Redirect to the product list page
                redirect('add_cat');
                exit();
            }
        
            // Load the form view
            // $this->load->view('admin/categories');

        }
        $data['data'] = $this->Product_model->get_categories();
        
            // print_r($data);die;
            $this->load->view('admin/update_categories',$data);
        
    }

    public function edit_cat($id) {
        $category['category'] = $this->Product_model->get_single_cat($id);
        $this->load->view('admin/update_categories',$category);
    }

    public function delete_cat($id) {
        $this->Product_model->delete_single_cat($id);
        // $data['data'] = $this->Product_model->get_categories();
        redirect('add_cat');
        exit();
        
    }

    public function product() {

		if(!empty($this->input->post())){
			// Load the form validation and upload libraries
			$this->load->library('form_validation');
			$this->load->library('upload');
			

			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_category', 'Product Category', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
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
		
                $this->session->set_flashdata('response',"Data Inserted Successfully");
				redirect('product');
			}
		
			// Load the form view
			$this->load->view('admin/products');

		}else{
            $data['products'] = $this->Product_model->get_products();
            $data['categories'] = $this->Product_model->get_categories();
            $this->load->view('admin/products',$data);
        }
	}

    public function product_edit() {

		if(!empty($this->input->post())){
			// Load the form validation and upload libraries
			$this->load->library('form_validation');
			$this->load->library('upload');
			

			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_category', 'Product Category', 'required');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			$this->form_validation->set_rules('product_status', 'Product Status', 'required');
	
            
			if ($this->form_validation->run() == TRUE) {

				$config['upload_path'] = './assets/uploads/product_images'; // Set the upload path
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG'; // Set the allowed file types
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')) {
		
					$image_url = base_url() . 'assets/uploads/product_images/' . $this->upload->data('file_name');
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
				} else {
					$image_url = '';
				}


				$this->load->model('Product_model');
				$this->Product_model->update_product($image_url);
		
                $this->session->set_flashdata('response',"Data Updated Successfully");
				redirect('product');
			}
		
			// Load the form view
			$this->load->view('admin/products');

		}else{
            $data['products'] = $this->Product_model->get_products();
            $data['categories'] = $this->Product_model->get_categories();
            $this->load->view('admin/products',$data);
        }
	}

    public function edit_product($id) {
        $data['single_product'] = $this->Product_model->get_product_by_id($id);
        $data['categories'] = $this->Product_model->get_categories();
        $this->load->view('admin/product_edit',$data);
    }

    
}
	
