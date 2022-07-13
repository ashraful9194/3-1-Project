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
        </div>
    </div>

    <!-- ================================= End of right side ======================================= -->



</div>
<!--------------------------------------The whole body ends  here-------------------------------------------->

<?php include "./show_post_footer.php"?>