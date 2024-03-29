<!doctype html>
<?php require_once("./config.php"); ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up in Kosai Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="container mt-5">

        <div class="row">

            <?php
            require_once './errors/Error_signup.php';
            $errors = new FormError();
            try {
                if (isset($_POST['signup'])) {
                    extract($_POST);
                    //for first name validation
                    if (strlen($fname) < 3) //min fname
                    {

                        $errors->fname[] = 'Please enter first name using 3 characters at least';
                    }
                    if (strlen($fname) > 20) //max fname
                    {

                        $errors->fname[] = 'First name must not exceed 20 characters';
                    }
                    if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)) {
                        $errors->fname[] = 'Invalid entry First Name. Please enter letters 
                    without any digit or special symbol like (1,2,3#,$,%,%,^,&,*,!,~,-)';
                    }

                    //for last name validation
                    if (strlen($lname) < 3) //min lname
                    {
                        $errors->lname[] = 'Please enter Last name using 3 characters at least';
                    }
                    if (strlen($lname) > 20) //max lname
                    {
                        $errors->lname[] = 'Last name must not exceed 20 characters';
                    }
                    if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)) {
                        $errors->lname[] = 'Invalid entry Last Name. Please enter letters 
                    without any digit or special symbol like (1,2,3#,$,%,%,^,&,*,!,~,-)';
                    }

                    //for username validation
                    if (strlen($username) < 3) //min username
                    {
                        $errors->username[] = 'Please enter  username using 3 characters at least';
                    }
                    if (strlen($username) > 50) //max username
                    {
                        $errors->username[] = 'Username must not exceed 50 characters';
                    }
                    if (!preg_match("/^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)) {
                        $errors->username[] = 'Invalid entry for Username. Enter lowercase letters 
                    without any space and no number at the start .';
                    }

                    //for email validation
                    if (strlen($email) > 50) {
                        $errors->email[] = 'Email must not exceed 50 characters';
                    }

                    //for password validation
                    if ($passwordConfirm == '') {
                        $errors->password[] = 'Please confirm your password';
                    }
                    if ($password != $passwordConfirm) {
                        $errors->password[] = 'Password do not match';
                    }
                    if (strlen($password) < 5) {
                        $errors->password[] = 'Password must be at least 6  characters long';
                    }
                    if (strlen($password) > 20) {
                        $errors->password[] = 'Password must not exceed 20 characters.';
                    }

                    //for checking if the user is already registered or not
                    $sql = "select * from users where (username='$username' or email='$email');";
                    $res = mysqli_query($dbc, $sql);
                    if (mysqli_fetch_assoc($res) > 0) {
                        $row = mysqli_fetch_assoc($res);
                        if ($username == $row['username']) {
                            $errors->username[] = 'Username already exists.';
                        }
                        if ($email == $row['email']) {
                            $errors->email[] = 'Email already exists';
                        }
                    }
                    if (!$errors->haserror()) {
                        $date = date('Y-m-d');
                        $options = array("cost" => 4);
                        $password = password_hash($password, PASSWORD_DEFAULT, $options);

                        //insert
                        $result = mysqli_query($dbc, "INSERT into users
                    values(null, '$fname','$lname','$username','$email','$password','$date','$role')");

                        if ($result) {
                            $done = 2;
                        } else {
                            $errors->sql[] = 'Failed. Something went wrong';
                        }
                    }
                }
            } catch (Exception $e) {
                //print_r($e);
                $errors->excep[] = $e->getMessage();
            }
            ?>


            <div class="col-sm-4">
                <!--showing errors-->
            </div>
            <div class="col-sm-4">




                <div class="signup_form">
                    <br>
                    <center><img src="./assets/home-logo.png" alt="Kosai Limited Logo" style="width:70;height:70px;" class="logo img-fluid mb-2">
                            <h1 class="mb-3">Kosai Limited</h1>
                        </center>
                    <?php
                    if (isset($done)) { ?>
                        <div class="alert alert-success" role="alert">
                            <center>Congratulations! Registration successfull. </center><br>
                        </div>
                    <?php } ?>


                    <form action="" method="POST">
                        <!--form group for first name-->
                        <div class="form-group">
                            <label class="label_txt">First Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php
                                                                                        if ($errors->haserror()) {
                                                                                            echo $fname;
                                                                                        }
                                                                                        ?>" required="">
                            <?php
                            foreach ($errors->fname as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>

                        </div>
                        <!--form group for last name-->
                        <div class="form-group">
                            <label class="label_txt">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="<?php
                                                                                        if ($errors->haserror()) {
                                                                                            echo $lname;
                                                                                        }
                                                                                        ?>" required="">
                            <?php
                            foreach ($errors->lname as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <!--From group for username-->
                        <div class="form-group">
                            <label class="label_txt">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php
                                                                                            if ($errors->haserror()) {
                                                                                                echo $username;
                                                                                            }
                                                                                            ?>" required="">
                            <?php
                            foreach ($errors->username as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <!--From group for email-->
                        <div class="form-group">
                            <label class="label_txt">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php
                                                                                            if ($errors->haserror()) {
                                                                                                echo $email;
                                                                                            }
                                                                                            ?>" required="">
                            <?php
                            foreach ($errors->email as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <!--form group for password-->
                        <div class="form-group">
                            <label class="label_txt">Password</label>
                            <input type="password" class="form-control" name="password" required="">
                            <?php
                            foreach ($errors->password as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <!--form group for confirm password-->
                        <div class="form-group">
                            <label class="label_txt">Confirm Password</label>
                            <input type="password" class="form-control" name="passwordConfirm" required="">
                        </div>
                        <br>

                        <!-- adding role -->
                        <div>
                        <h5 class=" mb-4">
                            Select Role
                        </h5>
                        <input class="form-check-input" type="radio" name="role" id="learner" value="Learner">
                        <label class="form-check-label me-5" for="learner">
                            Learner
                        </label>
                        <input class="form-check-input" type="radio" name="role" id="contributor" value="Contributor" >
                        <label class="form-check-label" for="contributor">
                            Contributor
                        </label>
                        </div>

                        <br>
                        <button type="submit" class="form-btn btn btn-primary" name="signup">Signup</button>
                        <br>
                        <p>Already Registered? <a href="login.php" style="text-decoration:none ;">Sign in</a></p>
                        <!--closing else part of php-->
                    </form>
                </div>
            </div>

            <div class="col-sm-4">
                <!--useless-->
            </div>
        </div>

    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
<?php mysqli_close($dbc);?>