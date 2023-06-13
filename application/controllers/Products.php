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
        if(isset($_FILES['image']['name']) ){
            $existing_img = $this->Product_model->get_single_cat($this->input->post('id'));
            $existing_img = $existing_img[0]->category_image;
            $existing_img = explode("/",$existing_img);
            $existing_img = end($existing_img);
            unlink('./assets/uploads/category_images/'.$existing_img);
            // print_r($this->input->post('override_name_img'));echo "done";die;
        }
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

        if($_FILES['image']['name'] != '' ){
            $existing_img = $this->Product_model->get_product_by_id($this->input->post('product_id'));
            $existing_img = $existing_img[0]->image_url;
            $existing_img = explode("/",$existing_img);
            $existing_img = end($existing_img);
            if($existing_img){
                if (file_exists('./assets/uploads/product_images/'.$existing_img)) {
                    unlink('./assets/uploads/product_images/'.$existing_img);
                }
            }
            // print_r($this->input->post('override_name_img'));echo "done";die;
        }

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
					$image_url = $this->input->post('image_url');
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
        $data['sub_cat'] = $this->Product_model->get_all_sub_cat();
        $this->load->view('admin/product_edit',$data);
    }

    public function all_nested_cat($id) {
        $result = array();
        $parents = $this->Product_model->get_parent_cat($id);
        foreach($parents as $parent){
            $nestedCat = array(
                'category_name' => $parent->category_name,
                'children' => $this->all_nested_cat($parent->id)
            );
            $result[] = $nestedCat;
        }
        return $result;
    }
    


  public function abhi($id) {
     $aa =$this->all_nested_cat($id);
     echo '<pre>';
     print_r($aa);
     echo '<pre>';
     die;
    }
    public function suggestion(){
        $search = $this->input->post('search');
        $suggestions = $this->Product_model->get_suggestions($search);
        echo $suggestions;
     }

     public function banner(){
        $data['banners'] = $this->Product_model->get_banner();
        $this->load->view('admin/banner_setting', $data);
     }

    public function add_banner() {
        if(!empty($this->input->post())){
            // Load the form validation and upload libraries
            $this->load->library('form_validation');
            $this->load->library('upload');
            
            $this->form_validation->set_rules('image', 'Banner Image', 'required');
            // Check if the form was submitted and validated
            if ($this->form_validation->run() == TRUE) {

                $config['upload_path'] = './assets/uploads/banner_images'; // Set the upload path
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG'; // Set the allowed file types
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    
                    $image_url = base_url() . 'assets/uploads/banner_images/' . $this->upload->data('file_name');
                } else {
                    $image_url = '';
                }
                // Insert the product data into the database
                
                $this->Product_model->add_banner($image_url);
        
                // Redirect to the product list page
                redirect('add_banner');
                exit();
            }
        
            // Load the form view
            // $this->load->view('admin/categories');

        }
        $data['banners'] = $this->Product_model->get_banner();
        
            // print_r($data);die;
            $this->load->view('admin/banner_setting',$data);
        
    }

    public function delete_banner($id) {
        $banner = explode("~",$id);
        $this->Product_model->delete_single_banner($banner[0]);
        unlink('./assets/uploads/banner_images/'.$banner[1]);
        // $data['data'] = $this->Product_model->get_categories();
        redirect('add_banner');
        exit();
        
    }
    
     
    public function product_csv(){
        // $data['banners'] = $this->Product_model->get_banner();
        $this->load->view('admin/product_csv');
     }

     public function do_upload()
     {
         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'csv';
         $config['max_size']             = 1000;
         $config['max_width']            = 1024;
         $config['max_height']           = 768;
 
         $this->load->library('upload', $config);
        $all_cat = $this->Product_model->get_categories();
        $cat_assoc = [];
        foreach ($all_cat as $single_cat){
            $cat_assoc[$single_cat->id] = trim($single_cat->category_name);
        }

         if ( ! $this->upload->do_upload('userfile'))
         {
             $error = array('error' => $this->upload->display_errors());
 
             $this->load->view('upload_form', $error);
         }
         else
         {
             $data = array('upload_data' => $this->upload->data());
 
             // import the CSV data into the database
             $file_path = $data['upload_data']['full_path'];
             $cnt = 0;
             if (($handle = fopen($file_path, "r")) !== FALSE) {
                 $data = array();
                 $cont = 0;
                 while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if($cnt != 0){
                    $key = array_search($row[2], $cat_assoc);
                    if($key){

                    }else{
                        $key='';
                    }
                    $image_url = base_url()."assets/uploads/product_images/".$row[12];
                     $data = array(
                         'product_name' => $row[1],
                         'product_category' => $key,
                         'product_description' => $row[3],
                         'product_status' => "Active",
                         'image_url' => $image_url,
                         'sub_cat' => $row[13],
                         // add more fields as necessary
                     );

                     $last_id = $this->Product_model->csv_product_insert($data);
                     $data_p=[];
                     
                     if($row[4] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "0.5 KG",
                            'price' => $row[4],
                        );

                     }
                     if($row[5] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "1 KG",
                            'price' =>$row[5],
                        );
                        
                     }
                     if($row[6] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "1.5 KG",
                            'price' => $row[6],
                        );
                        
                     }
                     if($row[7] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "2 KG",
                            'price' => $row[7],
                        );
                        
                     }
                     if($row[8] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "3 KG",
                            'price' => $row[8],
                        );
                        
                     }
                     if($row[9] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "4 KG",
                            'price' => $row[9],
                        );
                        
                     }
                     if($row[10] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "5 KG",
                            'price' => $row[10],
                        );
                        
                     }
                     if($row[11] != ''){
                        $data_p[] = array(
                            'product_key' => $last_id,
                            'size' => "6 KG",
                            'price' => $row[11],
                        );
                        
                     }
                     $this->Product_model->csv_price_insert($data_p);
                 }else{
                    $cnt ++;
                 } }
                
                 fclose($handle);
 
                 
             }
 
             $this->load->view('upload_success', $data);
         }
     }

     public function fetch_products(){

        $fetch_data = $this->Product_model->make_datatables();  
 
        $data = array();  
        $cnt =1;
        foreach($fetch_data as $row)  
        {  
            $sub_array = array();  
            $sub_array[] = intval($_POST["start"])+$cnt; $cnt ++; 
            $sub_array[] = $row->product_name; 
            $sub_array[] = $row->category_name; 
            $sub_array[] = $row->sub_cat; 
             $sub_array[] = $row->product_description;   
             $sub_array[] = $row->sizes;  
             $sub_array[] = $row->prices;  
             $sub_array[] = '<img src="'.$row->image_url.'" alt="images" width="70" height="50">';  
             $sub_array[] = '<a href="edit_product/'.$row->product_id.'"><button class="btn btn-warning">Edit</button></a>&nbsp;<a href=""><button class="btn btn-danger">Delete</button></a>';
             $data[] = $sub_array;  
  
            
        }  
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->Product_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Product_model->get_filtered_data(),  
             "data"                    =>     $data  
        ); 
        echo json_encode($output);
    }

    public function get_navbar() {
		$this->load->model('Product_model');
		$all_cat = $this->Product_model->get_navbar_arr();
		return $all_cat;

	}
    public function final_product($id){
        $id = explode('-',$id);
		$id = end($id);
        // echo $id;die;

        $data['product'] = $this->Product_model->get_product_by_id($id);
        $data['nav_bar'] =array();  
        $this->load->view('product_landing',$data);
    }
}
	
