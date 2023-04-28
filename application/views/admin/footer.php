

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/assets/adminjs/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/assets/adminjs/datatables-simple-demo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script><script src="https://pagecdn.io/lib/ckeditor/4.13.0/ckeditor.js" integrity="sha256-yoULaG5POtLMfQWKvJ1pCbUSX4eM29SBpDbjkZAK6qs=" crossorigin="anonymous"></script>


        <script>
                    const addInputBtn = document.getElementById('addInputBtn');
let fieldCount = 0;

addInputBtn.addEventListener('click', () => {
    event.preventDefault();
    fieldCount++;
  var content = '<div class="form-row row border p-2"><span><button onclick="removeItem(this.parentNode.parentNode); return false;"><i class="fa fa-close"></i></button></span><div class="form-group col-md-6"><label class="text-primary bold" for="productDescription">Size</label><input type="text" class="form-control" name="size[]" id="" required> </div><div class="form-group col-md-6"><label class="text-primary bold" for="productDescription">Price</label><input type="text" class="form-control" name="price[]" id="" required><input type="hidden" value = "new"class="form-control" name="id[]" id="" required></div></div>';
  $('#price').append(content);
});

function removeItem(div){
    div.remove();
}


CKEDITOR.plugins.addExternal( 'abbr', '/myplugins/abbr/', 'plugin.js' );

// extraPlugins needs to be set too.
CKEDITOR.replace( 'editor1', {
        extraPlugins: 'abbr'
} );



                </script>
    </body>
</html>
