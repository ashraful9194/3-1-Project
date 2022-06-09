<?php


try {
    require_once "../config.php";
    //echo ("<script> console.log ('username: " . $_SESSION["username"] . "')</script>");
    // echo ("<script> console.log ('oldpass: " . $oldpassword . "')</script>");
    // echo ("<script> console.log ('newpass: " . $newpassword . "')</script>");
    // echo ("<script> console.log ('c_newpass: " . $c_newpassword . "')</script>");
    if (isset($_SESSION["username"])) {
        if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['c_newpassword'])) {

            function validation($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $oldpassword = validation($_POST['oldpassword']);
            $newpassword = validation($_POST['newpassword']);
            $c_newpassword = validation($_POST['c_newpassword']);


            require_once "../errors/Error_edit_profile_password_change.php";
            $errors = new EditProfilePasswordChange();


            if ($c_newpassword == '') {
                $errors->c_newpassword[] = 'Please confirm your password';
            }






            $_SESSION['errors'] = json_encode($errors);

            $session_id = $_SESSION['id'];

            $query = "select * from users where (id='$session_id')";
            $res = mysqli_query($dbc, $query);
            $numRows = mysqli_num_rows($res);

            //$_SESSION["old_password_db"]=$row['password'];
            if ($numRows == 1) {
                $row = mysqli_fetch_assoc($res);
                if (password_verify($oldpassword, $row['password'])) {
                    if (!(strlen($newpassword) < 5)) {

                        if (!(strlen($newpassword) > 20)) {
                            if ($newpassword == $c_newpassword) {

                                //echo "Ready to upload in database";
                                //hased the password
                                $options = array("cost" => 4);
                                $updatedpassword = password_hash($newpassword, PASSWORD_DEFAULT, $options);
                                // updating the password
                                $result = mysqli_query($dbc, "UPDATE users SET password='$updatedpassword' 
                                                                               WHERE id='$session_id'; ");
                                if($result)
                                {
                                    $_SESSION['updatedone']="success";
                                    header("Location: ../edit_profile.php");
                                    exit();
                                }
                                else
                                {
                                    $_SESSION['updatedone']="failed";
                                    header("Location: ../edit_profile.php");
                                    exit();
                                }




                            } else {
                                $errors->newpassword[] = 'Password do not match';
                                $_SESSION['errors'] = json_encode($errors);
                                header("Location: ../edit_profile.php");
                                exit();
                            }
                        } else {
                            $errors->newpassword[] = 'Password must not exceed 20 characters.';
                            $_SESSION['errors'] = json_encode($errors);
                            header("Location: ../edit_profile.php");
                            exit();
                        }
                    } else {
                        $errors->newpassword[] = 'Password must be at least 6  characters long';
                        $_SESSION['errors'] = json_encode($errors);
                        header("Location: ../edit_profile.php");
                        exit();
                    }
                } else {
                    $errors->oldpassword[] = 'Password do not match with your current password';
                    $_SESSION['errors'] = json_encode($errors);
                    header("Location: ../edit_profile.php");
                    exit();
                }
            }
        } else {
            header("Location: ../dashboard.php");
            exit();
        }
    } else {
        header("Location:../../index.php");
        exit();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
