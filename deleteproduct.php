<?php

include("connection.php");

$sql="DELETE FROM products WHERE product_id=$_GET[product_id]";

mysqli_query($con,$sql);

if(mysqli_affected_rows($con)===1){
    $message= "Delete Successfully";
}else{
    $message="Delete Unsuccessfully";
}

header("Location:productmanagement.php?message='$message'");
?>