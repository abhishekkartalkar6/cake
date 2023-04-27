<?php require_once('header.php') ?>

    
    
    <div class="product-main">
    <div class="product-containered">
      <?php 
        foreach($allCategories as $category){
        ?>
      <div class="product-image-container">
      <a href="<?php echo base_url().'products/'.$category->category_name.'/' ?>"><img class="img-thumbnail" src="<?php echo $category->category_image?>" alt="Image 1"></a>
      <p style="word-break: break-all" class="text-center product-cat_title" ><?php echo ucwords($category->category_name) ?></p>
      </div>
      <?php }
    //}?>
    </div>
    </div>
    <?php require_once('footer.php') ?>