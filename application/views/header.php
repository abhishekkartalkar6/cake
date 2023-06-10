<?php 
$params = explode('/',$_SERVER['REQUEST_URI']);
?>

<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">

        <title>Mygiftsy</title>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="<?php echo base_url()?>"><strong>MyGiftsy</strong></a>
          <button class="navbar-toggler" type="button" id="toggleButton" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="">
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
        <div class="steven-and-leah" style="margin-bottom:10px" >
      
            
          </div>
    </nav>
    <div class= "">
  <br>
<div class="category-container">
  <div class="category">
    <h6>Main Category 1</h6>
    <ul class="subcategories">
      <li>Subcategory 1.1</li>
      <li>Subcategory 1.2</li>
      <li>Subcategory 1.3</li>
    </ul>
  </div>
  <div class="category">
    <h6>Main Category 2</h6>
    <ul class="subcategories">
      <li>Subcategory 2.1</li>
      <li>Subcategory 2.2</li>
      <li>Subcategory 2.3</li>
    </ul>
  </div>
</div>


</div>
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

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <!-- Sidebar content -->
  <div class="search-box">
      <input type="text" placeholder="Search" id="search-input">
      <ul id="suggestions"></ul>
    </div>
  <ul>
    category Will shown here
    <li><a href="#">Link 1</a></li>
    <li><a href="#">Link 2</a></li>
    <!-- Add more sidebar links here -->
  </ul>
</div>
