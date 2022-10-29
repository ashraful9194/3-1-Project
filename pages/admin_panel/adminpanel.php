<?php
require_once "../config.php";
$current_visitor = $_SESSION['id'];
if (isset($current_visitor)) {
$query1="SELECT  count(*) as post_per_hour FROM    allpost WHERE   post_date > DATE_SUB(CURDATE(), INTERVAL 1 HOUR);";
$res1 = mysqli_query($dbc,$query1);
$post_per_hour=   (mysqli_fetch_assoc($res1));
$hour= $post_per_hour['post_per_hour']."%";

$query2="SELECT  count(*) as post_per_day FROM    allpost WHERE   post_date > DATE_SUB(CURDATE(), INTERVAL 1 DAY);";
$res2 = mysqli_query($dbc,$query2);
$post_per_day=   (mysqli_fetch_assoc($res2));
$day= $post_per_day['post_per_day']."%";

$query3="SELECT  count(*) as post_per_week FROM    allpost WHERE   post_date > DATE_SUB(CURDATE(), INTERVAL 7 DAY);";
$res3 = mysqli_query($dbc,$query3);
$post_per_week=  (mysqli_fetch_assoc($res3));
$week= $post_per_week['post_per_week']."%";

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
        <link rel="stylesheet" href="./adminstyle.css">
        <style>
            :root{
                --color-background:#f6f6f9;
                --color-dark:#363949;
            }
            .dark-theme-variables{
             --color-background: #181a1e;
             --color-dark: #edeffd;}
            
        .skill h1 {
            text-align: center;
        }
        .skill h3 {
            margin: 5px;
        }
        .skill {
            text-transform: uppercase;
            width: 100%;
            height: auto;
            margin: 10px auto;
            background-color: var(--color-background);
            color: var(--color-dark);
            padding: 20px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            border-radius: 20px;
        }
        .skill .bar {
            /* padding: 10px; */
            background: #353b48;
            display: block;
            height: 20px;
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all .3s cubic-bezier(.25, .8, .25, 1);
        }
        .skill .bar:hover {
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
        .skill .bar  span {
            height: 20px;
            float: left;
            background: linear-gradient(135deg, rgba(236, 0, 140, 1)0%, rgba(252, 103, 103, 1)100%);
        }
        .skill h3{
            margin-top: 10px;
        }

     
        .hour{
            color: var(--color-dark);
            display: flex;
            justify-content:center ;
            width: <?php echo $hour;?>;
            animation: hour 2s;
        }
        .day{
            color: var(--color-dark);
            display: flex;
            justify-content:center ;
            width: <?php echo $day;?>;
            animation: day 2s;
        }
        .week{
            color: var(--color-dark);
            display: flex;
            justify-content:center ;
            width:<?php echo $week?>;
            animation: week 2s;
        }
  
        @keyframes hour {
            0% {
                width: 0%;
            }
            100% {
                width: <?php echo $hour;?>;
            }
        }
        @keyframes day {
            0% {
                width: 0%;
            }
            100% {
                width: <?php echo $day; ?>;
            }
        }
        @keyframes week {
            0% {
                width: 0%;
            }
            100% {
                width:<?php echo $week;?>;
            }
        }
        </style>

        <title>Administration</title>
    </head>

    <body>

    

        <!-- fetching database  -->
        <!-- a problem is here that here only fetching is done but not cheking if the user is valid or not -->
        <?php
        $query = "SELECT * FROM kosai_limited.allpost where post_status='pending';";
        $res = mysqli_query($dbc, $query);
        $numRows = mysqli_num_rows($res);


        ?>
        <!-- ----------------------------- THE WHOLE BODY --------------------------------------------- -->

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
                    <a href="./adminpanel.php" class="active">
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Dashboard</h3>
                    </a>
                    <!-- Create post -->
                    <a href="../create_post/create_post.php">
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

            <!-- ================================= MAIN BODY ======================================= -->
            <main>
                <h1>Dashboard</h1>

                <div class="date">
                    <input type="date">
                </div>
                <div class="skill-body">

                <!-- <div class="skill-body"> -->
                    <div class="skill">
                        <h1>Insights</h1>
                        
                       
                            <h3>Posts per hour</h3>
                            <span class="bar"><span class="hour"><?php echo $post_per_hour['post_per_hour'];?></span></span>
                            <h3>Posts per day</h3>
                            <span class="bar"><span class="day"><?php echo $post_per_day['post_per_day'];?></span></span>
                            <h3>Posts per week</h3>
                            <span class="bar"><span class="week"><?php echo $post_per_week['post_per_week'];?></span></span>
                      
                        

                    </div>
                <!-- </div> -->
               


                    <!-- <div class="card1 res-card">
                        <span class="material-icons-sharp">
                            analytics
                        </span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total posts</h3>
                                <h1>2022</h1>
                            </div>

                        </div>
                        <small class="text-muted">Last 24 Hour</small>
                    </div> -->

                    <!-- <div class="card2 res-card">
                        <span class="material-icons-sharp">
                            analytics
                        </span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total posts</h3>
                                <h1>2022</h1>
                            </div>

                        </div>
                        <small class="text-muted">Last 24 Hour</small>
                    </div>

                    <div class="card3 res-card">
                        <span class="material-icons-sharp">
                            analytics
                        </span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total posts</h3>
                                <h1>2022</h1>
                            </div>

                        </div>
                        <small class="text-muted">Last 24 Hour</small>
                    </div> -->


                </div>

                <!-- ----------------------------- END OF INSIGHTS ------------------------------------- -->

                <div class="recent-posts">
                    <h2>Pending Posts</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>Post Title</th>
                                <!-- <th>Post Catregory</th> -->
                                <th>Publisher</th>
                                <!-- <th>Status</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($numRows > 0) {
                                $limit = 10;
                                while (($row = mysqli_fetch_assoc($res)) && $limit > 0) {
                                    // $postId = $row['post_id'];
                                    // $categories = mysqli_query($dbc, "SELECT post_category FROM `post_category_relationship` WHERE post_id=$postId");
                            ?>

                                    <tr>
                                        <td><?php echo $row['post_id']; ?></td>
                                        <td><?php echo $row['post_title']; ?></td>

                                        <td><?php echo $row['post_publisher_username']; ?></td>
                                        <!-- <td>pending</td> -->
                                        <td>
                                            <!-- <form action="./post_review_page.php" method="GET">

                                            <button type="button" class="btn review-button" name="review_id" value="
                                                                                                    <?php
                                                                                                    //$row['post_id'];
                                                                                                    ?>
                                                                                                    ">Review</button>

                                        </form> -->
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
                            <?php $limit--;
                                }
                            } ?>


                        </tbody>
                    </table>
                    <a href="./show_all_pending_posts.php">Show All</a>
                </div>
            </main>
            <!-- ---------------------------- END OF MAIN ------------------------------------------- -->

            <!-- ================================= RIGHT SIDE ======================================= -->
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
                <div class="recent-updates">
                    <!-- fetching last three post from database -->

                    <h2>Recent Updates</h2>
                    <div class="updates">
                        <div class="update">
                            <?php
                            $last_three_post = mysqli_query($dbc, "SELECT * FROM kosai_limited.allpost WHERE post_status='pending' order by post_id desc  LIMIT 3 ;");
                            $numRows = mysqli_num_rows($last_three_post);
                            if ($numRows == 3) {
                                while ($rows = mysqli_fetch_assoc($last_three_post)) {
                                    $userID = $rows['post_publisher_id'];
                                    $full_name = mysqli_query($dbc, "SELECT fname,lname from users where (id=$userID)");
                                    $name_row = mysqli_fetch_assoc($full_name);
                            ?>
                                    <div class="profile-photo">
                                        <img src="../../assets_home/card sample.jpg" style="width: 2.8rem; height:2.8rem ;border-radius:50%;">
                                    </div>
                                    <div class="message">
                                        <p><b> <?php echo $name_row['fname'] . " " . $name_row['lname']; ?> added a post.</b></p>
                                        <small class="text-muted"><?php echo $rows['post_date']; ?></small>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>

                    </div>

                </div>
                <!-- <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="../../assets_home/card sample.jpg" style="width: 2.8rem; height:2.8rem ;border-radius:50%;">
                        </div>
                        <div class="message">
                            <p><b>Rahat Ali updated this page</b></p>
                            <small class="text-muted">2mins ago</small>
                        </div>
                    </div>


                    <div class="update">
                        <div class="profile-photo">
                            <img src="../../assets_home/card sample.jpg" style="width: 2.8rem; height:2.8rem ;border-radius:50%;">
                        </div>
                        <div class="message">
                            <p><b>Rahat Ali updated this page</b></p>
                            <small class="text-muted">2mins ago</small>
                        </div>
                    </div>
                </div>
            </div> -->
            </div>
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

        <script src="./adminscript.js"></script>


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
<?php } //if the visitor is valid
else {
    echo "The page you are looking for is not here to be found. Try looking into your pocket. And try again!";
}
?>
<?php mysqli_close($dbc); ?>