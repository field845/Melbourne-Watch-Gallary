<?php


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

  <body onload="displayitems()">
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
            
              session_start();
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

    <!--3 colume grid-->
    <div class="main_container">
      <div class="productpage_grid">
        <div class="productimage_grid">

        <?php


       $id=$_GET["product_id"];

        
        $result=mysqli_query($con,"SELECT * FROM products WHERE product_id='$id'");
   
        $row=mysqli_fetch_array($result);

            echo "
           
            <img
            class='largeimage'
            src='$row[image_1]'
            onmouseover='swap(this)'
            />
                  
        <div>
          <img
              class='smallimage'
              src='$row[image_1]'
              onmouseover='swap(this)'
            />
          
            <img
            class='smallimage'
            src='$row[image_2]'
            onmouseover='swap(this)'
          />

          <img
          class='smallimage'
          src='$row[image_3]'
          onmouseover='swap(this)'
        />

        <img
        class='smallimage'
        src='$row[image_4]'
        onmouseover='swap(this)'
      />
</div>
    </div>
    
      <div class='description'>
        <h1>$row[product_name]</h1>
        <br />
        <p>MODEL: $row[model_no]</p>
        <h2>$<span>$row[price]</span></h2>
        <button type='button' class='btn btn-info' onclick='additem()'>
          Add to Cart
        </button>
        <div class='overview'>
          <h1>Product Overview</h1>
          <p>
            $row[overview]
          </p>
        </div>
      </div>
    </div>

          
          ";

        
        ?>

         

      <!--shopping cart-->
      <div class="cart_container">
        <div>
          <p class="cart_head">Shopping Cart</p>
          <div id="cart"></div>
        </div>
        <div class="end">
          <p class="total">Total</p>
          <p class="total_amount">$<span></span></p>
        </div>
        <div class="checkout"></div>
      </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="test.js"></script>
  </body>
</html>
