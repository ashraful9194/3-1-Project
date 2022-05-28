    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign in to Kosai Limited</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="login_body">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>

            <!--Form starting here-->
            <div class="col-sm-4">
                <div class="login_form">
                    <center><img src="assets/home-logo.png" alt="Kosai Limited Logo" style="width:70;height:70px;" class="logo img-fluid mb-2">
                    <h1 class="mb-3">Kosai Limited</h1></center>
                    <form>
                        <div class="mb-3">
                            <label class="label_txt">Username or Email</label>
                            <input type="email" class="form-control" >
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" >
                        </div>
                        <button type="submit" class="form-btn btn btn-primary">Login</button>
                    </form>

                    <br>
                    <p style="font-size: 12px ; text-align: center; marign-top: 10px;">
                    <a href="forgot_password.php" style="color: #00376b;">Forgot Password?</a>
                    </p>
                    <br>
                    <p>Don't have an account? <a href="sign_up.php">Sign up</a>
                    </p>

                </div>
            </div>
        <!--form ends here-->
            <div class="col-sm-4">   
            </div>

    </div>
    </div>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
    </html>