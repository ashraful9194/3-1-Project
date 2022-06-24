<?php


try {
    //session_start();
    require_once "../config.php";
    //echo ("<script> console.log ('username: " . $_SESSION["username"] . "')</script>");
    if (isset($_SESSION["username"])) {

        $session_id = $_SESSION['id'];
        function validation($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $role = validation($_POST['role']);
            
           if($role=="Learner" || $role=="Contributor"){
                $result = mysqli_query($dbc,"UPDATE users SET role='$role' WHERE id='$session_id';");
                //checking database error
                if($result)
                {  
                    $_SESSION['updatedone']="Update successfull";
                    header("Refresh:0; url=../edit_profile.php");
                }
                else
                {
                    $_SESSION['updatedone']="Update failed. Please try again.";
                    header("Refresh:0; url=../edit_profile.php");
                }
           }
           // checking user end error
           else
           {
            $_SESSION['updatedone']="Update failed. Please try again.";
            header("Refresh:0; url=../edit_profile.php");
           }

               
    }

    else
    {
        header("Refresh:0; url=../edit_profile.php");
    }
        
          
    } catch (Exception $e) {
    echo $e->getMessage();
    }
