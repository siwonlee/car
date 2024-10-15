</div>





<!-- /.content-wrapper -->
<footer class="main-footer">

  {{-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> --}}
  {{-- All rights reserved. --}}
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 24.01.22
  </div>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 
 
 
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
 

<script>
// $('[data-widget="pushmenu"]').PushMenu('collapse');

</script>

{{--
@stack('modals') --}}

@livewireScripts


 

{{--  
<script>
 
  $(document).ready(function(){
  
  // add_upc_status_onpage();
  
   function add_upc_status_onpage(query)
   {
    $.ajax({
     url:"{{ route('add_upc_status') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('#status').html(data.table_data);

if(data.disabled == 'no'){

   $('.disabled').removeAttr("disabled"); 
   $('.dis_button').removeClass("cursor-not-allowed opacity-50");   
 
}

      
         console.log(data.disabled);

     }
    })
   }
 

   $(document).on('click', '#status_btn', function(){
   
    var query = $('#upc1').val();

    $('#hidden_upc').attr("value",  query);
    add_upc_status_onpage(query);

    console.log(query);
 

    
   });

  });
  </script> --}}

{{-- <script>
  $(document).ready(function () {
  $('#category1').on('change', function () {
  let id = $(this).val();
  $('#sub_category').empty();
  $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
  $.ajax({
  type: 'GET',
  url: '/add_upc/sub/' + id,
  success: function (response) {
  var response = JSON.parse(response);
  console.log(response);   
  $('#sub_category').empty();
  $('#sub_category').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
  response.forEach(element => {
      $('#sub_category').append(`<option value="${element['subcate']}">${element['subcate']}-${element['sub_desc']}</option>`);
      });
  }
});
});
});
</script> --}}

{{-- <script>
  $(document).ready(function () {
  $('#category1').on('change', function () {
  let id = $(this).val(); --}}
  // Save data to sessionStorage

sessionStorage.setItem("cate", id);

// Get saved data from sessionStorage
//let cate = sessionStorage.getItem("cate");

// Remove saved data from sessionStorage
//sessionStorage.removeItem("key");

// Remove all saved data from sessionStorage
//sessionStorage.clear();


{{-- $('#sub_category').empty();
  $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
  $.ajax({
  type: 'GET',
  url: '/add_upc/sub/' + id,
  success: function (response) {
  var response = JSON.parse(response);
  console.log(response);   
  $('#sub_category').empty();
  // $('#sub_category').append(`<option value="0" selected value='p' disabled selected>Select Sub Category*</option>`);
  $('#sub_category').append(`<option value="" >*- All</option>`);
  response.forEach(element => {
      $('#sub_category').append(`<option value="${element['subcate']}">${element['subcate']}-${element['sub_desc']}</option>`);
      });
  }
});
});
});


</script> --}}

<script>
  
{{--   
  window.onload = function() {

    // Get saved data from sessionStorage
let cate = sessionStorage.getItem("cate");
   $('#category1').val(cate);  
   let id = $('#category1').val();  
     

$('#sub_category').empty();
  $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
  $.ajax({
  type: 'GET',
  url: '/add_upc/sub/' + id,
  success: function (response) {
  var response = JSON.parse(response);
  console.log(response);   
  $('#sub_category').empty();
  // $('#sub_category').append(`<option value="0" selected value='p' disabled selected>Select Sub Category*</option>`);
  $('#sub_category').append(`<option value="" >*- All</option>`);
  response.forEach(element => {
      $('#sub_category').append(`<option value="${element['subcate']}">${element['subcate']}-${element['sub_desc']}</option>`);
      });
  }
});

sessionStorage.clear("cate");



  };
  
   --}}
  </script> 





<script language="JavaScript" type="text/javascript">



  $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
  });

  $(document).ready( function() {
      $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });


</script>




 
<script>
  $(document).ready(function(){
    function check_find(query)
   {
    $.ajax({
     url:"{{ route('check_digit.find') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('#find_result').html(data.table_data);
   }
    })
   }
    $(document).on('click', '#find', function(){
     var query = $('#find_input').val();
    check_find(query);
    console.log(query);
   });
  });
  </script>
 
 <script>
  $(document).ready(function(){
    function check_check(query)
   {
    $.ajax({
     url:"{{ route('check_digit.check') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('#check_result').html(data.table_data);
   }
    })
   }
    $(document).on('click', '#check', function(){
     var query = $('#check_input').val();
    check_check(query);
    console.log(query);
   });
  });
  </script>

<script>
  $(document).ready(function(){
    function check_plu(query)
   {
    $.ajax({
     url:"{{ route('check_digit.plu') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {$('#plu_result').html(data.table_data);
   }
    })
   }
    $(document).on('click', '#plu', function(){
     var query = $('#plu_input').val();
    check_plu(query);
    console.log(query);
   });
  });
  </script>

<script>
  $(document).ready(function(){
    function check_convert(query)
   {
    $.ajax({
     url:"{{ route('check_digit.convert') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {$('#convert_result').html(data.table_data);
   }
    })
   }
    $(document).on('click', '#convertae', function(){
     var query = $('#convertae_input').val();
    check_convert(query);
    console.log(query);
   });

   $(document).on('click', '#convertea', function(){
     var query = $('#convertea_input').val();
    check_convert(query);
    console.log(query);
   });



  });
  </script>


  <script>
  $(document).ready(function(){
    function check_cate(query)
   {
    $.ajax({
     url:"{{ route('category.general') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {$('tbody').html(data.table_data);
   }
    })
   }
    $(document).on('keyup', '#category', function(){
     var query = $('#category').val();
    check_cate(query);
    console.log(query);
   });
  });
  </script>  

<script>
  $(document).ready(function(){
    function check_vendor(query)
   {
    $.ajax({
     url:"{{ route('vselect.general') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {$('#vs_tbody').html(data.table_data);
   }
    })
   }
    $(document).on('keyup', '#vselect', function(){
     var query = $('#vselect').val();
     check_vendor(query);
     console.log(query);
   });
  });
  </script>  

<script>
  $(document).ready(function(){
   // assuming the URL is: https://example.com/?name=John&age=30

// create a new URLSearchParams object with the query string parameters
const params = new URLSearchParams(window.location.search);

// get the value of the 'name' parameter
const upc = params.get('upc');


if(upc){

     $('#upc1').attr("value",  upc);

}
// get the value of the 'age' parameter
//const age = params.get('age');

console.log(upc); // output: "John"
    });
  





</script>







 















 



</body>
</html>
