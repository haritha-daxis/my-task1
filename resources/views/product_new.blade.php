<!DOCTYPE html>
<html>
<head>
   <title>Auto populate Dropdown with jQuery AJAX in Laravel 8</title>
</head>
<body>

   <!-- Department Dropdown -->
   Department : <select id='sel_category' name='sel_category'>
      <option value='0'>-- Select Category --</option>

      <!-- Read Departments -->
      @foreach($category['data'] as $item)
        <option value='{{ $item->id }}'>{{ $item->name }}</option>
      @endforeach

   </select>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type='text/javascript'>
   $(document).ready(function(){

      // Department Change
      $('#sel_category').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         //$('#sel_emp').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
           url: 'getCat',
           type: 'get',
           dataType: 'json',
           success: function(response){
            cat="";
            for(i in response.cat){
                cat+="<option value="+response.cat[i]['id']+">"+response.cat[i]['category_name']+"</option>";
            }
            $('#sel_category').a
            //  var len = 0;
            //  if(response['data'] != null){
            //     len = response['data'].length;
            //  }

            //  if(len > 0){
            //     // Read data and create <option >
            //     for(var i=0; i<len; i++){

            //        var id = response['data'][i].id;
            //        var name = response['data'][i].name;

            //        var option = "<option value='"+id+"'>"+name+"</option>";

            //        $("#sel_emp").append(option);
                }
             }

           }
         });
//       });
//    });
   </script>
</body>
</html>
