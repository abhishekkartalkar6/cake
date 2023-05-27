<footer class="bg-dark text-light py-4" style="margin-top:10px;">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>About Us</h5>
        <p>We are a small online bakery that sells delicious and high-quality baked goods, made with love and care.</p>
      </div>
      <div class="col-md-4">
        <h5>Links</h5>
        <ul class="list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Contact Us</h5>
        <ul class="list-unstyled">
          <li><i class="fas fa-map-marker-alt"></i> 123 Main St, Nagpur</li>
          <li><i class="fas fa-phone"></i> (123) 456-7890</li>
          <li><i class="fas fa-envelope"></i> <a href="mailto:info@bakery.com">info@MyGiftsy.com</a></li>
        </ul>
      </div>
    </div>
    <hr class="my-4">
    <div class="row">
      <div class="col-md-6">
        <p>&copy; 2023 MyGiftsy. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-right">
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
          <li class="list-inline-item"><a href="#">Terms of Use</a></li>
        </ul>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        var sort_arr = [];
        $('.sort_by_filter').each(function(){
        var price = $(this).find('h5').text().split(' ');
        sort_arr.push({'key': price[1],'data':$(this)[0].outerHTML});
      });
      sort_arr.sort(function(a, b) {
      return a.key - b.key; // sort by age in ascending order
    });
    var string ='';
    $.each(sort_arr, function(index, value) {
      console.log(value['data']);
      string +=  value['data'];
      
    //  console.log(index+value['data']);
      // console.log( value['data']);
    });
    $('#row_to_add').html(string);

      
  $('#search-input').keyup(function(){
    var search = $(this).val();
    if(search != ''){
      $.ajax({
        url: "<?php echo base_url(); ?>suggetion",
        method: "POST",
        data: {search:search},
        success:function(response){
          // console.log(response);
          $('#suggestions').html(response);

        }
      });
    }
    else {
      $('#suggestions').empty();
    }
  });
  
        
        var lazyloadImages = document.querySelectorAll("img.lazy"); 
        // console.log(lazyloadImages);return false;

        var lazyloadThrottleTimeout;
        
        function lazyload () {
          if(lazyloadThrottleTimeout) {
            clearTimeout(lazyloadThrottleTimeout);
          }    
          
          lazyloadThrottleTimeout = setTimeout(function() {
              var scrollTop = window.pageYOffset;
              lazyloadImages.forEach(function(img) {
                // console.log(img.dataset);
                  if(img.offsetTop < (window.innerHeight + scrollTop)) {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    if(img.dataset.src == ""){
                      img.dataset.src = "<?php echo base_url(); ?>assets/uploads/default_images/lazyload.jpg";
                    }
                  }
              });
              if(lazyloadImages.length == 0) { 
                document.removeEventListener("scroll", lazyload);
                window.removeEventListener("resize", lazyload);
                window.removeEventListener("orientationChange", lazyload);
              }
          }, 20);
        }
        lazyload();
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);

        $('.pricing').click(function() {
      $('.pricing').removeClass('set-active');
      $(this).addClass('set-active');
      var inputField = $(this).prev('.input-field');
    var value = inputField.val();
    $("#final_price").html(value);
    });
    $(".set-active").click();
      
});



    </script>
</footer>
  </body>
</html>
