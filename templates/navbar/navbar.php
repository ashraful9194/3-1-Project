<div class="nav-row">
            <div class="left-top">
                <a href="../../index.php">
                    <div class="logo">
                        <img src="../assets/home-logo.png" alt="Kosai Limited logo">
                        <h2>Kosai <span style="color:#0a98f7">Limited</span></h2>
                    </div>
                </a>
            </div>
            <div class="top-middle">
                <h1>About site</h1>
            </div>
            <div class="top-right">

                <?php if (isset($_SESSION['id'])) { ?>
                    <div class="profile">

                        <a href=<?php
                                if ($_SESSION['role'] === "Admin") {
                                    echo "../admin_panel/adminpanel.php";
                                } elseif ($_SESSION['role'] === "Contributor") {
                                    echo "../contributors_dashboard/contributors_dashboard.php";
                                } else if ($_SESSION['role'] === "Learner") {
                                    echo "../learners_dashboard/learners_dashboard.php";
                                } ?>>
                            <button type="button" class="dash-btn">Dashboard</button> </a>
                        <!-- logout -->
                        <a href="../process/logout.php" style="margin: 0px;">
                            <span class="material-icons-sharp">
                                logout
                            </span>
                        </a>
                    </div>
                <?php } else { ?>
                    <a href="../login.php"><button type="button" class="dash-btn">Log in/ Sign up</button></a>
                <?php } ?>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
            </div>
        </div>
