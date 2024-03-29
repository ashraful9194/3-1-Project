<?php include "./all_post_header.php" ?>
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
            <!-- Search box -->
            <a href="../search_managment/search_result.php" class="">
                        <span class="material-icons-sharp">
                            search
                        </span>
                        <h3>Search</h3>
                    </a>
            <!-- Dashboard -->
            <a href="<?php
                        $query2 = "SELECT role FROM kosai_limited.users where (id=$userID);";
                        $result2 = mysqli_query($dbc, $query2);
                        $row = mysqli_fetch_assoc($result2);
                        if ($row['role'] == "Admin")
                            echo "../admin_panel/adminpanel.php";
                        // if($row['role']=="Learner")
                        // echo "../learners_dashboard/learners_dashboard.php";
                        if ($row['role'] == "Contributor")
                            echo "../contributors_dashboard/contributors_dashboard.php";
                        ?>">
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
            <a href="./all_posts.php" class="active">
                <span class="material-icons-sharp">
                    <span class="material-icons-sharp">
                        format_list_bulleted
                    </span>
                </span>
                <h3>All Post</h3>
            </a> 
            <!-- Analytics -->
            <!-- <a href="#">
                <span class="material-icons-sharp">
                    insights
                </span>
                <h3>Analytics</h3>
            </a> -->
            <!-- Users -->
            <?php
            if ($row['role'] == "Admin") { ?>
                <a href="../admin_panel/all_users.php">
                    <span class="material-icons-sharp">
                        person
                    </span>
                    <h3>Users</h3>
                </a>
            
           
            <!--contact messages -->
            <?php
            if ($row['role'] == "Admin") { 
                
                $message_count = mysqli_query($dbc,"SELECT count(*) as unread from contact_messages where message_seen_status=0");
                $number_of_messages=mysqli_fetch_assoc($message_count);

                ?>
                <a href="../admin_panel/contact_message_handling.php">
                    <span class="material-icons-sharp">
                        quickreply
                    </span>
                    <h3>Messages</h3>
                    <span class="message-count"><?php echo $number_of_messages['unread'];?></span>
                </a>
            <?php } ?>
            <!-- messages -->
            <a href="#">
                <span class="material-icons-sharp">
                    question_answer
                </span>
                <h3>Comments</h3>
                <span class="message-count">26</span>
            </a><?php } ?>
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
        <h2>Post List</h2>

        <!-- tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#my_posts">My Posts</a></li>
            <?php
            if ($row['role'] == "Admin") { ?>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#all_posts">All Posts</a></li>
            <?php } ?>
        </ul>
        <!-- tab content -->
        <div class="tab-content">
            <div class="tab-pane active" id="my_posts">
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
                                $limit = 20;
                                while (($row = mysqli_fetch_assoc($res)) && $limit > 0) {
                                    $postId = $row['post_id'];
                                    $categories = mysqli_query($dbc, "SELECT post_category FROM `post_category_relationship` WHERE post_id=$postId");
                            ?>

                                    <tr>
                                        <td><?php echo $row['post_id']; ?></td>
                                        <td><?php echo $row['post_title']; ?></td>
                                        <td> <?php while ($categoryName = mysqli_fetch_assoc($categories)) { ?>
                                                <span class="category-viewer">
                                                    <?php echo "| ";
                                                    echo $categoryName['post_category'], " | "; ?>
                                                </span>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $row['post_publisher_username']; ?></td>
                                        <!-- <td>pending</td> -->
                                        <td>
                                            <form action="../post_control_page/post_control.php" method="POST">
                                                <button type="submit" id="review-button" class="btn review-button" name="review_id" value="
                                                                                                    <?php
                                                                                                    echo $row['post_id'];
                                                                                                    ?>
                                                                                                    ">Review</button>

                                                <script type="text/javascript">
                                                    document.getElementById("review-button").onclick = function() {
                                                        location.href = "../post_control_page/post_control.php";
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

                </div>

            </div>
            <div class="tab-pane " id="all_posts">
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
                            <!-- to view all post from all post database only for admins -->
                            <?php
                            $query2 = "SELECT role FROM kosai_limited.users where (id=$userID);";
                            $result2 = mysqli_query($dbc, $query2);
                            $numRows = mysqli_num_rows($result2);
                            if ($numRows == 1) {
                                $row = mysqli_fetch_assoc($result2);
                                $user_role = $row['role']; //fetching role from users table
                            }
                            if ($user_role == "Admin") {
                                $query = "SELECT * FROM kosai_limited.allpost WHERE  post_status='approved' order by post_id desc;";
                                $res = mysqli_query($dbc, $query);
                                $numRows = mysqli_num_rows($res);
                                if ($numRows > 0) {
                                    $limit = 20;
                                    while (($row = mysqli_fetch_assoc($res)) && $limit > 0) {
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
                                                <form action="../post_control_page/post_control.php" method="POST">
                                                    <button type="submit" id="review-button" class="btn review-button" name="review_id" value="
                                                                                                    <?php
                                                                                                    echo $row['post_id'];
                                                                                                    ?>
                                                                                                    ">Review</button>

                                                    <script type="text/javascript">
                                                        document.getElementById("review-button").onclick = function() {
                                                            location.href = "../post_control_page/post_control.php";
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

                </div>

            </div>
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

<?php include "./all_post_footer.php" ?>