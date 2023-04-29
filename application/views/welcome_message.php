<?php require_once('header.php') ?>
 
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <?php $cnt = 1 ;foreach($banners as $banner){
          if($cnt == 1){ ?>
          <div class="carousel-item active">
          <img class="d-block w-100 courosel" src="<?php echo $banner->banner_img;?>" alt="First slide">
        </div>
<?php }else{ ?>
  <div class="carousel-item ">
          <img class="d-block w-100 courosel" src="<?php echo $banner->banner_img;?>" alt="First slide">
        </div>
<?php } ?>
          
        <?php $cnt++; }  ?>
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
    if(isset($fourProducts)){
      foreach($fourProducts as $name => $products){?>
    <hr/>
    <h3 class="title home-page-product-row-titile"><?php echo ucwords($name) ?></h3>
    <hr/>
    <div class="product-containered">
      <?php 
        foreach($products as $product){
          
        /* echo "<pre>";
        print_r($product);die; */
        $prices = explode(',',$product->price);
        ?>
      <div class="product-image-container">
      <a href="<?php echo base_url().'products' ?>"><img class="img-thumbnail" src="<?php echo $product->image_url?>" alt="Image 1"></a>
      <p style="word-break: break-all" class="text-center product-cat_title" ><?php echo ucwords($product->product_name) ?></p>
      <p><strong>₹ <?php echo min($prices)?></strong></p>
      </div>
      <?php }
    //}?>
    </div>
      <?php } } // }?>
    </div>
    <?php require_once('footer.php') ?>
