<?php require_once('header.php') ;
// echo "<pre>";
// print_r($allProducts);die;
?>
<style>
  .button {
    --background: #362a89;
    --text: #fff;
    --cart: #fff;
    --tick: var(--background);
    position: relative;
    border: none;
    background: none;
    padding: 8px 28px;
    border-radius: 8px;
    -webkit-appearance: none;
    -webkit-tap-highlight-color: transparent;
    -webkit-mask-image: -webkit-radial-gradient(white, black);
    overflow: hidden;
    cursor: pointer;
    text-align: center;
    min-width: 100%;
    color: var(--text);
    background: var(--background);
    transform: scale(var(--scale, 1));
    transition: transform 0.4s cubic-bezier(0.36, 1.01, 0.32, 1.27);
}

.button:active {
    --scale: 0.95;
}

.button span {
    font-size: 100%;
    font-weight: 500;
    display: block;
    position: relative;
    padding-left: 24px;
    margin-left: -8px;
    line-height: 26px;
    transform: translateY(var(--span-y, 0));
    transition: transform 0.7s ease;
}

.button span:before,
.button span:after {
    content: '';
    width: var(--w, 2px);
    height: var(--h, 14px);
    border-radius: 1px;
    position: absolute;
    left: var(--l, 8px);
    top: var(--t, 6px);
    background: currentColor;
    transform: scale(0.75) rotate(var(--icon-r, 0deg)) translateY(var(--icon-y, 0));
    transition: transform 0.65s ease 0.05s;
}

.button span:after {
    --w: 14px;
    --h: 2px;
    --l: 2px;
    --t: 12px;
}

.button .cart {
    position: absolute;
    left: 50%;
    top: 50%;
    margin: -13px 0 0 -18px;
    transform-origin: 12px 23px;
    transform: translateX(-120px) rotate(-18deg);
}

.button .cart:before,
.button .cart:after {
    content: '';
    position: absolute;
}

.button .cart:before {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    box-shadow: inset 0 0 0 2px var(--cart);
    bottom: 0;
    left: 9px;
    filter: drop-shadow(11px 0 0 var(--cart));
}

.button .cart:after {
    width: 100%;
    height: 9px;
    background: var(--cart);
    left: 9px;
    bottom: 7px;
    transform-origin: 50% 100%;
    transform: perspective(4px) rotateX(-6deg) scaleY(var(--fill, 0));
    transition: transform 1.2s ease var(--fill-d);
}

.button .cart svg {
    z-index: 1;
    width: 10%;
    height: 26px;
    display: block;
    position: relative;
    fill: none;
    stroke: var(--cart);
    stroke-width: 2px;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.button .cart svg polyline:last-child {
    stroke: var(--tick);
    stroke-dasharray: 10px;
    stroke-dashoffset: var(--offset, 10px);
    transition: stroke-dashoffset 0.4s ease var(--offset-d);
}

.button.loading {
    --scale: 0.95;
    --span-y: -32px;
    --icon-r: 180deg;
    --fill: 1;
    --fill-d: 0.8s;
    --offset: 0;
    --offset-d: 1.73s;
}

.button.loading .cart {
    animation: cart 3.4s linear forwards 0.2s;
}

@keyframes cart {
    12.5% {
        transform: translateX(-60px) rotate(-18deg);
    }

    25%,
    45%,
    55%,
    75% {
        transform: none;
    }

    50% {
        transform: scale(0.9);
    }

    44%,
    56% {
        transform-origin: 12px 23px;
    }

    45%,
    55% {
        transform-origin: 50% 50%;
    }

    87.5% {
        transform: translateX(70px) rotate(-18deg);
    }

    100% {
        transform: translateX(140px) rotate(-18deg);
    }
}

html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
}



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
<div class="col-md-6">
<h3><?php echo $product[0]->product_name;?></h3>
 
  <br>
  <h6 class = "text-left"><?php echo $product[0]->product_description;?></h6>
  <br>
<div class="containered">
<div  class="row">
      <?php 
      foreach($size_arr as $arr){
        $size_pric =  explode("-",$arr);
      
      ?>
      
      <div class = "col-2"> 
      <p style="word-break: break-word" class="text-center cat_title" ><b><?php echo $size_pric[0]; ?></b></p>
        <div class="image-container_product_landing text-center pb-2">
        
        <a href=""><img class="img-thumbnail" width = "100%" src="<?php echo $product[0]->image_url;?>" alt="Image 1">
        
        </a>
       
        </div>
        <p style="word-break: break-word" class="text-center cat_title" ><b><?php echo  "₹".$size_pric[1]; ?></b></p>
        <a href="https://api.whatsapp.com/send?phone=7057423626&text=Hello mygiftsy I want to order <?php if(isset($_SERVER['SCRIPT_URI'])){echo $_SERVER['SCRIPT_URI']; } ?> of size  <?php echo $size_pric[0]; ?> can you please confirm.">
        <button class="button">
            <span>Add to cart</span>
            <div class="cart">
                <svg viewBox="0 0 36 26">
                    <polyline
                        points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"
                    ></polyline>
                    <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                </svg>
            </div>
        </button>
        </a>
        </div>
      <?php } ?>
      </div>
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

      document.querySelectorAll(".button").forEach((button) =>
    button.addEventListener("click", (e) => {
        if (!button.classList.contains("loading")) {
            button.classList.add("loading");
            setTimeout(() => button.classList.remove("loading"), 3700);
        }
        // e.preventDefault();
    })
);
    </script>
</section>
    <?php require_once('footer.php') ?>
