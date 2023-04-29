<?php require_once('header.php') ?>

    
    
    <div class="product-main">
    <div class="product-containered">
      <?php 
        foreach($allCategories as $category){
        ?>
      <div class="product-image-container">
      <a href="<?php echo base_url().'products/'.$category->category_name.'/' ?>"><img class="lazy" data-src="<?php echo $category->category_image?>" alt="Image 1" src="<?php echo base_url(); ?>assets/uploads/default_images/lazyload.jpg">
      <p style="word-break: break-all" class="text-center product-cat_title" ><?php echo ucwords($category->category_name) ?></p>
      </a>
      </div>
      <?php }
    //}?>
    </div>
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
    <?php require_once('footer.php') ?>
