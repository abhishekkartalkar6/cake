<?php require_once('header.php') ;
// echo "<pre>";
// print_r($allProducts);die;
?>
<style>
  img{
    /* display: none; */
    width: 348px;
    height: 232px;
  }
</style>

    <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
    <?php 
        foreach($allProducts as $product){
          if((isset($params[3]) && $product->category_name == $params[3]) || !(isset($params[3])) ){
          
        $prices = explode(',',$product->prices);
        ?>
  
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
          <!-- <div class="d-flex justify-content-between p-3">
            <p class="lead mb-0"><?php echo ucwords($product->product_name) ?></p>
            <div
              class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
              style="width: 35px; height: 35px;">
              <p class="text-white mb-0 small">x4</p>
            </div>
          </div> -->
          <img class="lazy card-img-top" data-src="<?php echo $product->image_url?>"
             alt="Image" src="<?php echo base_url(); ?>assets/uploads/default_images/lazyload.jpg"/>
          <div class="card-body">
            <!-- <div class="d-flex justify-content-between">
              <p class="small"><a href="#!" class="text-muted">Laptops</a></p>
              <p class="small text-danger"><s>₹ <?php echo min($prices)?></s></p>
            </div> -->

            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0"><?php echo ucwords($product->product_name) ?></h5>
              <h5 class="text-dark mb-0">₹ <?php echo min($prices)?></h5>
            </div>

            <div class="d-flex justify-content-between mb-2">
              <!-- <p class="text-muted mb-0">Available: <span class="fw-bold">6</span></p> -->
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
      </div>
      <?php } } ?>
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
        
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
      });
    </script>
</section>
    <?php require_once('footer.php') ?>