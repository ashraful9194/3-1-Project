<?php
require_once "../config.php";
//$_POST['submit_search']="";
//$_POST['search_string']="";
if (!isset($search)) {
    $search = null;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- to refresh after 1 min -->
    <meta http-equiv="refresh" content="60" />


    <!-- material CDN -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./search_result.css">

    <title>Search result</title>
</head>

<body>


    <!-- fetching database  -->
    <!-- a problem is here that here only fetching is done but not cheking if the user is valid or not -->

    <!-- ----------------------------- THE WHOLE BODY --------------------------------------------- -->

    <div class="container">
        <!-- --------------------- ASIDE -------------------------------------------- -->

        <aside id="aside-menu" class="">
            <a href="../../index.php" class="">
                <div class="logo">
                    <img src="../../assets_home/home-logo.png" alt="Kosai Limited logo">
                    <h2>Kosai <span style="color:#0a98f7">Limited</span></h2>
                </div>
            </a>
            <?php if(isset($_SESSION['id'])){
                $current_visitor = $_SESSION['id'];
                //echo $_SESSION['role'];
            }
            if (isset($current_visitor)) { ?>
                <div class="top">

                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </div>
                </div>
                <div class="sidebar">
                    <!-- Dashboard -->
                    <?php //if($_SESSION['role']="Admin")
                    //{//echo "../admin_panel/adminpanel.php";}
                    //else if($_SESSION['role']!="Contributor")
                    //{//echo "../contributors_dashboard/contributors_dashboard.php";}
                    //else
                    //{//echo "../learners_dashboard/leraners_dashboard.php";}?>
                    <a href="" class="active">
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Dashboard</h3>
                    </a>
                    <?php if($_SESSION['role']!="Learner"){?>
                    <!-- Create post -->
                    <a href="../create_post/create_post.php">
                        <span class="material-icons-sharp">
                            draw
                        </span>
                        <h3>Create Post</h3>
                    </a><?php }?>

                    <?php if($_SESSION['role']!="Learner" && $_SESSION['role']!="Contributor"){?>
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
                    <a href="#">
                        <span class="material-icons-sharp">
                            insights
                        </span>
                        <h3>Analytics</h3>
                    </a>
                    <?php }?>

                    <?php if($_SESSION['role']!="Learner" && $_SESSION['role']!="Contributor"){?>
                    <!--contact messages -->
                    <?php
                    $message_count = mysqli_query($dbc, "SELECT count(*) as unread from contact_messages where message_seen_status=0");
                    $number_of_messages = mysqli_fetch_assoc($message_count);
                    ?>
                    <a href="./contact_message_handling.php">
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
                    <?php }?>
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
            <?php } ?>
        </aside>

        <!-- ================================= END OF ASIDE ======================================= -->

        <!-- ================================= MAIN BODY ======================================= -->
        <main>
            <?php //include ("./search_box.php");
            ?>

            <div class="topnav">
                <form action="" method="POST">
                    <input type="text" class="" id="search_string" name="search_string" placeholder="Search keywords or category...">
                    <button type="submit" class="" name="submit_search"><span class="material-icons-sharp">
                            search
                        </span></button>
                </form>
            </div>

            <h1>Search result for "<?php echo $search; ?>"</h1>


            <?php
            if (isset($_POST['submit_search'])) {
                extract($_POST);
                $search = $_POST['search_string'];
                // echo $search;
                $query = "SELECT allpost.post_id,allpost.post_title,post_category_relationship.post_category FROM allpost natural join post_category_relationship 
     where(post_title like '%$search%' or post_category like '%$search%');";
                $res = mysqli_query($dbc, $query);
                $numRows = mysqli_num_rows($res);

            ?>

                <!-- ----------------------------- END OF INSIGHTS ------------------------------------- -->

                <div class="recent-posts">

                    <table>
                        <thead>
                            <tr>

                                <th>Post Title</th>
                                <th>Post Catregory</th>
                                <!-- <th>Publisher</th> -->
                                <!-- <th>Status</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($numRows > 0) {
                                $limit = 10;
                                while (($row = mysqli_fetch_assoc($res))) {
                                    $postId = $row['post_id'];
                                    $categories = mysqli_query($dbc, "SELECT post_category FROM `post_category_relationship` WHERE post_id=$postId");
                            ?>

                                    <tr>

                                        <td><?php echo $row['post_title']; ?></td>
                                        <td> <?php while ($categoryName = mysqli_fetch_assoc($categories)) { ?>
                                                <span class="category-viewer">
                                                    <?php echo "| ";
                                                    echo $categoryName['post_category'], " | "; ?>
                                                </span>
                                            <?php } ?>
                                        </td>

                                        <td>

                                            <form action="../show_post_for_all/show_post.php" method="POST">
                                                <button type="submit" id="review-button" class="btn review-button" name="review_id" value="
                                                                                                    <?php
                                                                                                    echo $row['post_id'];
                                                                                                    ?>
                                                                                                    ">Review</button>

                                                <script type="text/javascript">
                                                    document.getElementById("review-button").onclick = function() {
                                                        location.href = "../show_post_for_all/show_post.php";
                                                    };
                                                </script>
                                            </form>
                                        </td>
                                    </tr>
                        <?php $limit--;
                                }
                            }
                        } ?>


                        </tbody>
                    </table>
                    <!-- <a href="./show_all_pending_posts.php">Show All</a> -->
                </div>
        </main>
        <!-- ---------------------------- END OF MAIN ------------------------------------------- -->

        <!-- ================================= RIGHT SIDE ======================================= -->
        <!-- connecting with database -->

        <!-- ================================= END OF RIGHT SIDE ======================================= -->

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

    <script src="./search_result.js"></script>


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