<?php


try {
    
    require_once "../config.php";
    //echo ("<script> console.log ('username: " . $_SESSION["username"] . "')</script>");
    if (isset($_SESSION["username"])) {
        if (isset($_POST['fname']) && isset($_POST['lname'])) 
        {
            function validation($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $fname = validation($_POST['fname']);
            $lname = validation($_POST['lname']);
            

            require_once '../errors/Error_edit_profile_lname_fname.php';
            $errors = new EditProfilePasswordChange();


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
           

            $session_id = $_SESSION['id'];

            $query = "select * from users where (id='$session_id')";
            $res = mysqli_query($dbc, $query);
            $numRows = mysqli_num_rows($res);

            //$_SESSION["old_password_db"]=$row['password'];
            if (!$errors->haserror()) 
            {

                
                echo "ready to upload";
                      
            } 
        }
    }
        
          
    } catch (Exception $e) {
    echo $e->getMessage();
    }
