<?php include 'connect.php';
 if (isset($_POST['add_to_cart'])) {
    $product_name=$_POST['name'];
    $product_price=$_POST['price'];
    $product_image=$_POST['image'];
    $product_quantity=1;

    //select cart data based on condition
    $select_cart=mysqli_query($conn, "SELECT * FROM cart where name='$product_name'");
     if(mysqli_num_rows($select_cart)>0){

        
        $display_message[]="product already added to cart!";
     }else{
 
 //insert cart data in cart table

 $insert_products=mysqli_query($conn, "INSERT INTO cart (name,price,image,quantity) values('$product_name', '$product_price', '$product_image', '$product_quantity')");
 
$display_message[]="product added to cart!";

}
 }
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products</title>

     <!-- css file -->
     <link rel="stylesheet" href="css/style.css">
     
     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <!-- Header-->
     <?php include 'header.php' ?>

     
     <div class="container">

          <?php 
     if(isset($display_message)){
        foreach( $display_message as $display_message){
        echo "<div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
     </div>";
    }

}
     ?>


        <section class="products">
            <h1 class="heading">Let's Shop</h1>
            <div class="product_container">
               
  
               
               <?php

                $select_product=mysqli_query($conn, "SELECT * FROM products");

                if(mysqli_num_rows($select_product)>0){

                    while($fetch_product=mysqli_fetch_assoc($select_product)){
                       // echo $fetch_product['name'];
                        ?>
                     <form action="" method="post">
                    <div class="edit_form">
                        <img src="images/<?php echo $fetch_product['image'] ?>" alt="">
                        <h3><?php echo $fetch_product['name'] ?></h3>
                        <div class="price"><?php echo $fetch_product['price'] ?>/-</div>
                        <input type="hidden" name="name" value="<?php echo $fetch_product['name'] ?>">
                        <input type="hidden"name="price" value="<?php echo $fetch_product['price'] ?>">
                        <input type="hidden"name="image"value= "<?php echo $fetch_product['image'] ?>">
                        <input type="submit" name= "add_to_cart" class="submit_btn cart_btn" value="Add to Cart">
                    </div>
                </form>
                <?php
               
                    }
                }else{
                    echo "<div class='empty_text'>No products Available</div>";
                } ?>
               
        </section>
     </div>
</body>
</html>