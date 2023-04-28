<?php require_once('header.php') ;
// echo "<pre>";
// print_r($allProducts);die;
?>

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
          <div class="d-flex justify-content-between p-3">
            <p class="lead mb-0"><?php echo ucwords($product->product_name) ?></p>
            <div
              class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
              style="width: 35px; height: 35px;">
              <p class="text-white mb-0 small">x4</p>
            </div>
          </div>
          <img src="<?php echo $product->image_url?>"
            class="card-img-top" alt="Laptop" />
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
</section>
    <?php require_once('footer.php') ?>