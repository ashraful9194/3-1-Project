<?php

require_once 'config.php';
include '/process/change_fname_lname.php';

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php

    extract($_POST);
    $errors = json_decode($_SESSION['errors']);
    $errors2 = json_decode($_SESSION['errors_names']);
    unset($_SESSION['errors']);
    unset($_SESSION['errors_names']);

    $session_id = $_SESSION['id'];
    $query = "select * from users where (id='$session_id')";
    $res = mysqli_query($dbc, $query);
    $row = mysqli_fetch_assoc($res);
    $_SESSION["f_name"] = $row['fname'];
    $_SESSION["l_name"] = $row['lname'];
    $_SESSION["role"] = $row['role'];
    ?>


    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-light p-md-4">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand">
                <h2><img class="home-logo" src="../assets_home/home-logo.png" alt="kosai limited logo" height="35" width="35">
                    <b>Kosai Limited
                </h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>

                    <!-- if admin then show admin panel in navbar -->
                    <?php if ($_SESSION['role'] == "admin") { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="adminpanel.php">AdminPanel</a>
                        </li><?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">Dashboard</a>
                        </li>
                    <?php } ?>

                            <!-- if loged in then show log out option in navbar -->
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                        <form action="./process/logout.php" method="post">
                            <li class="nav-item">
                                <input type="submit" value="Logout" class="btn btn-primary">
                            </li>
                        </form>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>



    <!-- main body -->
    <div class="container">
        <div class="row">
            <div class="row align-item-start ">
                <div class="col-sm-4 mt-5 ms-5 mb-5 ">
                    <!-- col1 -->
                    <img class="profile-pic" src="../assets_home/card sample.jpg" alt="">
                    <br>
                    <!-- showing users fname, lname -->

                    <h1 class="ms-4">
                        <p><?php

                            echo $_SESSION["f_name"] . " " . $_SESSION["l_name"]; ?></p>

                    </h1>

                    <h4 class="ms-4">
                        <p><?php echo $row['username']; ?></p>
                    </h4>

                    <h4 class="ms-4">
                        <p><?php echo $_SESSION['role'];
                            ?></p>
                    </h4>
                </div>

                <div class="col-sm-4 editProfile ">
                    <!-- col2 -->
                    <!-- update alert start not working-->
                    <?php

                    if ($updateStatus == "success") { ?>
                        <div class="alert alert-success mt-4" role="alert">
                            <center>Update successfull... <br>
                        </div>
                    <?php }
                    if ($updateStatus == "failed") { ?>


                        <div class="alert alert-danger mt-4" role="alert">
                            <center>Update failed... <br>
                        </div>

                    <?php }
                    if ($updateStatus != "success" && $updateStatus != "failed") { ?>

                    <?php } ?>

                    <!-- update alert ends -->


                    <h1 class="pt-5">Edit Profile</h1>
                    <hr>
                    <h3 class="mt-4 mb-4">Basic Information</h3>


                    <!-- name section -->
                    <form action="process/change_fname_lname.php" method="POST">
                        <div class="form-group">
                            <label class="label_txt">First Name</label>
                            <input type="text" class="form-control" name="fname" value="">
                            <?php
                            foreach ($errors2->fname as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>

                        </div>

                        <div class="form-group mt-3">
                            <label class="label_txt">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="">

                            <?php
                            foreach ($errors2->lname as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>

                        </div>
                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes1">Save</button>

                    </form>


                    <!-- role section -->
                    <form action="./process/change_role.php" method="POST">
                        <h3 class="mt-5 mb-4">
                            Change Role

                        </h3>
                        <input class="form-check-input" type="radio" name="role" id="learner" value="learner" <?php
                                                                                                                if ($_SESSION["role"] == "learner") {
                                                                                                                ?> checked <?php } ?>>
                        <label class="form-check-label me-5" for="flexRadioDefault1">
                            Learner
                        </label>
                        <input class="form-check-input" type="radio" name="role" id="contributor" value="contributor" <?php
                                                                                                                        if ($_SESSION["role"] == "contributor") {
                                                                                                                        ?> checked <?php } ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Contributor
                        </label>
                        <br>
                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes2">Save</button>
                    </form>




                    <!-- password section -->
                    <form action="process/change_password.php" method="POST">
                        <h3 class="mt-5 mb-4">
                            Change Password
                        </h3>
                        <!--form group for password-->
                        <div class="form-group">
                            <label class="label_txt">Type old password</label>
                            <input type="password" class="form-control" name="oldpassword">
                            <?php
                            foreach ($errors->oldpassword as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>

                        <!--form group for confirm password-->
                        <div class="form-group mt-3">
                            <label class="label_txt">Type new password</label>
                            <input type="password" class="form-control" name="newpassword">
                            <?php
                            foreach ($errors->newpassword as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-3">
                            <label class="label_txt">Confirm new password</label>
                            <input type="password" class="form-control" name="c_newpassword">
                            <?php
                            foreach ($errors->c_newpassword as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>


                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes3">Save</button>
                    </form>

                </div>
                <div class="col-sm-4">
                    <!-- col3 -->
                </div>
            </div>
        </div>
    </div>



    <!-- footer -->

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
                            <a href="#" style="text-decoration: none;">
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



































    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>