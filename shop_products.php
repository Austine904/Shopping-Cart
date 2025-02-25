<?php include 'connect.php';
 if (isset($_POST['add_to_cart'])) {
    $product_name=$_POST['name'];
    $product_price=$_POST['price'];
    $prooduct_image=$_POST['image'];
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
        <section class="products">
            <hi class="heading">Let's Shop</hi>
            <div class="product_container">
                <form action="" method="post">
                    <div class="edit_form">
                        <img src="images/Austine.png" alt="">
                        <h3>Austine</h3>
                        <div class="price">Price:4269</div>
                        <input type="hidden" name='name'>
                        <input type="hidden"name='price'>
                        <input type="text"name='image'>
                        <input type="submit" class="submit_btn cart_btn" value="Add to Cart">
                    </div>
                </form>
            </div>
        </section>
     </div>
</body>
</html>