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
    <?php foreach($nav_bar as $nav){ ?>
      <div class="category">
    <h6 class="text-warning"><?php echo $nav['category_name'];  ?></h6>
    <div class="subcategories">
    <?php if(!empty($nav['children'])){

     foreach($nav['children'] as $sub_nav){ ?>
        <div class="container cat_back">
        <u class="text-primary"><h6><?php echo $sub_nav['category_name']; ?></h6></u> 
          <?php foreach($sub_nav['children'] as $sub_sub_nav){ ?>
          <h6><?php echo $sub_sub_nav['category_name']; ?></h6>
          <?php } ?>
        </div> <?php } } else{
          ?> <h6 class = "p-5">category Comming soon</h6> <?php 
          }?>
    </div>
    
  </div>
  <?php  } ?>
 
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
          $second_param = explode('-',$params[2]);
          // $second_param = array_pop($second_param);
          // print_r($second_param);die;
          $second_param = $second_param[0];
      ?>
      <a href="<?php echo base_url().$params[1]?>"><?php echo ucwords(str_replace('_',' ',$params[1])); ?></a> > <?php 
      if(strpos($second_param,'_')){echo ucwords(str_replace('_',' ',$second_param));}else{echo ucwords(str_replace('%20',' ',$second_param));} ?>
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
  <!-- <ul class="all_main_cats">
    <?php foreach($nav_bar as $nav){ ?>
    <li><?php echo $nav['category_name'];  ?>
    <?php if(!empty($nav['children'])){
      foreach($nav['children'] as $sub_nav){ ?>
        <ul class="all_sub_cats">
              <li><?php echo $sub_sub_nav['category_name']; ?>
            <ul class="all_child_cats">
                <?php foreach($sub_nav['children'] as $sub_sub_nav){ ?>
                          <h6><?php echo $sub_sub_nav['category_name']; ?></h6>
                          <?php } ?>
            </ul></li>
        </ul><?php } } else{
              ?> <h6 class = "p-5">category Comming soon</h6> <?php 
              }?></li>
          <?php } ?>
  </ul> -->

<div class="nav_bar_mob">
  <?php $val = 1; foreach($nav_bar as $nav){ ?>
  <ul class="cd-accordion margin-top-lg margin-bottom-lg">
  <li class="cd-accordion__item cd-accordion__item--has-children">
    <input class="cd-accordion__input" type="checkbox" name ="group-<?php echo $val;?>" id="group-<?php echo $val;?>">
    <label class="cd-accordion__label cd-accordion__label--icon-folder" for="group-<?php echo $val;?>"><span><?php echo $nav['category_name'];  ?></span></label>

    <?php if(!empty($nav['children'])){
      foreach($nav['children'] as $sub_nav){ ?>
    <ul class="cd-accordion__sub cd-accordion__sub--l1">
      <li class="cd-accordion__item cd-accordion__item--has-children">
        <input class="cd-accordion__input" type="checkbox" name ="sub-group-<?php echo $val;?>" id="sub-group-<?php echo $val;?>">
        <label class="cd-accordion__label cd-accordion__label--icon-folder" for="sub-group-<?php echo $val;?>"><span><?php echo $sub_sub_nav['category_name']; ?> <?php echo $val;?></span></label>

        <ul class="cd-accordion__sub cd-accordion__sub--l2">
        <?php foreach($sub_nav['children'] as $sub_sub_nav){ ?>
          <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span><?php echo $sub_sub_nav['category_name']; ?></span></a></li>
          <?php } ?>
        </ul>
      </li>
    </ul>
    <?php } } else{ ?>
    <?php 
              }?>
  </li>
</ul> <!-- cd-accordion -->
<?php $val++;} ?>
</div>
</div>
