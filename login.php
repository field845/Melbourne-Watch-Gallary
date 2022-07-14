<?php

session_start();
if(isset($_SESSION['username'])){
  header("Location:productmanagement.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="mainly.css" />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/7d8fde76de.js"
      crossorigin="anonymous"
    ></script>
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
          </ul>

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

    <!--header -->

    <div class="header">
      <img class="logo" src="images/logo.jpg" alt="" />
      <h1>Melbourne Watch Gallery</h1>
    </div>

    <?php
    
    if(isset($_GET['message'])){
      echo"<p class='alert alert-success'>".$_GET['message']."</p>";
    }
    
    
    ?>

    <!-- login-->
    <div class="container login-container">
      <form method="post" action="authcheck.php">
        <!-- Email input -->

        <div class="form-outline mb-4">
        <label class="form-label" >UserName</label>
          <input type="text"  name="userName" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
        <label class="form-label" >Password</label>
          <input type="password"  name="password" class="form-control" />
       </div>

  

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">
          login
        </button>

      </form>
    </div>
    <script src="test.js"></script>
  </body>
</html>
