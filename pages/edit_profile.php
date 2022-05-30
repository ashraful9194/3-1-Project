<!DOCTYPE html>
<?php require_once("login_process.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome, <?php echo $_SESSION["f_name"]; ?></h1>


    <?php
    require_once 'Error.php';
    $errors = new FormError();
    try {
        if (isset($_POST['save_changes'])) {
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
            if (!$errors->haserror()) {
                
                $options = array("cost" => 4);
                //$password = password_hash($password, PASSWORD_DEFAULT, $options);
                $ids=$_SESSION["id"];
                //insert
                $result = mysqli_query($dbc, "UPDATE users SET fname='$fname' WHERE id='$ids'; ");
               
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

    <form action="" method="POST">
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
        <button type="submit" class="form-btn btn btn-primary" name="save_changes">Save Changes</button>
    </form>
</body>

</html>