<?php include "./show_post_header.php" ?>
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
            <?php if (isset($_SESSION['id'])) { ?>
                <!-- Dashboard -->
                <a href="<?php
                            $query2 = "SELECT role FROM kosai_limited.users where (id=$userID);";
                            $result2 = mysqli_query($dbc, $query2);
                            $rolefetch = mysqli_fetch_assoc($result2);
                            if ($rolefetch['role'] == "Admin")
                                echo "../admin_panel/adminpanel.php";
                            // if($row['role']=="Learner")
                            // echo "../learners_dashboard/learners_dashboard.php";
                            if ($rolefetch['role'] == "Contributor")
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
                <a href="./all_posts.php" class="">
                    <span class="material-icons-sharp">
                        <span class="material-icons-sharp">
                            format_list_bulleted
                        </span>
                    </span>
                    <h3>All Post</h3>
                </a>
                <!-- Users -->
                <?php
                if ($rolefetch['role'] == "Admin") { ?>
                    <a href="../admin_panel/all_users.php">
                        <span class="material-icons-sharp">
                            person
                        </span>
                        <h3>Users</h3>
                    </a>
                <?php } ?>
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
            <?php } else { ?>
                <h3>something tobe shown here</h3>
            <?php } ?>

        </div>
    </aside>
    <!-- ================================= END OF ASIDE ======================================= -->

    <!-- ================================= Starting center main ======================================= -->
    <main>
        <h2>Post</h2>

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

        <!-- fetching category -->
        <?php $categories = mysqli_query($dbc, "SELECT post_category FROM `post_category_relationship` WHERE post_id=$reviewID"); ?>
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
                            <h3><?php while ($categoryName = mysqli_fetch_assoc($categories)) { ?>
                                    <span class="category-viewer">
                                        <?php echo $categoryName['post_category'], " "; ?>
                                    </span>
                                <?php } ?>
                            </h3>
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



                    </form>

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
            <?php if (!isset($_SESSION['id'])) { ?>
                <div class="nav-item" style="font-size: 1rem;"><a href="../login.php" class="nav-link text-info">Login/Signup</a></div>
            <?php } ?>
            <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div>
        </div>
    </div>

    <!-- ================================= End of right side ======================================= -->



</div>
<!--------------------------------------The whole body ends  here-------------------------------------------->
<!-- -------------------------------------comment section -------------------------------- -->


<!-- -------------------------------------comment section -------------------------------- -->


<?php include "./show_post_footer.php" ?>