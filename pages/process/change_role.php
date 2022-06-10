<?php


try {
    session_start();
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
            
           
        $result = mysqli_query($dbc,"UPDATE users SET role='$role' WHERE id='$session_id';");

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
    }

    else
    {
        header("Refresh:0; url=../edit_profile.php");
    }
        
          
    } catch (Exception $e) {
    echo $e->getMessage();
    }
