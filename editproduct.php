<?php
 include("connection.php");

extract($_POST);

$sql="UPDATE products 
SET product_name='$productname',overview='$overview', model_no='$modelno', price='$price', image_1='$image1',image_2='$image2',image_3='$image3',image_4='$image4'
WHERE product_id='$productid'

";

mysqli_query($con,$sql);

if(mysqli_affected_rows($con)==1){
    $message="Edit Sucessfully.";
}else{
    $message="Edit Unsucessfully.";
}


header("Location:productmanagement.php?message='$message'");



?>