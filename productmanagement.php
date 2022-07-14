<?php

session_start();
if(!isset($_SESSION['username'])){
  header("Location:login.php");
}


include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="mainly.css" />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <title>Melbourne Watch Gallery</title>
  </head>

  <body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="HomePage.php"
                >Melbourne Watch Gallery</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Product Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="newproduct.php">Add New Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" onclick="">logout</a>
            </li>
          </ul>

          <p class='me-3 mb-0'>UserName:
            <?php
             echo $_SESSION['username'];
            ?>   
          </p>
              

          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <div class="header">
      <img class="logo" src="images/logo.jpg" alt="" />
      <h1>Melbourne Watch Gallery</h1>
    </div>

    <h2 style="text-align:center; margin:20px 0;">Product Management System</h2>

    <?php
    
    if(isset($_GET['message'])){
      echo"<p class='alert alert-success'>".$_GET['message']."</p>";
    }
    
    
    ?>

    <table class="table container">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

 

    <?php

    $result=mysqli_query($con,"SELECT * FROM PRODUCTS");

    if($result){
        while($row=mysqli_fetch_array($result)){

            echo "
            
            <tr>
            <th scope='row'>$row[product_id]</th>
            <td style='width:20%;'><img style='width:20%;' src='$row[image_1]'></td>
            <td>$row[product_name]</td>
            <td>$$row[price]</td>
            <td>
            <a href='editproduct1.php?product_id=$row[product_id]'>Edit</a>, <a href='deleteproduct.php?product_id=$row[product_id]'>Delete</a>, <a href='image.php?product_id=$row[product_id]'>Preview</a>
            
            </td>
            </tr>
            
            ";
        }
    }
    
    
    ?>

   
  </tbody>
</table>
    

</body>
</html>
