<?php require_once('header.php') ;
// echo "<pre>";
// print_r($allProducts);die;
?>
<style>





  img{
    /* display: none; */
    width: 80%;
    height: 400px;
  }
  @media screen and (max-width: 767px) {
        img{
        
        width: 100%;
        height: 350px !important;
      }
      .img-thumbnail{
        width: 100%;
        height: 150px !important;
      }
    
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


  .btn {
  background-color: #ffffff; /* White button background */
  color: #000000; /* Black text color */
  border: 2px solid #000000;
}
.set-active{
    background-color: #D70040;
    color: #ffffff;
  }
</style>

    <section style="background-color: ;">
  <div class="text-center">
    <div class="row">
 
<div class="col-md-5">
  <img src="<?php echo $product[0]->image_url; ?>" alt="" style= "">
</div>
<?php 
$size_arr = explode(",",$product[0]->sizes);

?>
<a href=""></a>
<div class="col-md-6 text-left">
<h3><?php echo $product[0]->product_name;?></h3>
 
  <br>
  <h6 class = "text-left"><?php echo $product[0]->product_description;?></h6>
  <br>
<h2>₹<strong><span id= "final_price"></span></strong></h2>
  <h5>Choose Weight:</h5>
  <div class="container">
      <?php 
      $cnt = 0;
      foreach($size_arr as $arr){
        $size_pric =  explode("-",$arr);
        // echo $size_pric[1];
      ?>
      <input type="hidden" class= "input-field" value = "<?php echo $size_pric[1]; ?>">
        <button class="btn  pricing <?php echo ($cnt == 0)? 'set-active':''?>" style=" margin : 10px;"><?php echo $size_pric[0]; ?></button>
     <?php $cnt ++; } ?>
      </div>
      <br>
      
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
