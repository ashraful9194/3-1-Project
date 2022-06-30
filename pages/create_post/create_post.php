<?php include "./cpheader.php" ?>




<!--------------------------------------The whole body starts from here-------------------------------------->
<!-- This whole page is divied into 3 portion aside , center main and right portion. 
     Aside contains page navigations.
     Center main contains the tittle and full form.
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
            <a href="#">
                <span class="material-icons-sharp">
                    dashboard
                </span>
                <h3>Dashboard</h3>
            </a>
            <!-- Create post -->
            <a href="#" class="active">
                <span class="material-icons-sharp">
                    draw
                </span>
                <h3>Create Post</h3>
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
            <a href="#">
                <span class="material-icons-sharp">
                    settings
                </span>
                <h3>Settings</h3>
            </a>
            <!-- logout -->
            <a href="#">
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
        <h2>Create Post</h2>
        <div class="date">
            <input type="date">
        </div>
        <!-- form -->
        <div class="form-card card-body d-flex flex-column">
            <div class="card1 res-card">

                <div class="middle">
                    <form action="" method="POST">
                        <!-- post title -->
                        <div class="row mb-3 post-title">
                            <label for="post-title" class="col-sm-2 col-form-label">Post Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="post-tittle" name="post-title">
                            </div>
                        </div>
                        <!-- category -->
                        <div class="row mb-3 category">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category" name="category">
                            </div>
                        </div>
                        <!-- Paragraph 1 -->
                        <div class="row mb-3 paragraph1">
                            <label for="paragraph1" class="col-sm-2 col-form-label">Paragraph 1</label>
                            <div class="col-sm-10">
                                <textarea name="paragraph1" id="paragraph1" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <!-- code 1 -->
                        <div class="row mb-3 code1">
                            <label for="code1" class="col-sm-2 col-form-label">Code 1</label>
                            <div class="col-sm-10">
                                <textarea name="code1" id="code1" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <!-- Paragraph 2 -->
                        <div class="row mb-3 paragraph2">
                            <label for="paragraph2" class="col-sm-2 col-form-label">Paragraph 2</label>
                            <div class="col-sm-10">
                                <textarea name="paragraph2" id="paragraph2" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <!-- code 2 -->
                        <div class="row mb-3 code2">
                            <label for="code2" class="col-sm-2 col-form-label">Code 2</label>
                            <div class="col-sm-10">
                                <textarea name="code2" id="code2" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <!-- Paragraph 3 -->
                        <div class="row mb-3 paragraph3">
                            <label for="paragraph3" class="col-sm-2 col-form-label">Paragraph 3</label>
                            <div class="col-sm-10">
                                <textarea name="paragraph3" id="paragraph3" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <!-- code 3 -->
                        <div class="row mb-3 code3">
                            <label for="code3" class="col-sm-2 col-form-label">Code 3</label>
                            <div class="col-sm-10">
                                <textarea name="code3" id="code3" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary submit-btn" name="submit_post">Submit</button>
                        
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






<?php include "./cpfooter.php" ?>