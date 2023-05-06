<?php require_once('header.php') ;
// echo "<pre>";
// print_r($allProducts);die;
?>
<style>
  img{
    width: 330px;
    height: 260px;
  }
  .card {
    margin : 10px;
    background-color: #e4ff015c !important;
    border: 0 !important;
    border-radius: 0 !important;
  }
  .card-body {
    padding: 10px !important;
  }
  .product_title {
    white-space: nowrap; 
    width: auto; 
    overflow: hidden;
    text-overflow: ellipsis;
    padding : 5px; 
          
        }
  @media screen and (max-width: 767px) {
        img{
        
        width: 330px;
        height: 170px !important;
      }
      .card {
        margin-left : 5px;
        margin-right : 5px;
        background-color: #e4ff015c !important;
        border: 0 !important;
        border-radius: 0 !important;
      }
      .card-body {
        padding: 0px !important;
      }
  }
  .card:hover{
          color: blue;
          /* border :red 2px solid; */
          box-shadow:  0px 15px 10px -10px green;
        }
        .container {
            max-width: 1334px;
        }
        
</style>
<?php 
      $title = "All Products";
      if(isset($product_by_cat_subcat)){
        $allProducts = $product_by_cat_subcat;
        $title = "All ".ucwords($allProducts[0]->sub_cat)." Products";
      }elseif(isset($product_by_cat)){
        $allProducts = $product_by_cat;
        $title = "All ".ucwords($allProducts[0]->category_name)." Products";
      }elseif(isset($all_cakes)){
        $allProducts = $all_cakes;
        $title = "All Cakes";
      }
?>

<section style="background-color: ;">
  <h5 class="text-center" style="color:blue;text-decoration:"><?php echo $title ?></h5>
  <div class="container py-2">
    <div class="row  " id="row_to_add">
      
<?php
      if($allProducts){
        foreach($allProducts as $product){
          if(isset($_GET['debug']) && $_GET['debug'] == 1){
          echo "<pre>";
          print_r($product);
          }
            $prices = explode(',',$product->prices);
            ?>
            <div  class="col-6 col-lg-4 pl-0 pr-0 sort_by_filter">
              
              <a href="<?php echo base_url(); ?>final_product/<?php echo $product->product_id; ?>">
              <div class="card">
          <!-- <img class="lazy card-img-top" data-src="<?php //echo $product->image_url?>"
             alt="Image" src="<?php //echo base_url(); ?>assets/uploads/default_images/lazyload.jpg"/> -->
          <img class="lazy card-img-top" src="<?php echo $product->image_url?>"
             alt="Image" />
          <div class="card-body">

            <div class="text-center">
              <h6 class="product_title" style="word-break: break-all"><?php echo ucwords($product->product_name) ?></h6>
              <h5 class="text-dark mb-0">₹ <?php echo min($prices)?></h5>
            </div>

            <div class="d-flex justify-content-between mb-2">
              <div class="ms-auto text-warning">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
        <?php } }
      // } ?>
    </div>
  </div>
  <script>
      document.addEventListener("DOMContentLoaded", function() {
        
        var lazyloadImages = document.querySelectorAll("img.lazy"); 
        // console.log(lazyloadImages);return false;

        var lazyloadThrottleTimeout;
        
        function lazyload () {
          if(lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
          }    
          
          lazyloadThrottleTimeout = setTimeout(function() {
              var scrollTop = window.pageYOffset;
              lazyloadImages.forEach(function(img) {
                // console.log(img.dataset);
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
              }
          }, 20);
        }
        lazyload();
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
      });

    
    </script>
</section>
    <?php require_once('footer.php') ?>
