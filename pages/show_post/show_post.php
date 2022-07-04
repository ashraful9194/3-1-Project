<?php include "./show_post_header.php"?>
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
        <h2>Admin Review</h2>
        
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
                    <form action="./create_post_process.php" method="POST">
                        <!-- post title -->
                        <div class="row mb-3 post-title">
                            
                        </div>
                        <!-- category -->
                        <div class="row mb-3 category">
                           
                        </div>
                        <!-- Paragraph 1 -->
                        <div class="row mb-3 paragraph1">
                            
                        </div>
                        <!-- code 1 -->
                        <div class="row mb-3 code1">
                           
                        </div>
                        <!-- Paragraph 2 -->
                        <div class="row mb-3 paragraph2">
                           
                        </div>
                        <!-- code 2 -->
                        <div class="row mb-3 code2">
                           
                        </div>
                        <!-- Paragraph 3 -->
                        <div class="row mb-3 paragraph3">
                            
                        </div>
                        <!-- code 3 -->
                        <div class="row mb-3 code3">
                            
                        </div>

                        <button type="submit" class="btn btn-primary submit-btn" name="approve_post">Approve</button>

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

<?php include "./show_post_footer.php"?>