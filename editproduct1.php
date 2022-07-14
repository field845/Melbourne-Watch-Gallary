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

    <h2 style="text-align:center; margin:20px 0;">Product Mangement - Edit Product</h2>

    <form method="post" action="editproduct.php">
        <div class="form-group container">
        
        <?php

        $sql="SELECT * FROM products WHERE product_id=$_GET[product_id]";

        $result=mysqli_query($con,$sql);

        $row=mysqli_fetch_array($result);

        echo "

          <label for='productname'>Product Name</label>
          <input name='productname' type='text' class='form-control' id='productname' value='$row[product_name]' required><br>
      
          <label for='overview'>Overview</label>
          <input name='overview' type='textarea' cols='5' class='form-control' id='overview' value='$row[overview]' required><br>
      
          <label for='modelno'>Model No</label>
          <input name='modelno' type='text' class='form-control' id='modelno' value='$row[model_no]' required><br>
      
          <label for='price'>Price</label>
          <input name='price' type='text' class='form-control' id='price' value='$row[price]' required><br>
      
          <label for='image1'>Image1</label>
          <input name='image1' type='text' class='form-control' id='image1' value='$row[image_1]' required><br>
      
          <label for='image2'>Image2</label>
          <input name='image2' type='text' class='form-control' id='image2' value='$row[image_2]' required><br>
      
          <label for='image3'>Image3</label>
          <input name='image3' type='text' class='form-control' id='image3' value='$row[image_3]' required><br>
      
          <label for='image4'>Image4</label>
          <input name='image4' type='text' class='form-control' id='image4' value='$row[image_4]' required><br>

          <input hidden name='productid' type='text' class='form-control' id='image4' value='$row[product_id]' required><br>

        "


        ?>
       
        
          
        </div>
        
        <div class="container">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>

</body>
</html>