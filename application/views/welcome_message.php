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
          .courosel {
            height: 550px;
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
          justify-content: space-between;
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
          margin-left: 15px;
          margin-right: 15px;
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
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
       
        /* In this updated code, the @media query applies to screens with a maximum width of 767px (typically mobile devices). When this condition is met, the width of the image-container class is changed to 25% minus 10 pixels of margin, effectively fitting 4 divs on each row. This way, the 8 divs are displayed in two rows on mobile view. */
      </style>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">MyGiftsy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 courosel" src="<?php echo base_url().'assets/images/home_1.JPG' ?>" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 courosel" src="<?php echo base_url().'assets/images/home_2.JPG' ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 courosel" src="<?php echo base_url().'assets/images/home_3.JPG' ?>" alt="Third slide">
        </div>
      </div>
    </div>
    <br>
    <?php 
    // echo "<pre>";
    // print_r($allProducts);die;
    $categories = array_slice($allCategories,0,8);
    if(isset($categories)){ ?>
    <div class="containered">
    <?php
    foreach($categories as $category){
    ?>
      <div class="image-container">
      <a href="<?php //echo base_url().'products/'.$category->category_name.'/' ?>"><img class="img-thumbnail" src="<?php echo $category->category_image?>" alt="Image 1"></a>
      <p style="word-break: break-all" class="text-center cat_title" ><?php echo ucwords($category->category_name) ?></p>
      </div>
    <?php } ?>
    </div>
    <?php } ?>
    <div class="product-main">
    <?php 
    // if($products_categoy == $category->category_name){
    $topFourCat = array_slice($allCategories,0,4);
    foreach($topFourCat as $category){ ?>
    <hr/>
    <h3 class="title home-page-product-row-titile"><?php echo ucwords($category->category_name) ?></h3>
    <hr/>
    <div class="product-containered">
      <?php 
      // if($products_categoy == $category->category_name){
      $topFourProducts = array_slice($allProducts,0,4);
      foreach($topFourProducts as $product){
        /* echo "<pre>";
        print_r($product);die; */
        $prices = explode(',',$product->prices);
        ?>
      <div class="product-image-container">
      <a href="<?php //echo base_url().'products/'.$category->category_name.'/' ?>"><img class="img-thumbnail" src="<?php echo $product->image_url?>" alt="Image 1"></a>
      <p style="word-break: break-all" class="text-center product-cat_title" ><?php echo ucwords($product->product_name) ?></p>
      <p><strong>₹<?php echo min($prices)?></strong></p>
      </div>
      <?php } // }?>
    </div>
      <?php } // }?>
    </div>
    <!-- <div class="product-container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <img src="http://localhost/cake/assets/uploads/category_images/category-11.jpg" class="img-thumbnail img-fluid" alt="Your Image">
        </div>
        <div class="col-md-3 col-sm-12">
          <img src="http://localhost/cake/assets/uploads/category_images/category-11.jpg" class="img-thumbnail img-fluid" alt="Your Image">
        </div>
        <div class="col-md-3 col-sm-12">
          <img src="http://localhost/cake/assets/uploads/category_images/category-11.jpg" class="img-thumbnail img-fluid" alt="Your Image">
        </div>
        <div class="col-md-3 col-sm-12">
          <img src="http://localhost/cake/assets/uploads/category_images/category-11.jpg" class="img-thumbnail img-fluid" alt="Your Image">
        </div>
      </div>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>