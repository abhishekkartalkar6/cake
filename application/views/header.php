<?php 
$params = explode('/',$_SERVER['REQUEST_URI']);

?>

<!Doctype html>
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

        #search_suggestion{
   position: absolute;
   top: 40px;
   left: 0;
   right: 0;
   background-color: #fff;
   border: 1px solid #ccc;
   border-top: none;
   z-index: 99;
}
#search_suggestion ul{
   list-style: none;
   margin: 0;
   padding: 0;
}
#search_suggestion li{
   padding: 10px;
   cursor: pointer;
}
#search_suggestion li:hover{
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
          <li style="padding-left: 8px;"><a href="<?php echo base_url()?>categories">All Categories</a></li>
          <li style="padding-left: 8px;"><a href="<?php echo base_url()?>products">All Products</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search">
          <div id="search_suggestion"></div>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
