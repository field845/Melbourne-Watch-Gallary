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

 <script src="test.js"></script>
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
            <li>
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>

          <p class='me-3 mb-0'>UserName:
            <?php

            session_start();
            if(!isset($_SESSION['username'])){
              echo "Login or Signin";
            }else{
              echo $_SESSION['username'];
            }
            ?>   
          </p>

          <form class="d-flex" action="HomePage.php" method="Get">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="search"
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

    <div class="main_container">
      <!--products-->
      <div class="product_container">
       
      <?php

      if(isset($_GET["search"])){
        $result=mysqli_query($con,"SELECT * FROM products Where product_name like '%$_GET[search]%'");
      }else{
        $result=mysqli_query($con,"SELECT product_id,product_name,price,image_1 FROM products");

      }

      
      if($result){

        while($row=mysqli_fetch_array($result)){

         

          echo "
          
      
       <div class='product_list image1'>
          <a href='image.php?product_id=$row[product_id]' style='text-decoration: none; color: black'>
          <p class='text product_name'>
            $row[product_name]
          </p>
          <img
            class='product_image'
            src='$row[image_1]'
            alt='$row[product_name]'
          />
         </a>
        <div class='product_grid'>
          <p class='text1'>$ <span class='product_price'>$row[price]</span></p>
          <button type='button' class='addbutton btn btn-info' onclick='add(this)'>
            Add to Cart
          </button>
        </div>
      </div>

      ";

        }
       

      };
    
    
    ?>

    </div>
  
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

  </body>
</html>

