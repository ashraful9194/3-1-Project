<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>







    <div class="container">
        <div class="row">
            <div class="row align-item-start">
                <div class="col-sm-4 mt-5 ms-5 mb-5">
                    <!-- col1 -->
                    <img src="../assets_home/card sample.jpg" alt="">
                </div>
                <div class="col-sm-4 editProfile ">
                    <!-- col2 -->
                    <h1 class="pt-5">Edit Profile</h1>
                    <hr>
                    <h3 class="mt-4 mb-4">Basic Information</h3>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="label_txt">First Name</label>
                            <input type="text" class="form-control" name="fname" value="" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="label_txt">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="" required>
                        </div>
                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes1">Save</button>
                        
                        </form>

                        <form>
                        <h3 class="mt-5 mb-4">
                            Change Role
                        </h3>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label me-5" for="flexRadioDefault1">
                            Learner
                        </label>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Contributor
                        </label>
                        <br>
                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes2">Save</button>
                        </form>


                            <?php

                                $errors=json_decode($_SESSION['errors']);
                                unset($_SESSION['errors']);
                            ?>


                    <form action="process/change_password.php" method="POST">
                        <h3 class="mt-5 mb-4">
                            Change Password
                        </h3>
                        <!--form group for password-->
                        <div class="form-group">
                            <label class="label_txt">Type old password</label>
                            <input type="password" class="form-control" name="oldpassword" >
                            <?php
                            foreach ($errors->oldpassword as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>

                        <!--form group for confirm password-->
                        <div class="form-group mt-3">
                            <label class="label_txt">Type new password</label>
                            <input type="password" class="form-control" name="newpassword" >
                            <?php
                            foreach ($errors->newpassword as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-3">
                            <label class="label_txt">Confirm new password</label>
                            <input type="password" class="form-control" name="c_newpassword" >
                            <?php
                            foreach ($errors->c_newpassword as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>


                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes3">Save</button>
                    </form>

                </div>
                <div class="col-sm-4">
                            <!-- col3 -->
                </div>
            </div>
        </div>
    </div>















   



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" i ntegrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>