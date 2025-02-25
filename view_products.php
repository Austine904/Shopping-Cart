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
           
                    <!-- php code-->
                    <?php 
                        $display_product=mysqli_query($conn,"SELECT * FROM products");
                            $num=1;
                            if(mysqli_num_rows($display_product)>0){
                               //logic to fetch data
                     echo " <table>
                <thead>
                    <th>Sl No</th>
                    <th>Product Id</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </thead>
                <tbody>";
                              
                              while($row=mysqli_fetch_assoc($display_product)){
                                ?>

                              <!--display table data -->
                                    <tr>
                                        <td><?php echo $num?></td>
                                        <td><?php echo $row['product_id']?></td>
                                        <td><img src="images/<?php echo $row['image']?>" alt=<?php echo $row['name']?>> </td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['price']?></td>
                                        <td><?php echo $row['quantity']?></td>
                                        <td><a href="delete.php?delete=<?php echo $row['id']?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete the product?')">
                                            <i class="fas fa-trash"></i></a>
                                        <a href="update.php?edit=<?php echo $row['id']?>" class="edit_product_btn">
                                            <i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>


                              <?php
                               $num++;
                              }
                             
                         
                            
                            }
                               else{
                                echo "<div class='empty_text'>No products Available</div>";
                         }
                                           
                          ?>          
                                               
               
                    
                </tbody>
            </table>
        </section>
      </div>


<h1>View Products</h1>
</body>
</html>