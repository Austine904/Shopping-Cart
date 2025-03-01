<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<?php
include('connect.php')
?>
<div class="">    
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" id="getName" placeholder="Search Product..."/>
        </div>
    </div>                   
    <table class="table table-striped">
       
        <tbody id="showdata">
           <thead>
                <th>Product ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
            </thead>
        </tbody>
    </table>
</div>
<script>
  $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'searchajax.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>
</body>
</html>