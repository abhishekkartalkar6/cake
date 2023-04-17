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


}
