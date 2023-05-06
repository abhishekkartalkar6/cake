
<?php 


require_once('header.php') ?>
 
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
      /* echo "<pre>";
        print_r($category);die; */
    ?>
      <div class="image-container">
      <a href="<?php echo base_url().'products/'.$category->id.'/' ?>"><img class="img-thumbnail" src="<?php echo $category->category_image?>" alt="Image 1">
      <p style="word-break: break-word" class="text-center cat_title" ><?php echo ucwords($category->category_name) ?></p>
      </a>
      </div>
    <?php } ?>
    </div>
    <?php } ?>
    <div class="product-main">
    <?php
    if(isset($fourProducts)){
      foreach($fourProducts as $name => $products){
        // echo "<pre>";
        // print_r($products);die;
        $name = explode('/',$name);
        $cat_name = $name[0];
        $cat_id = $name[1];
        ?>
    <hr/>
    <div><h3 class="title home-page-product-row-titile"><?php echo ucwords($cat_name) ?><a href="<?php echo base_url().'products/'.$cat_id; ?>" class="btn btn-primary" style="float:right; position:relative;margin-right: 67px;font-size:15px;">View All</a></h3>
    </div><hr/>
    <div class="product-containered">
      <?php 
        foreach($products as $product){
          
        /* echo "<pre>";
        print_r($product);die; */
        $prices = explode(',',$product->price);
        ?>
      <div class="product-image-container">
      <a href="<?php echo base_url().'products' ?>"><img class="lazy" data-src="<?php echo $product->image_url?>" alt="Image 1" src="<?php echo base_url(); ?>assets/uploads/default_images/lazyload.jpg">
      <p style="word-break: break-all" class="text-center product-cat_title" ><?php echo ucwords($product->product_name) ?></p>
      <p><strong>Starting from ₹ <?php echo min($prices)?></strong></p>
      </a>
      </div>
      <?php }
    //}?>
    </div>
      <?php } } // }?>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        
        var lazyloadImages = document.querySelectorAll("img.lazy");    
        var lazyloadThrottleTimeout;
        
        function lazyload () {
          if(lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
          }    
          
          lazyloadThrottleTimeout = setTimeout(function() {
              var scrollTop = window.pageYOffset;
              lazyloadImages.forEach(function(img) {
                  if(img.offsetTop < (window.innerHeight + scrollTop)) {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    if(img.dataset.src == ""){
                      img.dataset.src = "<?php echo base_url(); ?>assets/uploads/default_images/lazyload.jpg";
                    }
                  }
              });
              if(lazyloadImages.length == 0) { 
                document.removeEventListener("scroll", lazyload);
                window.removeEventListener("resize", lazyload);
                window.removeEventListener("orientationChange", lazyload);
              }else{
                // alert("hello");
              }
          }, 20);
        }
        lazyload();
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
      });
    </script>
    <?php require_once('footer.php') ?>
