<?php

    require_once "../config.php";
   
    if(isset($_POST))
    {
        extract($_POST);
        if(isset($submit_button))
        {
            // variable sender_fullname, sender_email, sender_message
            // 0 means the message is not seen yet , 1 means seen
        $insertion = mysqli_query($dbc,"INSERT INTO `contact_messages`(`message_ID`, `fullname`, `email`, `message_body`, `message_seen_status`)
        VALUES (null,'$sender_fullname','$sender_email','$sender_message','0')");

        if($insertion)
        {
            $_SESSION['update_status']="success";
             header("location:./contact_us.php");
             exit();
        }
        else{
            $_SESSION['update_status']="failed";
            header("location:./contact_us.php");
            exit();
        }
        }
        else{
            $_SESSION['update_status']="failed";
            header("location:./contact_us.php");
            exit();
        }
    }
    else
    {
        $_SESSION['update_status']="failed";
        header("location:./contact_us.php");
             exit();
    }
?>