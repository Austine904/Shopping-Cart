<!--Delete logic -->

<!-- Php Code-->
 <?php 
 include 'connect.php';
  if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "DELETE from products where id=$delete_id") or die('Query Failed');
    if($delete_query){
        echo"Product Deleted";
        header('location:view_products.php');
    }
  }
 
 ?>