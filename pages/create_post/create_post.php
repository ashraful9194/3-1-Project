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
        <div class="form-card">
            <div class="card1 res-card">

                <div class="middle">
                    <div class="left">
                        <h3>Total posts</h3>
                        <h1>2022</h1>
                    </div>

                </div>
                <small class="text-muted">Cretaing post form</small>
                
            </div>
        </div>

    </main>

    <!-- ================================= END OF Center main ======================================= -->


</div>
<!--------------------------------------The whole body ends  here-------------------------------------------->






<?php include "./cpfooter.php" ?>