<?php require_once('header.php') ;
// echo "<pre>";
// print_r($allProducts);die;
?>
<style>
  img{
    /* display: none; */
    width: 330px;
    height: 232px;
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
</style>

    <section style="background-color: ;">
  <div class="text-center">
    <div class="row">
 
<div class="col-md-5">
  <img src="<?php echo $product[0]->image_url; ?>" alt="">
</div>
<?php 
$size_arr = explode(",",$product[0]->sizes);

?>
<a href=""></a>
<div class="col-md-6">

  <h3><?php echo $product[0]->product_name;?></h3>
  <br>
<div class="containered">
      <?php 
      foreach($size_arr as $arr){
        $size_pric =  explode("-",$arr);
      
      ?>
        <div class="image-container_product_landing text-center pb-2">
        <p style="word-break: break-word" class="text-center cat_title" ><b><?php echo $size_pric[0]; ?></b></p>
        <a href=""><img class="img-thumbnail" width = "100" src="<?php echo $product[0]->image_url;?>" alt="Image 1">
        <p style="word-break: break-word" class="text-center cat_title" ><b><?php echo  "₹".$size_pric[1]; ?></b></p>
        </a>
        <button class = "btn btn-primary text-center">ADD</button>
        </div>
      <?php } ?>
      </div>

      </div> 
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