<?php
require_once "../config.php";
die(1);
if(isset($_POST['send']))
{
    extract($_POST);
    // echo $_POST['send'];
    $reviewId = $_POST['send'];
    
    $emailFetch = mysqli_query($dbc,"SELECT  email FROM contact_messages WHERE message_ID=$reviewId");
    


    //email variables
    $to = mysqli_fetch_assoc($emailFetch);
    $subject = "Reply to your message from Kosai Limited";
    $message = $_POST['reply-message'];
    $from = "md3rahat2cse93@gmail.com";
    $headers ="From: $from ";

    die(2);
    if(mail($to,$subject,$message,$headers)){
        die(3);
        
        echo "<script>alert('email sent')</script>";
        header("location: ./contact_message_handling.php");
        exit(); 
    }
    else{
        die(4);
        echo "<script>alert('something wrong.')</script>";
        header("location: ./contact_message_handling.php");
        exit(); 
    }


}
elseif(isset($_POST['ignore'])){
    extract($_POST);
    $reviewId = $_POST['ignore'];
    $ignoreMessage=mysqli_query($dbc,"DELETE FROM contact_messages WHERE message_ID = $reviewId");

    die(5);

    if($ignoreMessage){

        die(6);
        $_SESSION['update_status']="success";
    header("location: ./contact_message_handling.php");
    exit(); 
    }
    else{
        die(7);
        $_SESSION['update_status']="failed";
        header("location: ./contact_message_handling.php");
        exit();
    }
}
else{
    die(8);
    $_SESSION['update_status']="failed";
    header("location: ./contact_message_handling.php");
    exit();
}

?>