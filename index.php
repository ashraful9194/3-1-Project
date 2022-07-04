<?php
try {
  //code...

  require_once './pages/config.php';
} catch (\Throwable $e) {
  //throw $th;
  die($e->getMessage());
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Kosai Limited</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./stylesheet.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

  <!--Navbarrr-->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <h2><img class="home-logo" src="./assets_home/home-logo.png" alt="kosai limited logo" height="35" width="35">
          <b>Kosai Limited
        </h2>
      </a>
      <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
        <span class="navber-toggler-icon">

        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="./index.php" class="nav-link text-white">Home</a></li>
          <li class="nav-item"><a href="./pages/about_site.php" class="nav-link text-white">About site</a></li>
          <li class="nav-item"><a href="./pages/courses.php" class="nav-link text-white">Courses</a></li>
          <li class="nav-item"><a href="./pages/contact_us.php" class="nav-link text-white">Contatct us</a></li>
          <?php
          if (isset($_SESSION['id'])) {
          ?>
            <li class="nav-item">
              <div class="dropdown dropsbutton">
                <a class=" dropdown-toggle text-white nav-link" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <!-- if admin dashboard will navigate to admin panel 
                if user then user dashboard -->
                  <li><a class="dropdown-item" <?php if ($_SESSION['role'] == "Admin") { ?> 
                                                  href="./pages/admin_panel/adminpanel.php" 
                                                  <?php } else { ?>
                                                   href="./pages/user_dashboard/user_dashboard.php" <?php } ?>>
                                                   Dashboard</a></li>
                                                   
                  <li><a class="dropdown-item" href="#">Create Post</a></li>
                  <li><a class="dropdown-item" href="./pages/edit_profile.php">Edit Profile</a></li>
                  <form action="./pages/process/logout.php" method="post">
                    <li class="nav-item">
                      <input type="submit" value="Logout" class="btn btn-light">
                    </li>
                  </form>
                </ul>
              </div>
            </li>

          <?php
          } else {
          ?>
            <li class="nav-item"><a href="./pages/login.php" class="nav-link text-white">Login/Signup</a></li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Banner Image -->
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="content text-center">

      <div class="banner-text">
        <h1 class="text-white banner-text"><b>Just Read a Blog</h1>
      </div>
      <button type="button" class="btn btn-light btn-">Explore</button>
    </div>
  </div>


  <!--Main body-->
  <!-- fetching data from database -->
          <?php 
          $query="select count(post_id) as total_posts from allpost"; // this will set the value in total_posts variable like a row
          $result=mysqli_query($dbc,$query); //executing the query
          $numRows=mysqli_num_rows($result);
          if($numRows==1)
            {
              $row = mysqli_fetch_assoc($result);

              //this is my query result $row['total_posts'];
              $total_posts=$row['total_posts'];
            }
            else
            {
              $_SESSION['update_status']="failed";
              header("location:./index.php");
              exit();
            }
              // $row = mysqli_fetch_assoc($result);
              // echo $result;

          ?>
  <!-- fetching ends here -->
  <div class="container " id="cardcontainer">
    <div class="row">
      <?php
      
      for ($i = 0; $i < 9; $i++) {
      ?>
        <div class="col-lg-4 mb-5">
          <!--Bootstrap cards1-->
          <div class="card" style="width: 21rem;">
            <img src="./assets_home/card sample.jpg" alt="Card one" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php  ?></h5>
              <p class="card-text"><?php  ?></p>
              <a href="#" class="btn btn-primary">Read...</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>



  <!--Footer 1-->
  <footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container text-center text-md-left">
      <div class="row text-center text-md-left">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Kosai Limited</h5>
          <p>It's a personal blog website.The blogs are mainly focused on programming world.</p>
        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Find me</h5>
          <p> md3rahat2cse93@gmail.com</p>
        </div>


        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact site</h5>

          <p><i class="fas fa-envelop mr-3"></i>kosailimited@gmail.com
          </p>

          <p><i class="fas fa-home mr-3"></i>Rajshahi, Bangladesh
          </p>
        </div>

        <hr class="mb-4">
        <div class="row align-items-center">
          <div class="col-md-7 col-lg-8">
            <p>Copyright ©2022 All rights reserved by :
              <a href="./index.php" style="text-decoration: none;">
                <strong class="text-warning">Kosai Limited</strong>
              </a>
            </p>
          </div>

          <div class="col-md-5 col-lg-4">
            <div class="text-center text-md-right">
              <ul class="list-unstyleed list-inline">
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                    <i class="fab fa-facebook"></i></a>
                </li>

                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                    <i class="fab fa-facebook"></i></a>
                </li>

                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                    <i class="fab fa-facebook"></i></a>
                </li>

                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                    <i class="fab fa-facebook"></i></a>
                </li>

                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                    <i class="fab fa-facebook"></i></a>
                </li>

              </ul>
            </div>
          </div>

        </div>



      </div>
    </div>
  </footer>


















  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="./script.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php
?>