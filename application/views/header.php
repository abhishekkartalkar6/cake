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
          .courosel img{
            height: 40x;
            width: 100%;
            height: auto;
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

       
        /* In this updated code, the @media query applies to screens with a maximum width of 767px (typically mobile devices). When this condition is met, the width of the image-container class is changed to 25% minus 10 pixels of margin, effectively fitting 4 divs on each row. This way, the 8 divs are displayed in two rows on mobile view. */
      </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo base_url()?>">MyGiftsy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <div class="search-box">
  <input type="text" placeholder="Search" id="search-input">
  <ul id="suggestions"></ul>
</div>
          <li style="padding-left: 8px;"><a href="<?php echo base_url()?>categories">All Categories</a></li>
          <li style="padding-left: 8px;"><a href="<?php echo base_url()?>products">All Products</a></li>
        </ul>
      </div>
    </nav>

    <style>
      .steven-and-leah > * {
        display: inline-block;
      }
      .steven-and-leah{
        margin-top: 15px;
        text-align:center;
      }
      /* .steven-and-leah > * a:hover {
        color:red;
      } */
      .steven-and-leah > * #dbtn:hover {
        background-color:#00CED1;
      }
      #dbtn{
        padding:5px;
      }
      .dropdown:hover .dropdown-menu {
        display: block;
      }
    </style>
    
    <div class="steven-and-leah" >
    <?php 
    /* echo "<pre>";
    print_r($nav_bar);die; */
    $i = 0;
    foreach($nav_bar['categories'] as $main_category => $sub_categories){
            ?>

      <div class="dropdown ">
        <a type="button" id="dbtn"  data-toggle="dropdown">
        <?php echo ucwords($main_category);?>
        </a>
    <div class="dropdown-menu ">
    <?php 
    foreach($sub_categories as $sub_cat){
            ?>
      <a class="dropdown-item" href="<?php echo base_url().'products/'.trim(strtolower(str_replace(' ','-',$sub_cat))).'/'.$nav_bar['id'][$i]; ?>"><?php echo $sub_cat; ?></a>
      <?php } ?>
    </div>
    </div>
    <?php $i++; } ?>
    
    
</div>