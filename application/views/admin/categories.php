<?php require_once('header.php') ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        
                        <div class="row">
                        <div class="col-xl-6">
                            
                        <!-- The form -->
                            <form action="<?php echo site_url('add_cat') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <input class="form-control" id="category" name="category">
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            </form>
                        </div>
                        </div>
                        <?php
                        // print_r($data);die;
                        if(isset($data)){
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Categories Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Name</th>
                                            <th>Sort Key</th>
                                            <th>Images</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Name</th>
                                            <th>Sort Key</th>
                                            <th>Images</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $sr = 1;
                                        foreach($data as $category)
                                        { ?>
                                        <tr>
                                            <td><?php echo $sr;?></td>
                                            <td><?php echo $category->category_name;?></td>
                                            <td><?php echo $sr;?> key</td>
                                            <td> <img src="<?php echo $category->category_image;?>" alt="images" width="70" height="50"></td>
                                            <td><a class="btn btn-success" href="<?php echo 'edit_cat/'.$category->id;?>" >update</a> <a class="btn btn-danger" href="<?php echo 'delete_cat/'.$category->id;?>">Delete</a> </td>
                                        </tr>
                                        <?php $sr++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </main>

                <?php require_once('footer.php') ?>
                