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
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Name</th>
                                            <th>Sort Key</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Sort Key</th>
                                            <th>Office</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>System Architect</td>
                                            <td>s key</td>
                                            <td>Edinburgh</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <?php require_once('footer.php') ?>
                