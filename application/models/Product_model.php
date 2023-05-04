<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    var $table = "products";  
    var $select_column = array("product_id", "product_name", "product_category", "sub_cat", "product_description", "product_size", "product_status", "image_url");  
    var $order_column = array("product_id", "product_name", "product_category", "sub_cat", "product_description", "product_size", "product_status", "image_url");  
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
    public function get_four_categories() {
        // Get the form data
        $results = $this->db->limit(4)->get('categories');
        
        return $results->result();
    }
    public function get_four_products_by_id($cid) {
        
        // Get the form data
        // $results = $this->db->limit(4)->where('product_category',$cid)->get('products');
        // $this->db->select('p.product_name, p.product_category as cat_id, GROUP_CONCAT(sp.price SEPARATOR ',') AS price, p.image_url');
        // $this->db->from('products p');
        // $this->db->where('p.product_category',$cid);
        // $this->db->join('size_price sp', 'p.product_id = sp.product_key', 'left');
        // $query = $this->db->get();
        // , GROUP_CONCAT(sp.price SEPARATOR ',') AS price

        $results = $this->db->query("SELECT p.product_id ,p.product_name, p.product_category as cat_id, p.image_url , GROUP_CONCAT(sp.price SEPARATOR ',') AS price FROM products p LEFT JOIN size_price sp on p.product_id = sp.product_key WHERE p.product_category = '$cid' GROUP BY p. product_id limit 4 ");
        /* 
        echo "<pre>";
        print_r($aa->result());die;
         */
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
       
        $results = $this->db->query("SELECT p.*,c.id,c.category_name, GROUP_CONCAT(sp.size SEPARATOR ',') AS sizes,GROUP_CONCAT(sp.price SEPARATOR ',') AS prices FROM products p LEFT JOIN size_price sp ON p.product_id = sp.product_key LEFT JOIN categories c ON p.product_category = c.id GROUP BY p.product_id");

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


     public function get_suggestions($search){
        $this->db->like('product_name', $search);
        $query = $this->db->get('products');
        $result = $query->result_array();
        $output = '<ul class="list-unstyled">';
        foreach($result as $row){
           $output .= '<a href="'.base_url().'final_product/'.$row['product_id'].'"><li>'.$row['product_name'].'</li></a>';
        }
        $output .= '</ul>';
        return $output;
     }

     public function add_banner($image_url) {
        // Get the form data
        
        // Prepare the data for insertion
        $data = array(
            'banner_img' => $image_url
        );

        // Insert the data into the database
        $this->db->insert('banner', $data);
    }

    public function get_banner() {
        // Get the form data
        $results = $this->db->get('banner');
        return $results->result();
    }

    public function delete_single_banner($id) {

        // Insert the data into the database
        $this->db->where('banner_id', $id);
        $this->db->delete('banner');
    }

    public function csv_product_insert($data) {
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function csv_price_insert($data) {
        foreach($data as $datas){
            $this->db->insert('size_price', $datas);
        }
    }
    public function get_navbar_arr() {
        
        $results = $this->db->query("SELECT categories.id,categories.category_name AS product_category, GROUP_CONCAT(DISTINCT products.sub_cat ORDER BY products.sub_cat ASC SEPARATOR ',') AS subcategories FROM products LEFT JOIN categories ON products.product_category = categories.id GROUP BY product_category HAVING COUNT(DISTINCT products.sub_cat) > 0");
        $result = json_decode(json_encode($results->result()), true);
        $data = [];
        $i=0;
        foreach($result as $res){
            $data['id'][$i] = $res['id'];
            $sub = explode(",",$res['subcategories']);
            $data['categories'][$res['product_category']] = $sub;
            $i++;
        }
        return $data;
    }
     

    function make_query()  
    {  
    
        $this->db->select('p.*, c.id, c.category_name, GROUP_CONCAT(sp.size SEPARATOR ",") AS sizes, GROUP_CONCAT(sp.price SEPARATOR ",") AS prices');
$this->db->from('products p');
$this->db->join('size_price sp', 'p.product_id = sp.product_key', 'left');
$this->db->join('categories c', 'p.product_category = c.id', 'left');
$this->db->group_by('p.product_id');

        
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("product_id", $_POST["search"]["value"]);
              $this->db->or_like("product_name", $_POST["search"]["value"]);
              $this->db->or_like("product_category", $_POST["search"]["value"]);
              $this->db->or_like("sub_cat", $_POST["search"]["value"]);
              $this->db->or_like("product_description", $_POST["search"]["value"]);
              $this->db->or_like("product_size", $_POST["search"]["value"]);
              $this->db->or_like("product_status", $_POST["search"]["value"]);
              $this->db->or_like("image_url", $_POST["search"]["value"]);
         }  
         if(isset($_POST["order"]))  
         { 
          
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('product_id', 'ASC');  
         }  
    }  
    function make_datatables(){  
         $this->make_query($this->select_column);  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function get_filtered_data(){  
         $this->make_query();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data()  
    {  
         $this->db->select("*");  
         $this->db->from('products');  
         return $this->db->count_all_results();  
    }  
}
