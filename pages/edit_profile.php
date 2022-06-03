<!DOCTYPE html>
<?php require_once("login_process.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php
    require_once 'Error.php';
    $errors = new FormError();
    try {
        if (isset($_POST['save_changes1'])) 
        {
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
            if (!$errors->haserror()) {

                $options = array("cost" => 4);
                //$password = password_hash($password, PASSWORD_DEFAULT, $options);
                $ids = $_SESSION["id"];


                //insert
                $result = mysqli_query($dbc, "UPDATE users SET fname='$fname', lname='$lname' WHERE id='$ids'; ");

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


    <div class="container">
        <div class="row">
            <div class="row align-item-start">
                <div class="col-sm-4 mt-5 ms-5 mb-5">
                    <img src="../assets_home/card sample.jpg" alt="">
                </div>
                <div class="col-sm-4 editProfile ">
                    <h1 class="pt-5">Edit Profile</h1>
                    <hr>
                    <h3 class="mt-4 mb-4">Basic Information</h3>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="label_txt">First Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php
                                                                                        if ($errors->haserror()) {
                                                                                            echo $fname;
                                                                                        } else {
                                                                                            if (isset($_POST['save_changes1']))
                                                                                                echo $fname;
                                                                                            else
                                                                                                echo $_SESSION["f_name"];
                                                                                        }
                                                                                        ?>" required="">
                            <?php
                            foreach ($errors->fname as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>

                        <div class="form-group mt-3">
                            <label class="label_txt">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="<?php
                                                                                        if ($errors->haserror()) {
                                                                                            echo $lname;
                                                                                        } else {
                                                                                            if (isset($_POST['save_changes1']))
                                                                                                echo $lname;
                                                                                            else
                                                                                                echo $_SESSION["l_name"];
                                                                                        }
                                                                                        ?>" required="">
                            <?php
                            foreach ($errors->lname as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes1">Save</button>
                        



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
                        






                        <h3 class="mt-5 mb-4">
                            Change Password
                        </h3>
                        <!--form group for password-->
                        <div class="form-group">
                            <label class="label_txt">Type old password</label>
                            <input type="password" class="form-control" name="oldpassword" >
                            <?php
                            foreach ($errors->passwords as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>

                        <!--form group for confirm password-->
                        <div class="form-group">
                            <label class="label_txt">Type new password</label>
                            <input type="password" class="form-control" name="newpassword" >
                            <?php
                            foreach ($errors->passwords as $error) {
                                echo '<p class="text-danger">' . $error . '</p>';
                            }
                            ?>
                        </div>


                        <button type="submit" class="form-btn2 btn btn-primary mt-3" name="save_changes3">Save</button>
                    </form>

                </div>
                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>















   



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" i ntegrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>