<?php require_once('header.php') ?>
                <main>
                    
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Products</h3>
                        <?php echo $this->session->flashdata('response'); ?>
<form class="border p-3" method="post" action="<?php echo base_url('product'); ?>" enctype="multipart/form-data">
        <div class="form-row row">
                <div class="form-group col-md-6">
                <label class="text-primary bold" for="productName">Product Name</label>
                <input type="text" class="form-control" name ="product_name" id="productName" placeholder="Enter product name">
                <span class="text-danger"><?php echo form_error('product_name'); ?></span>
                
                </div>
                <div class="form-group col-md-6">
                <label class="text-primary bold" for="productCategory">Product Category</label>
                <select class="form-control" id="productCategory" name ="product_category">
                    <option value="">Select Category</option>
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

                <textarea class="form-control" id="productDescription" rows="1" name ="product_description"></textarea>
                <span class="text-danger"><?php echo form_error('product_description'); ?></span>
            </div>
            <br>    
            <div class="form-group col-md-6">
                <label class="text-primary bold" for="productStatus">Product Status</label>
                <select class="form-control" id="productStatus" name ="product_status">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <span class="text-danger"><?php echo form_error('product_status'); ?></span>
                </div>

</div>
  <div class="form-row row">
  <div class="form-group col-md-6">
  
                     <div id="price">

  
                    </div>
                    <button id="addInputBtn" class="form-control btn btn-warning" >Add Sizes And Price</button>
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary bold" for="productImage">Product Image</label>
            <br>
            <input type="file" class="form-control-file" id="productImage" name="image">
        </div>
  </div>
  <div class="form-row row">
    <div class="form-group col-md-11">
        </div>

        <div class="text-right col-md-1">
            <input type="submit" value="Submit" class="btn btn-primary">
</div>
</div>
  

</form>
<br>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Products table
                            </div>
                            <div class="card-body">
                                <table id="products" class = "table table-bordered table-stripedy">
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                            <th>Category</th>
                                            <th>Desc</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

              
                <?php require_once('footer.php') ?>
                