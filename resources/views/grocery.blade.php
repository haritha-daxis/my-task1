<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>Document</title>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
      {{-- // <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <title>Grocery Store</title>

    </head>
    <body>
      <div class="container">
         <form id="myForm" action="{{ asset('/grocery') }}" method="POST">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" class="form-control" id="type" name="type" value="">
            </div>
            <div class="form-group">
               <label for="price">Price:</label>
               <input type="text" class="form-control" id="price" name="price" value="">
             </div>
            {{-- <button type="submit" class="btn btn-primary" value="create">Submit</button> --}}
            <input type="submit" name="submit"value="create">
          </form>
      </div>
      {{-- <script>
       //  var name = document.getElementById('name').val();
      console.log(name);
   </script> --}}
    </body>
</html>

{{-- // <script> -- --}}
{{-- //          $(document).ready(function(){
//             jQuery('#ajaxSubmit').click(function(e){
//                e.preventDefault();
//                $.ajaxSetup({
//                   headers: {
//                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                   }
//               });
//                jQuery.ajax({
//                   url: "{{ url('/grocery') }}",
//                   method: 'post',
//                   data: {
//                      name: jQuery('#name').val(),
//                      type: jQuery('#type').val(),
//                      price: jQuery('#price').val()
//                   },
//                   success: function(response){
//                      console.log(response);
//                   }});
//                });
//             });
//</script> --}}
