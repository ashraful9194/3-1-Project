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
    <link rel="stylesheet" href="./category_wise_post.css">

    <title>All Courses</title>
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
                <h1>Categories</h1>
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


        <?php
        if (isset($_GET)) {
            extract($_GET);
            echo $categorySelector;
            if ($categorySelector == "competetive_programming") {
                $category = "Competitive_programming";
            }
            if ($categorySelector == "programming_language") {
                $category = "C_programming";
            }
            if ($categorySelector == "algorithm") {
                $category = "Algorithm";
            }
            if ($categorySelector == "tips") {
                $category = "Tips";
            }

        ?>

            <div class="row mid-row">
                
                    <!-- fetching data from database -->
                    <?php
                    //limiting the post description of post_paragaraph_1 for echo
                    function custom_echo($x, $length)
                    {
                        if (strlen($x) <= $length) {
                            echo $x;
                        } else {
                            $y = substr($x, 0, $length) . '...';
                            echo $y;
                        }
                    }

                    $categoryWisePostId = mysqli_query($dbc, "SELECT post_id FROM `post_category_relationship` WHERE post_category= '$category';");

                    $numRows = mysqli_num_rows($categoryWisePostId);
                    if ($numRows) {
                        while ($postIdSelector = mysqli_fetch_assoc($categoryWisePostId)) {
                            //getting post id for category
                            $postId = $postIdSelector['post_id'];
                            echo $postId;
                            $categories = mysqli_query($dbc, "SELECT post_category FROM `post_category_relationship` WHERE post_id=$postId");
                            $postInfoseek = mysqli_query($dbc, "SELECT post_title,post_paragraph_1 from allpost where post_id=$postId ;");
                            $postInfo = mysqli_fetch_assoc($postInfoseek);
                    ?>
                            <div class="item me-5">
                                <!--Bootstrap cards1-->
                                <div class="card" style="width: 21rem;">
                                    <img src="../assets/card sample.jpg" alt="Card one" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $postInfo['post_title']; ?></h5>
                                        <!-- showing category -->
                                        <?php

                                        ?>
                                        <p class="card-text">
                                            <?php while ($categoryName = mysqli_fetch_assoc($categories)) { ?>
                                                <span class="category-viewer">
                                                    <?php echo $categoryName['post_category'], " "; ?>
                                                </span>
                                            <?php } ?>
                                        </p>

                                        <p class="card-text" style="font-weight:normal"><?php custom_echo($postInfo['post_paragraph_1'], 50); ?></p>
                                        <form action="./pages/show_post_for_all/show_post.php" method="POST">
                                            <button type="submit" id="review-button" class=" review-button" name="review_id" value="
                                                                                                    <?php
                                                                                                    echo $postId;
                                                                                                    ?>
                                                                                                    ">Read</button>

                                            <script type="text/javascript">
                                                document.getElementById("review-button").onclick = function() {
                                                    location.href = "../show_post_for_all/show_post.php";
                                                };
                                            </script>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php
                            }
                        }
                    }
                    ?>
                
                

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

    <script src="./category_wise_post.js"></script>


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