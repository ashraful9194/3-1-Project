<?php require_once "../config.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- to refresh after 1 min -->
    <!-- <meta http-equiv="refresh" content="60" /> -->


    <!-- material CDN -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./about_site.css">

    <title>About site</title>
</head>

<body>




    <!-- ----------------------------- THE WHOLE BODY --------------------------------------------- -->

    <div class="container">
        <div class="nav-row">
            <div class="left-top">
                <a href="../../index.php">
                    <div class="logo">
                        <img src="../assets/home-logo.png" alt="Kosai Limited logo">
                        <h2>Kosai <span style="color:#0a98f7">Limited</span></h2>
                    </div>
                </a>
            </div>
            <div class="top-middle">
                <h1>About site</h1>
            </div>
            <div class="top-right">

                <?php if (isset($_SESSION['id'])) { ?>
                    <div class="profile">

                        <a href=<?php
                                if ($_SESSION['role'] === "Admin") {
                                    echo "../admin_panel/adminpanel.php";
                                } elseif ($_SESSION['role'] === "Contributor") {
                                    echo "../contributors_dashboard/contributors_dashboard.php";
                                } else if ($_SESSION['role'] === "Learner") {
                                    echo "../learners_dashboard/learners_dashboard.php";
                                } ?>>
                            <button type="button" class="dash-btn">Dashboard</button> </a>
                        <!-- logout -->
                        <a href="../process/logout.php" style="margin: 0px;">
                            <span class="material-icons-sharp">
                                logout
                            </span>
                        </a>
                    </div>
                <?php } else { ?>
                    <a href="../login.php"><button type="button" class="dash-btn">Log in/ Sign up</button></a>
                <?php } ?>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
            </div>
        </div>
        <div class="row mid-row d-flex justify-content-sm-center">

            <div class="cards-container">
                <div class="first-des">
                    <div class="thefront">
                        <div class="card-row">
                            <div class="column1">
                                <h2>nice to meet you</h2>
                                <p>hey there folk, if you are willing to become a competitive programmer,
                                    want to learn language and don't know where to start, then congratulations!
                                    you already have taken a step to your dreams.

                                </p>
                            </div>
                            <div class="column2">
                                <img src="../assets/boy_on_computer.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="theback">
                        <div class="card-row">
                            <div class="column1">
                                <h2>What are we offering?</h2>
                            </div>
                            <div class="column2">
                                <div class="fullcontainer">
                                    <div class="scard">
                                        <p class="animate-txt">
                                            <span>CP guide</span>
                                            <span>Algorithm</span>
                                            <span>Development</span>
                                            <span>Front end</span>
                                            <span>Back end</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ================================= FOOTER ======================================= -->


    <!--Footer 1-->
    <div class="footer-manual">
        <footer class="bg-dark text-white mt-5">
            <div class="row">
                <div class="col-md-4 left">
                    <h2>Kosai Limited</h2>
                    <p class="text-muted warning">
                    <h3>
                        An E-learning platfrom. <br><br> From beginner to advance.
                    </h3>
                    </p>
                </div>
                <div class="col-md-4">
                    <h2>Find us</h2>
                    <span class="material-icons-sharp">
                        email
                    </span>
                    <p class="text-muted">
                    <h3>
                        md3rahat2cse93@gmail.com
                    </h3>
                    </p>
                </div>
                <div class="col-md-4">
                    <h2>Follow us</h2>
                    <img src="../svg/icons8-facebook.svg" alt="" class="svg">
                    <img src="../svg/icons8-instagram.svg" alt="" class="svg">
                    <img src="../svg/icons8-linkedin.svg" alt="" class="svg">
                    <img src="../svg/icons8-twitter.svg" alt="" class="svg">
                    <img src="../svg/icons8-youtube.svg" alt="" class="svg">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr class="mb-4">

                    <p>Copyright ©2022 All rights reserved by :
                        <a href="#" style="text-decoration: none;">
                            <strong class="text-warning">Kosai Limited</strong>
                        </a>
                    </p>

                </div>
            </div>
        </footer>
    </div>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="./about_site.js"></script>


    <!-- for setting up theme -->
    <!-- will work on latter -->
    <?php //include "../process/set_theme.php"
    ?>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php mysqli_close($dbc); ?>