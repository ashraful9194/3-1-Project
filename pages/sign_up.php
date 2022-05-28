<!doctype html>
<?php require_once("config.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up in Kosai Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
   <div class="container mt-5">

        <div class="row">

        <?php
            if(isset($_POST['signup']))
            {
                extract($_POST);
                //for first name validation
                if(strlen($fname)<3)//min fname
                {
                    $error[]='Please enter first name using 3 characters at least';
                }
                if(strlen($fname)>20)//max fname
                {
                    $error[]='First name must not exceedn 20 characters';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$fname))
                {
                    $error[]='Invalid entry First Name. Please enter letters 
                    without any digit or special symbol like (1,2,3#,$,%,%,^,&,*,!,~,-)';
                }

                //for last name validation
                if(strlen($lname)<3)//min lname
                {
                    $error[]='Please enter Last name using 3 characters at least';
                }
                if(strlen($lname)>20)//max lname
                {
                    $error[]='Last name must not exceed 20 characters';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$lname))
                {
                    $error[]='Invalid entry Last Name. Please enter letters 
                    without any digit or special symbol like (1,2,3#,$,%,%,^,&,*,!,~,-)';
                }

                //for username validation
                if(strlen($username)<3)//min username
                {
                    $error[]='Please enter  username using 3 characters at least';
                }
                if(strlen($username)>50)//max username
                {
                    $error[]='Username must not exceed 50 characters';
                }
                if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/",$username))
                {
                    $error[]='Invalid entry for Username. Enter lowercase letters 
                    without any space and no number at the start -Eg- myusername, helloworld or helloworld123';
                }

                //for email validation
                if(strlen($email)>50)
                {
                    $error[]= 'Email must not exceed 50 characters';
                }

                //for password validation
                if($passwordConfirm=='')
                {
                    $error[]='Please confirm your password';
                }
                if($password!=$passwordConfirm)
                {
                    $error[]='Password do not match';
                }
                if(strlen($password)<5)
                {
                    $error[]='Password must be at least 6  characters long';
                }
                if(strlen($password)>20)
                {
                    $error[]='Password must not exceed 20 characters.';
                }

                //for checking if the user is already registered or not
                $sql="select * from users where (username='$username' or email='$email');";
                $res=mysqli_query($dbc,$sql);
                if(mysqli_fetch_rows($res)>0)
                {
                    $row = mysqli_fetch_assoc($res);
                    if($username==$row['username'])
                    {
                        $error[]='Username already exists.';
                    }
                    if($email==$row['email'])
                    {
                        $error[]='Email already exists';
                    }
                }
                if(!isset($error))
                {
                    $date=date('Y-m-d');
                    $options =array("cost"=>4);
                    $password = password_hash($password,PASSWORD_BCRYPT,$options);

                    //insert
                    $result= mysqli_query($dbc,"INSERT into users
                    values('','$fname','$lname','$username','$email','$password','$date')");

                    if($result)
                    {
                        $done=2;
                    }
                    else
                    {
                        $error[]='Failed. Something went wrong';
                    }
                }
            }
        ?>


            <div class="col-sm-4">
                <!--showing errors-->
                <?php
                    if(isset($error))
                    {
                        foreach($error as $error)
                        {
                            echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
                        }
                    }
                ?>
            </div>
            <div class="col-sm-4">
                <div class="signup_form">
                    <br>
                    <center><img src="assets/home-logo.png" alt="Kosai Limited Logo" style="width:70;height:70px;" class="logo img-fluid mb-2">
                    <h1 class="mb-3">Kosai Limited</h1></center>
            
                
                    <form action="" method="POST">
                        <!--form group for first name-->
                        <div class="form-group">
                            <label class="label_txt">First Name</label>
                            <input type="text" class="form-control" name="fname" 
                            value ="<?php
                                if(isset($error)) {echo $fname;}
                            ?>"
                            required="">
                        </div>
                        <!--form group for last name-->
                        <div class="form-group">
                            <label class="label_txt">Last Name</label>
                            <input type="text" class="form-control" name="lname"
                            value ="<?php
                                if(isset($error)) {echo $lname;}
                            ?>"
                            required="">
                        </div>
                        <!--From group for username-->
                        <div class="form-group">
                            <label class="label_txt">Username</label>
                            <input type="text" class="form-control" name="username" 
                            value ="<?php
                                if(isset($error)) {echo $username;}
                            ?>"
                            required="">
                        </div>
                        <!--From group for email-->
                        <div class="form-group">
                            <label class="label_txt">Email</label>
                            <input type="email" class="form-control" name="email" 
                            value ="<?php
                                if(isset($error)) {echo $email;}
                            ?>"
                            required="">
                        </div>
                        <!--form group for password-->
                        <div class="form-group">
                            <label class="label_txt">Password</label>
                            <input type="password" class="form-control" name="password" required="">
                        </div>
                        <!--form group for confirm password-->
                        <div class="form-group">
                            <label class="label_txt">Confirm Password</label>
                            <input type="password" class="form-control" name="passwordConfirm" required="">
                        </div>
                        <br>
                        <button type="submit" class="form-btn btn btn-primary" name="signup">Signup</button>
                        <br>
                        <p>Have an account? <a href="login.php">Sign in</a></p>
                    </form>
                </div>
            </div>

            <div class="col-sm-4">
                <!--useless-->
            </div>
        </div>

   </div>





    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>