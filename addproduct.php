<?php
 include("connection.php");

extract($_POST);

$sql="INSERT INTO products (product_name, overview, model_no, price, image_1,image_2,image_3, image_4) 
VALUES ('$productname','$overview','$modelno','$price','$image1','$image2','$image3','$image4')";

mysqli_query($con,$sql);

if(mysqli_affected_rows($con)==1){
    $message="Add Sucessfully.";
}else{
    $message="Add Unsucessfully.";
}


header("Location:productmanagement.php?message='$message'");





?>

