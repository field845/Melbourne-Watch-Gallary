<?php
   
   include("connection.php");

    extract($_POST);

    $hashed_password=md5($password);

    $query="select username from users where username='$userName' and password='$hashed_password'";

    $result=mysqli_query($con, $query);

    if(mysqli_affected_rows($con)===1){
        echo "Login successfully!";
        session_start();
        $_SESSION['username']=$userName;
        header("Location:productmanagement.php");
        
    }else{
        header("Location:login.php?message='Username or Password is wrong, Please login again.'");
        
    }
    
?>