<?php 
$params = explode('/',$_SERVER['REQUEST_URI']);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mygiftsy</title>
      <style>
        @media (min-width: 992px) {
          .courosel{
            height: 300px;
          }
        }

        /* For mobile devices */
        @media (max-width: 991px) {
          .courosel {
            height: 200px;
          }
        }
        .containered {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-evenly;
        }

        .image-container {
          width: calc(12.5% - 10px);
          margin-bottom: 10px;
          box-shadow: 0 3px 10px rgb(0 0 0 / 0.5);
          border-radius: 12%;
          
        }
        
        .image-container img {
          border-radius: 12%;
          width: 100%;
          height: 100px;
          padding-top: 5px;
          padding-right: 5px;
          padding-left: 5px;
          
        }
        
        .image-container p {
          /* white-space: nowrap;  */
          text-align: center;
          overflow: hidden;
          text-overflow: ellipsis; 
          
        }

        @media screen and (max-width: 767px) {
          .cat_title{
            font-size:14px;
          }
        }
        @media screen and (max-width: 767px) {
          .image-container {
            width: calc(25% - 10px);
          }
        }
        
        /* Product Images */
        .product-main {
          margin-top:10px;
          /* border:1px solid; */
        }
        .product-main h3 {
          margin-left:10px;
        }
        .product-containered {
          margin-top:20px;
          margin-left: 5px;
          margin-right: 5px;
          display: flex;
          flex-wrap: wrap;
          justify-content: space-evenly;
        }

        .product-image-container {
          width: calc(20% - 10px);
          margin-bottom: 10px;
          box-shadow: 0 3px 10px rgb(0 0 0 / 0.5);
          /* border-radius: 12%; */
          
        }
        
        .product-image-container img {
          /* border-radius: 12%; */
          width: 100%;
          height: 150px;
          padding-top: 5px;
          padding-right: 5px;
          padding-left: 5px;
          
        }
        
        .product-image-container p {
          white-space: nowrap; 
          text-align: center;
          overflow: hidden;
          text-overflow: ellipsis; 
          
        }
        

        @media screen and (max-width: 767px) {
          .product-cat_title{
            font-size:14px;
          }
        }
        @media screen and (max-width: 767px) {
          .product-image-container {
            width: calc(50% - 10px);
          }
        }

        .search-box {
          position: relative;
          display: inline-block;
        }

        #suggestions {
          position: absolute;
          top: 100%;
          left: 0;
          right: 0;
          max-height: 200px;
          overflow-y: auto;
          background-color: #fff;
          border: 1px solid #ccc;
          border-top: none;
          list-style: none;
          padding: 0;
          margin: 0;
          z-index: 1;
        }

        #suggestions li {
          padding: 10px;
          cursor: pointer;
        }

        #suggestions li:hover {
          background-color: #f4f4f4;
        }

        .image-container_product_landing {
          width: 150px;
          margin-bottom: 10px;
          box-shadow: 0 3px 10px rgb(0 0 0 / 0.5);
          border-radius: 12%;
          
        }
        
        .image-container_product_landing img {
          border-radius: 12%;
          width: 100%;
          height: 100px;
          padding-top: 5px;
          padding-right: 5px;
          padding-left: 5px;
          
        }
        
        .image-container_product_landing p {
          text-align: center;
          overflow: hidden;
          text-overflow: ellipsis; 
          
        }
        a{
          color: black;
          text-decoration:none;
        }
        a:hover{
          color: blue;
          text-decoration:none;
        }
        .image-container:hover, .product-image-container:hover{
          box-shadow:  0px 15px 10px -10px green;
        }
       </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo base_url()?>"><strong>MyGiftsy</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <div class="search-box">
      <input type="text" placeholder="Search" id="search-input">
      <ul id="suggestions"></ul>
    </div>
          <!-- <li style="padding-left: 8px;"><a href="<?php echo base_url()?>categories"><strong>All Categories</strong></a></li>
          <li style="padding-left: 8px;"><a href="<?php echo base_url()?>products"><strong>All Products</strong></a></li> -->
          <!-- <li style="padding-left: 8px;"><a href="<?php echo base_url()?>all_cakes"><strong>All Cakes</strong></a></li> -->
          <!-- <li style="padding-left: 8px;"><a href="<?php echo base_url()?>products"><strong>Birthday Cakes</strong></a></li> -->
        </ul>

    <style>
      .steven-and-leah > * {
        display: inline-block;
      }
      .steven-and-leah{
        margin-top: 15px;
        margin-left: 15px;
        /* text-align:center; */
      }
      /* .steven-and-leah > * a:hover {
        color:red;
      } */
      .steven-and-leah > * #dbtn:hover {
        background-color:#fff;
        color:#002f5b;
        /* border-bottom:2px solid blue; */
        box-shadow: 0px 15px 10px -5px blue; 
      }
      #dbtn{
        padding:5px;
      }
      .dropdown:hover .dropdown-menu {
        display: block;
      }
    </style>
    
    <div class="steven-and-leah" style="margin-bottom:10px" >
    <?php 
    /* echo "<pre>";
    print_r($nav_bar);die; */
    $i = 0;
    if($nav_bar){
    foreach($nav_bar['categories'] as $main_category => $sub_categories){

      $main_category = explode('/',$main_category);
        $cat_name = $main_category[0];
        $cat_id = $main_category[1];
            ?>

        <?php if($cat_name !==""){ 
          // echo "<pre>";
          // print_r($main_category  );die;
          ?>
      <div class="dropdown dropdown-toggle" >
        <a type="button" id="dbtn"  >
        <p><?php echo ucwords($cat_name);?></p>
        </a>
        <?php //} ?>
    <div class="dropdown-menu ">
    <a class="dropdown-item" href="<?php echo base_url().'products/'.$cat_id ?>"><?php //echo "All ".$cat_name;?></a>
      <?php 
      if(strtolower($cat_name) == "cakes"){
        echo '<a class="dropdown-item" style="color:orange">Cakes By Flavors</a><a class="dropdown-item" href="'.base_url().'all_cakes">All Cakes</a>';
      }
    foreach($sub_categories as $sub_cat){
      /* echo "<pre>";
    print_r($sub_cat);die;
      $sub_cat = explode('/',$sub_cat);
        $cat_name = $sub_cat[0];
        $cat_id = $sub_cat[1]; */
        if($sub_cat !==""){
            ?>
      <a class="dropdown-item" href="<?php echo base_url().'products/'.$sub_cat.'/'.$cat_id ?>"><?php echo $sub_cat;?></a>
      <?php }
    } ?>
    </div>
    </div>
    <?php $i++; } 
    }
  }?>
        
      </div>
    </nav>
    
    <?php //print_r($params);die;
    // ucwords(str_replace('_',' ',$params[2]))
    if($params[1]!==""){
    ?>
    <div style="margin-left: 15px" class="breadcrumb1">
      <p><a href="<?php echo base_url()?>">Home</a><span> ></span>
      <?php
        if(isset($params[2])){
      ?>
      <a href="<?php echo base_url().$params[1]?>"><?php echo ucwords(str_replace('_',' ',$params[1])); ?></a> > <?php 
      if(strpos($params[2],'_')){echo ucwords(str_replace('_',' ',$params[2]));}else{echo ucwords(str_replace('%20',' ',$params[2]));} ?>
      <?php }else{ ?>
        <?php echo ucwords(str_replace('_',' ',$params[1])); ?>
        <?php } ?>
    </p>
    </div>
    <?php } ?>
    
</div>