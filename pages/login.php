<?php require_once "./config.php";?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in to Kosai Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="login_body">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>

            <!--Form starting here-->
            <div class="col-sm-4">
                <div class="login_form">
                    <center><img src="./assets/home-logo.png" alt="Kosai Limited Logo" style="width:70;height:70px;" class="logo img-fluid mb-2">
                        <h1 class="mb-3">Kosai Limited</h1>
                    </center>
                    <?php
                    if (isset($_GET['loginerror'])) {
                        $loginerror = $_GET['loginerror'];
                    }
                    if (!empty($loginerror)) {
                        echo '<p class="text-danger"> Invalid login credentials,Please Try Again..</p>';
                    }
                    ?>

                    <form action="./process/login_process.php" method="POST">
                        <!--email section-->
                        <div class=" mb-3 form-group">
                            <label class="label_txt">Username or Email</label>
                            <input type="text" name="login_var" class="form-control " value="<?php
                                                                                                if (!empty($loginerror))
                                                                                                    echo $loginerror;
                                                                                                else {
                                                                                                    if ((isset($_COOKIE['emailcookie']))) {
                                                                                                        echo $_COOKIE['emailcookie'];
                                                                                                    }
                                                                                                }
                                                                                                ?>">

                        </div>

                        <!--password section-->
                        <div class=" mb-3 form-group">
                            <label for="label_txt">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dropdownCheck" name="rememberme">
                            <label class="form-check-label" for="dropdownCheck">
                                Remember me
                            </label>
                        </div>
                        <br>

                        <input type="submit" name="sublogin" class="form-btn btn btn-primary" value="Login">
                    </form>

                    <br>

                    <!--Forgot password section-->
                    <p style="font-size: 12px ; text-align: center;">
                        <a href="./forgot_password.php" style="color: #00376b;">Forgot Password?</a>
                    </p>
                    <br>

                    <!--Sign uo section-->
                    <p>Don't have an account? <a href="./sign_up.php">Sign up</a>
                    </p>

                </div>
            </div>
            <!--form ends here-->
            <div class="col-sm-4">
            </div>

        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
<?php mysqli_close($dbc); ?>