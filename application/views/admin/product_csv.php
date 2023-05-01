<?php require_once('header.php') ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">CSV</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Categories</li>
                        </ol> -->
                        <!-- upload_form.php -->

<?php echo form_open_multipart('add_csv');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Upload" />

</form>

                        
                        </div>
                        <br>
                        
                    </div>
                </main>

                <?php require_once('footer.php') ?>
                