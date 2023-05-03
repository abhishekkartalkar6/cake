

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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" /> 
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" /> 
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


        <script>
            $(document).ready(function() {
        

        var dataTable = $('#products').DataTable({  
             "processing":true,  
             "serverSide":true,  
             "order":[],  
             "ajax":{  
                  url:"<?php echo base_url()."product_datatable" ?>",  
                  type:"POST"  
             },  
             "columnDefs":[  
                  {  
                       "targets":[],  
                       "orderable":false,  
                  },  
             ],  
        });  
      });

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




                </script>
    </body>
</html>
