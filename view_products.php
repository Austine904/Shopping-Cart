<!-- connect to database -->
 <?php include'connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View products</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>
<body>
    <!-- header php-->
     <?php include('header.php') ?>   

     <!-- container -->
      <div class="container">
        <section class="display_product">
            <table>
                <thead>
                    <th>Sl No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <!-- php code-->
                    <?php 
                        $display_product=mysqli_query($conn,"SELECT * FROM products");
                            if(mysqli_num_rows($display_product)>0){
                                echo "yes";
                            }else{
                                echo "No products Available";
                            }
                                           
                                    
                    ?>                             
               
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="" class="delete_product_btn"><i class="fas fa-trash"></i></a>
                        <a href="" class="edit_product_btn"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
      </div>


<h1>View Products</h1>
</body>
</html>