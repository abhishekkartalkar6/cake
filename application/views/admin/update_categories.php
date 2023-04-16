<?php require_once('header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        
                        <div class="row">
                        <div class="col-xl-6">
                            
                        <!-- The form -->
                            <form action="<?php echo site_url('update_cat') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $category[0]->id;?>">
                                <label for="category">Category:</label>
                                <input class="form-control" id="category" name="category" value="<?php echo $category[0]->category_name;?>">
                            </div><br>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                <img src="<?php echo $category[0]->category_image;?>" alt="images" width="100" height="80">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            </form>
                        </div>
                        </div>
                    </div>
                </main>

                <?php require_once('footer.php') ?>
                