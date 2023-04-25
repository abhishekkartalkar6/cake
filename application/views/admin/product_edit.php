<?php require_once('header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products Edit</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Categories</li>
                        </ol> -->


                            
                        <!-- The form -->
                            <form action="<?php echo site_url('products/product_edit') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-row row">
                <div class="form-group col-md-6">
                <label class="text-primary bold" for="productName">Product Name</label>
                <input type="hidden" name="product_id" id="" value="<?php echo $single_product[0]->product_id; ?> ">
                <input type="hidden" name="product_id" id="" value="<?php echo $single_product[0]->product_id; ?> ">
                <input type="text" class="form-control" name ="product_name" id="productName" value="<?php echo $single_product[0]->product_name; ?> " placeholder="Enter product name">
                <span class="text-danger"><?php echo form_error('product_name'); ?></span>
                
                </div>
                <div class="form-group col-md-6">
                <label class="text-primary bold" for="productCategory">Product Category</label>
                <select class="form-control" id="productCategory" name ="product_category">
                    <option value="<?php echo $single_product[0]->product_category; ?>"><?php echo $single_product[0]->category_name; ?></option>
                    <?php foreach($categories as $category){ ?>
                        <option value="<?php echo  $category->id; ?>"><?php echo  $category->category_name; ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?php echo form_error('product_category'); ?></span>
                </div>
        </div>
 
  <div class="form-row row">
            <div class="form-group col-md-6">
                <label class="text-primary bold" for="productDescription">Product Description</label>
                <textarea class="form-control" id="productDescription" rows="1" name ="product_description"><?php echo $single_product[0]->product_description; ?></textarea>
                <span class="text-danger"><?php echo form_error('product_description'); ?></span>
            </div>
            <div class="form-group col-md-6">
                <label class="text-primary bold" for="productStatus">Product Status</label>
                <select class="form-control" id="productStatus" name ="product_status">
                    <option value="<?php echo $single_product[0]->product_status; ?>"><?php echo $single_product[0]->product_status; ?></option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <span class="text-danger"><?php echo form_error('product_status'); ?></span>
                </div>

</div>
  <div class="form-row row">
  <div class="form-group col-md-6">
  
                     <div id="price">
                        <?php
                        $size_prices = explode(",",$single_product[0]->sizes);
                        foreach($size_prices as  $size_price){ 
                            $arr = explode("-",$size_price);
                            ?>
                            <div class="form-row row border p-2"><span><button onclick="removeItem(this.parentNode.parentNode); return false;"><i class="fa fa-close"></i></button></span><div class="form-group col-md-6"><label class="text-primary bold" for="productDescription">Size</label><input type="text" value = "<?php echo $arr[0]; ?>" class="form-control" name="size[]" id="" required></div>
                            <div class="form-group col-md-6">
                                <label class="text-primary bold" for="productDescription">Price</label>
                                <input type="text" value = "<?php echo $arr[1]; ?>" class="form-control" name="price[]" id="" required>
                                <input type="hidden" value = "<?php echo $arr[2]; ?>"class="form-control" name="id[]" id="" required></div>
                        </div>
                       <?php }
                        ?>
                     
                    </div>
                    <button id="addInputBtn" class="form-control btn btn-warning" >Add Sizes And Price</button>
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary bold" for="productImage">Product Image</label>
            <br>
            <input type="file" class="form-control-file" id="productImage" name="image" >
        </div>
  </div>
  <div class="form-row row">
    <div class="form-group col-md-11">
        </div>

        <div class="text-right col-md-1">
            <input type="submit" value="Submit" class="btn btn-primary">


                            </form>
                        </div>
                        </div>
                    </div>
                </main>

                <?php require_once('footer.php') ?>
                