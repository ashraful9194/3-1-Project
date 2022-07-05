<?php require_once "../config.php" ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- material CDN -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./post_control.css">
    <!-- date viewer -->
    <title>post title</title>
</head>

<body>
    <!-- fetching from database -->
    <?php
    if (isset($_POST['review_id'])) {
        extract($_POST);
        $reviewID = $_POST['review_id'];
        $query = "SELECT * FROM kosai_limited.allpost WHERE (post_id= $reviewID );";
        $res = mysqli_query($dbc, $query);
        $numRows = mysqli_num_rows($res);
        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($res);
        }
    ?>
        <!--------------------------------------The whole body starts from here-------------------------------------->
        <!-- This whole page is divied into 3 portion : aside , center main and right portion. 
     Aside contains page navigations.
     Center main contains the full post.
     Right portion has top navigation , theme toggler, profile info.
     At last there is footer.-->


        <div class="container">
            <!-- --------------------- ASIDE -------------------------------------------- -->
            <aside id="aside-menu" class="">
                <div class="top">
                    <a href="../../index.php">
                        <div class="logo">
                            <img src="../../assets_home/home-logo.png" alt="Kosai Limited logo">
                            <h2>Kosai <span style="color:#0a98f7">Limited</span></h2>
                        </div>
                    </a>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </div>
                </div>
                <div class="sidebar">
                    <!-- Dashboard -->
                    <a href="../admin_panel/adminpanel.php">
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Dashboard</h3>
                    </a>
                    <!-- Create post -->
                    <a href="../create_post/create_post.php" class="">
                        <span class="material-icons-sharp">
                            draw
                        </span>
                        <h3>Create Post</h3>
                    </a>
                    <!-- all post -->
                    <a href="../show_post/show_post.php" class="">
                        <span class="material-icons-sharp">
                            <span class="material-icons-sharp">
                                format_list_bulleted
                            </span>
                        </span>
                        <h3>All Post</h3>
                    </a>
                    <!-- Users -->
                    <a href="#">
                        <span class="material-icons-sharp">
                            person
                        </span>
                        <h3>Users</h3>
                    </a>
                    <!-- Analytics -->
                    <a href="#">
                        <span class="material-icons-sharp">
                            insights
                        </span>
                        <h3>Analytics</h3>
                    </a>
                    <!-- messages -->
                    <a href="#">
                        <span class="material-icons-sharp">
                            question_answer
                        </span>
                        <h3>Messages</h3>
                        <span class="message-count">26</span>
                    </a>
                    <!-- settings -->
                    <a href="../edit_profile.php">
                        <span class="material-icons-sharp">
                            settings
                        </span>
                        <h3>Settings</h3>
                    </a>
                    <!-- logout -->
                    <a href="../process/logout.php">
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <h3>Logout</h3>
                    </a>
                </div>
            </aside>
            <!-- ================================= END OF ASIDE ======================================= -->

            <!-- ================================= Starting center main ======================================= -->
            <main>
                <h2>Post Control</h2>

                <!-- form -->
                <!-- 
           form variables for php--
            post_title
            post_category
            post_paragraph1
            post_code1
            post_paragraph2
            post_code2
            post_paragraph3
            post_code3  
         -->

                <div class="form-card card-body d-flex flex-column">
                    <div class="card1 res-card">

                        <div class="middle">
                            <form action="../process/post_delete_action.php" method="POST">
                                <!-- post title -->
                                <div class="row mb-3 post-title">
                                    <h1><?php echo $row['post_title']; ?></h1>
                                </div>
                                <!-- post publisher -->
                                <div class="row mb-3 post-title">
                                    <h3>Published by: <?php echo $row['post_publisher_username']; ?></h3>
                                </div>
                                <!-- post date -->
                                <div class="row mb-3 post-title">
                                    <h3><?php echo $row['post_date']; ?></h1>
                                </div>
                                <!-- category -->
                                <div class="row mb-3 category">
                                    <h3><?php echo $row['post_category']; ?></h3>
                                </div>
                                <!-- Paragraph 1 -->
                                <div class="row mb-3 paragraph1">
                                    <h4><?php echo $row['post_paragraph_1']; ?></h4>
                                </div>
                                <!-- code 1 -->
                                <div class="row mb-3 code1">
                                    <h4><i><?php echo $row['post_code_1']; ?></i></h4>
                                </div>
                                <!-- Paragraph 2 -->
                                <div class="row mb-3 paragraph2">
                                    <h4><?php echo $row['post_paragraph_2']; ?></h4>
                                </div>
                                <!-- code 2 -->
                                <div class="row mb-3 code2">
                                    <h4><i><?php echo $row['post_code_2']; ?></i></h4>
                                </div>
                                <!-- Paragraph 3 -->
                                <div class="row mb-3 paragraph3">
                                    <h4><?php echo $row['post_paragraph_3']; ?></h4>
                                </div>
                                <!-- code 3 -->
                                <div class="row mb-3 code3">
                                    <h4><i><?php echo $row['post_code_3']; ?></i></h4>
                                </div>

                                <div class="postActionButtons">
                                    <button type="submit" class="btn btn-primary submit-btn" name="delete_post" value="
                                                                                                                <?php echo $reviewID; ?>
                                                                                                                ">Delete</button>
                                    
                                </div>

                            </form>
                        <?php } ?>
                        </div>


                    </div>
                    <!-- here -->

                </div>

            </main>

            <!-- ================================= END OF Center main ======================================= -->

            <!-- ================================= Starting right side ======================================= -->

            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey, <b>Rahat</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="../../assets_home/card sample.jpg" style="width: 2.8rem; height:2.8rem ;border-radius:50%;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================================= End of right side ======================================= -->



        </div>
        <!--------------------------------------The whole body ends  here-------------------------------------------->

        <!-- ================================= FOOTER ======================================= -->


        <!--Footer 1-->
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
                        <a href="../../index.php" style="text-decoration: none;">
                            <strong class="text-warning">Kosai Limited</strong>
                        </a>
                    </p>

                </div>
            </div>
        </footer>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./post_controljs"></script>


        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>