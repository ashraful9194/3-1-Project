
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- to refresh after 1 min -->
    <!-- <meta http-equiv="refresh" content="60" /> -->


    <!-- material CDN -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./all_category.css">

    <title>demo</title>
</head>

<body>


    <!-- fetching database -->
    
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
                <!-- Dashboard -->
                <a href="./contributors_dashboard.php" class="active">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                
                
                
                <!-- logout -->
                <a href="../process/logout.php" style="">
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
            <div class="insights">
                <div class="card1 res-card">
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

                <div class="card2 res-card">
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
                </div>


            </div>

            <!-- ----------------------------- END OF INSIGHTS ------------------------------------- -->

            <div class="recent-posts">

            </div>
        </main>
        <!-- ---------------------------- END OF MAIN ------------------------------------------- -->

        <!-- ================================= RIGHT SIDE ======================================= -->
        <!-- connecting with database -->
        
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

    <script src="all_category.js"></script>


    <!-- for setting up theme -->
    <!-- will work on latter -->
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
