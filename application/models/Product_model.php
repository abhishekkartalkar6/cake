<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function insert_product($image_url) {
        // Get the form data
        $product_name = $this->input->post('product_name');
        $product_category = $this->input->post('product_category');
        $product_description = $this->input->post('product_description');
        $product_status = $this->input->post('product_status');
        $size = $this->input->post('size');
        $price = $this->input->post('price');

        // Prepare the data for insertion
        $data = array(
            'product_name' => $product_name,
            'product_category' => $product_category,
            'product_description' => $product_description,
            'product_status' => $product_status,
            'image_url' => $image_url
        );

        // Insert the data into the database
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();

        $count = 0;
        foreach ($size as $size){
            $data = array(
                'product_key' => $insert_id,
                'size' => $size,
                'price' => $price[$count],
            );
            $this->db->insert('size_price', $data);
            $count++;
        }
    }

    public function update_product($image_url) {
        // Get the form data into variable
        $product_name = $this->input->post('product_name');
        $product_category = $this->input->post('product_category');
        $product_description = $this->input->post('product_description');
        $product_status = $this->input->post('product_status');
        $sizes = $this->input->post('size');
        $price = $this->input->post('price');
        $size_price_ids = $this->input->post('id');

        // make array data to be upadated
        $data = array(
            'product_name' => $product_name,
            'product_category' => $product_category,
            'product_description' => $product_description,
            'product_status' => $product_status,
            'image_url' => $image_url
        );

        // Insert the data into the database
        $this->db->where('product_id', $this->input->post('product_id'));
        $this->db->update('products', $data);

        $sp_arr = $this->get_size_price_by_product_is($this->input->post('product_id'));
        $sp_arr= $array = json_decode(json_encode($sp_arr), true);

        $present_arr =array();
        
        foreach($sp_arr as $sp_ar){
            $present_arr [] = $sp_ar['size_price_id'];
        }


        // Define two arrays
        $array1 = $this->input->post('id');
        if($array1 == null){
            $array1 = array();
        }
        $array2 = $present_arr;
        
        $matched_values = array_intersect($array1, $array2); // update matched value

        foreach($matched_values as $key =>$val){
            $this->db->query("UPDATE size_price SET size = '$sizes[$key]' , price ='$price[$key]'  WHERE size_price_id='$val'");
        }

        foreach($array1 as $key =>$val){
            if($val == "new"){
                echo $key;
                $data = array(
                'product_key' => $this->input->post('product_id'),
                'size' => $sizes[$key],
                'price' => $price[$key],
            );

            $this->db->insert('size_price', $data);
            }
        }

      
        $diff_values = array_diff($array2, $array1);
        foreach($diff_values as $key =>$val){
         
            $this->db->where('size_price_id', $val);
            $this->db->delete('size_price');
            
        }



    }

    public function add_category($image_url) {
        // Get the form data
        $category = $this->input->post('category');
        
        // Prepare the data for insertion
        $data = array(
            'category_name' => $category,
            'category_image' => $image_url
        );

        // Insert the data into the database
        $this->db->insert('categories', $data);
    }
    public function get_categories() {
        // Get the form data
        $results = $this->db->get('categories');
        return $results->result();
    }
    public function get_single_cat($id) {
        // Get the form data
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id',$id);
        $results = $this->db->get();
        return $results->result();
    }

    public function update_category($image_url) {
        // Get the form data
        $category = $this->input->post('category');
        $id = $this->input->post('id');

        if($image_url ==''){
            $image_url =$this->input->post('override_name_img');
        }
        // Prepare the data for insertion
        $data = array(
            'category_name' => $category,
            'category_image' => $image_url
        );

        // Insert the data into the database
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }
    public function delete_single_cat($id) {

        // Insert the data into the database
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }

    public function get_products() {
       
        $results = $this->db->query("SELECT p.*,c.category_name, GROUP_CONCAT(sp.size SEPARATOR ',') AS sizes,GROUP_CONCAT(sp.price SEPARATOR ',') AS prices FROM products p LEFT JOIN size_price sp ON p.product_id = sp.product_key LEFT JOIN categories c ON p.product_category = c.id GROUP BY p.product_id");

        return $results->result();
    }

    public function get_product_by_id($id) {
    $results = $this->db->query("SELECT p.*,c.category_name, GROUP_CONCAT(s.size,-s.price,-s.size_price_id) AS sizes FROM products p LEFT JOIN size_price s ON p.product_id = s.product_key LEFT JOIN categories c ON p.product_category = c.id WHERE p.product_id = '$id'  GROUP BY p.product_id ");
        return $results->result();
    }

    public function get_size_price_by_product_is($id) {
       
        $results = $this->db->query("SELECT size_price_id FROM size_price WHERE product_key='$id'");

        return $results->result();
    }


}
