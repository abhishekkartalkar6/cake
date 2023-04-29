<?php require_once('header.php') ?>
                <main>
                    
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Website banner/slider</h3>
                        <?php echo $this->session->flashdata('response'); ?>
<form class="border p-3" method="post" action="<?php echo base_url('add_banner'); ?>" enctype="multipart/form-data">
       
  <div class="form-row row">
  
        <div class="form-group col-md-6">
            <label class="text-primary bold" for="productImage">Banner Image</label>
            <br>
            <input type="file" class="form-control-file" id="productImage" name="image">
            <input type="hidden" value = "1" class="form-control-file" id="productImage" name="image">
            <br>
            <br>

Note : please try to add banner image with minimum size as possible and max resolutions.
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
                                Banner table
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Sr No</th>
                                            <th>Image URl</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>
                                            
                                            <?php if(isset($banners)){ $cnt = 1; foreach ($banners as $banner){ ?>
                                            <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $banner->banner_img; ?></td>
                                            <td> <img src="<?php echo $banner->banner_img;?>" alt="images" width="120" height="80"></td>
                                            <td><a href="<?php $string = $banner->banner_img;;
                                                    $parts = explode("/", $string);
                                                    $last = end($parts);
                                            echo 'delete_banner/'.$banner->banner_id."~".$last;?>"><button class="btn btn-danger">Delete</button></td>
                                            </tr>
                                          <?php $cnt ++; }}  ?>
                                           
                                        
                                     
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

              
                <?php require_once('footer.php') ?>
                