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
    <link rel="stylesheet" href="./show_all_pending_posts.css">
    <!-- date viewer -->
    <title>All Pending Posts</title>
</head>

<body>
    <!-- fetching from database -->
    <?php
    // fetching for current user
    $userID = $_SESSION["id"];
    if ($_SESSION['role'] === "Admin") {
        $query = "SELECT * FROM kosai_limited.allpost where post_status='pending';";
    }
    if ($_SESSION['role'] === "Contributor") {
        $query = "SELECT 
        post_id,
        post_date,
        post_publisher_username,
        post_publisher_id,
        post_title,
        post_paragraph_1,
        post_code_1,
        post_paragraph_2,
        post_code_2,
        post_paragraph_3,
        post_code_3,
        post_status,
        role  FROM kosai_limited.allpost  join kosai_limited.users 
        ON (allpost.post_publisher_id=users.id)
         where post_status='pending' and role='Contributor';";
    }
    $res = mysqli_query($dbc, $query);
    $numRows = mysqli_num_rows($res);

    ?>

    <!--------------------------------------The whole body starts from here-------------------------------------->
    <!-- This whole page is divied into 3 portion : aside , center main and right portion. 
     Aside contains page navigations.
     Center main contains the full list of all pending post.
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
                <!-- Search box -->
                <a href="../search_managment/search_result.php" class="">
                        <span class="material-icons-sharp">
                            search
                        </span>
                        <h3>Search</h3>
                    </a>
                <!-- Dashboard -->
                <a href="./adminpanel.php">
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
                <a href="../all_posts/all_posts.php" class="">
                    <span class="material-icons-sharp">
                        <span class="material-icons-sharp">
                            format_list_bulleted
                        </span>
                    </span>
                    <h3>All Post</h3>
                </a>
                <!-- Users -->
                <a href="./all_users.php">
                    <span class="material-icons-sharp">
                        person
                    </span>
                    <h3>Users</h3>
                </a>
                <!-- Analytics -->
                <!-- <a href="#">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a> -->
                <!--contact messages -->
                <?php
                $message_count = mysqli_query($dbc, "SELECT count(*) as unread from contact_messages where message_seen_status=0");
                $number_of_messages = mysqli_fetch_assoc($message_count);
                ?>
                <a href="#">
                    <span class="material-icons-sharp">
                        quickreply
                    </span>
                    <h3>Messages</h3>
                    <span class="message-count"><?php echo $number_of_messages['unread']; ?></span>
                </a>
                <!-- messages -->
                <a href="#">
                    <span class="material-icons-sharp">
                        question_answer
                    </span>
                    <h3>Comments</h3>
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
            <h2>All Pending Post List</h2>



            <!-- content here -->
            <div class="recent-posts">

                <table>
                    <thead>
                        <tr>
                            <th>Post ID</th>
                            <th>Post Title</th>
                            <th>Post Catregory</th>
                            <th>Publisher</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($numRows > 0) {

                            while (($row = mysqli_fetch_assoc($res))) {
                                $postId = $row['post_id'];
                                $categories = mysqli_query($dbc, "SELECT post_category FROM `post_category_relationship` WHERE post_id=$postId");
                        ?>

                                <tr>
                                    <td><?php echo $row['post_id']; ?></td>
                                    <td><?php echo $row['post_title']; ?></td>
                                    <td><?php while ($categoryName = mysqli_fetch_assoc($categories)) { ?>
                                            <span class="category-viewer">
                                                <?php echo "| ";
                                                echo $categoryName['post_category'], " | "; ?>
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $row['post_publisher_username']; ?></td>
                                    <!-- <td>pending</td> -->
                                    <td>
                                        <form action="./post_review_page.php" method="POST">
                                            <button type="submit" id="review-button" class="btn review-button" name="review_id" value="
                                                                                                    <?php
                                                                                                    echo $row['post_id'];
                                                                                                    ?>
                                                                                                    ">Review</button>

                                            <script type="text/javascript">
                                                document.getElementById("review-button").onclick = function() {
                                                    location.href = "./post_review_page.php";
                                                };
                                            </script>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } ?>


                    </tbody>
                </table>

            </div>







        </main>

        <!-- ================================= END OF Center main ======================================= -->

        <!-- ================================= Starting right side ======================================= -->

        <!-- connecting with database -->
        <?php
        $current_user = $_SESSION['id'];
        $result = mysqli_query($dbc, "SELECT fname,role from users WHERE id=$current_user");
        $numRows = mysqli_num_rows($result);
        if ($numRows == 1) {
            $row_info = mysqli_fetch_assoc($result);
        }
        ?>
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
                        <!-- info -->
                        <p>Hey, <b><?php echo $row_info['fname']; ?></b></p>
                        <small class="text-muted"><?php echo $row_info['role']; ?></small>
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
                        <a href="../../index.php" style="text-decoration: none;">
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
    <script src="./show_all_pending_posts.js"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php mysqli_close($dbc); ?>