<?php include 'connect.php';

//update logic
if (isset($_POST['update_product'])) {
   $update_id=$_POST['update_id'];
   $update_product_id=$_POST['update_product_id'];
   $update_name=$_POST['update_name'];
   $update_price=$_POST['update_price'];
   $update_quantity=$_POST['update_quantity'];
   $update_image=$_FILES['update_image']['name'];
   $update_image_tmp_name=$_FILES['update_image']['tmp_name'];
   $update_image_folder='images'.$update_image; 
   
   //update query

   $update_products=mysqli_query($conn,"UPDATE products set product_id='$update_product_id', name='$update_name', 
   quantity='$update_quantity', image='$update_image' where id='$update_id'");
   if($update_products){
    move_uploaded_file($update_image_tmp_name, $update_image_folder);
    header('location:view_products.php');
   }else
   $display_message='Error updating product';
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">
     
     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
     
</head>
<body>
    <?php include 'header.php' ?>

    <!-- Display message-->

    <?php 
    if(isset($display_message)){
        echo "<div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </div>";
    };
    ?>
    <section class="edit_container">
        <!-- php Code-->
    <?php
        if(isset($_GET['edit'])){
            $edit_id=$_GET['edit'];
            
            $edit_query=mysqli_query($conn, "SELECT * from products where id=$edit_id");
            if (mysqli_num_rows($edit_query)>0) {
                ($fetch_data=mysqli_fetch_assoc($edit_query));
                    $row=$fetch_data['price'];
                }
                ?>
                <!-- form -->

                            <form action="" method="post" enctype="multipart/form-data" class="update_product product_container_box">
                                <img src="images/<?php echo $fetch_data['image']?>" alt="">
                                <input type="hidden" value="<?php echo $fetch_data['id']?>" name="update_id">
                                <input type="text" class="input_fields fields" required value="<?php echo $fetch_data['product_id']?>" name="update_product_id">
                                <input type="text" class="input_fields fields" required value="<?php echo $fetch_data['name']?>" name= update_name>
                                <input type="number" class="input_fields fields" required value="<?php echo $fetch_data['price']?>" name="update_price">
                                <input type="number" class="input_fields fields" required value="<?php echo $fetch_data['quantity']?>" name= "update_quantity">
                                <input type="file" class="input_fields fields" required accept="image/png, image/jpg, image/jpeg" name="update_image">

                                    <div class="btns">
                                        <input type="submit" class="edit_btn" value="Update Product" name="update_product">
                                        <input type="reset" id="close-edit" value="Cancel" class="cancel_btn">



                                    </div>

                            </form>
        <?php

         }

    

   ?>
        

    </section>
    </body>
</html>