<?php


try {
    session_start();
    

    
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
            
            
            require_once '../errors/Error_edit_profile_fname_lname.php';
            $errors_fname_lname = new EditProfileFnameLname();


            if (strlen($fname) < 3) //min fname
            {

                $errors_fname_lname->fname[] = 'Please enter first name using 3 characters at least';
            }
            if (strlen($fname) > 20) //max fname
            {

                $errors_fname_lname->fname[] = 'First name must not exceed 20 characters';
            }
            if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)) {
                $errors_fname_lname->fname[] = 'Invalid entry First Name. Please enter letters 
                    without any digit or special symbol like (1,2,3#,$,%,%,^,&,*,!,~,-)';
            }

            //for last name validation
            if (strlen($lname) < 3) //min lname
            {
                $errors_fname_lname->lname[] = 'Please enter Last name using 3 characters at least';
            }
            if (strlen($lname) > 20) //max lname
            {
                $errors_fname_lname->lname[] = 'Last name must not exceed 20 characters';
            }
            if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)) {
                $errors_fname_lname->lname[] = 'Invalid entry Last Name. Please enter letters 
            without any digit or special symbol like (1,2,3#,$,%,%,^,&,*,!,~,-)';
            }
           
            
            $session_id = $_SESSION['id'];

            $query = "select * from users where (id='$session_id')";
            
            $res = mysqli_query($dbc, $query);
            $row = mysqli_fetch_assoc($res);
            $_SESSION["f_name"]=$row['fname'];
            $_SESSION["l_name"]=$row['lname'];
            $numRows = mysqli_num_rows($res);

            //$_SESSION["old_password_db"]=$row['password'];
            if (!$errors_fname_lname->haserror()) 
            {

                $options = array("cost" => 4);
                $result = mysqli_query($dbc,"UPDATE users SET fname='$fname' , lname ='$lname' WHERE id='$session_id';");

                if($result)
                {  
                    $updateStatus="success";
                    header("Refresh:0; url=../edit_profile.php");
                }
                else
                {
                    $updateStatus="failed";
                    header("Refresh:0; url=../edit_profile.php");
                }
                //echo "ready to upload";
                      
            } 
            else
            {
                $updateStatus="failed";
                $_SESSION['errors_names'] = json_encode($errors_fname_lname);
                header("Refresh:0; url=../edit_profile.php");
                
            }
        }
    }
        
          
    } catch (Exception $e) {
    echo $e->getMessage();
    }
