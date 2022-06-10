<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
    <!-- boxicon CDN -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin panel</title>
</head>

<body class="admin_panel_body">


    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxl-c-plus-plus'></i>
                <div class="logo_name">
                    Kosai Limited
                </div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
            <ul class="nav_list">
                <li>
                    
                    <i class='bx bx-search-alt-2'></i>
                    <input type="search" placeholder="Search...">
                   
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bxs-user'></i>
                    <span class="links_name">User</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bx-message-dots' ></i>
                    <span class="links_name">Messages</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bxs-pie-chart-alt-2' ></i>
                    <span class="links_name">Analytics</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bxs-folder' ></i>
                    <span class="links_name">File Manager</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bxs-cog' ></i>
                    <span class="links_name">Settings</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="./assets/card sample.jpg" alt="">
                        <div class="name_role">
                            <div class="name">Users Full name</div>
                            <div class="role">Role</div>
                        </div>
                    </div>
                    <i class='bx bx-log-out' id="log_out"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="home_content">
        HOme content
    </div>






















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>