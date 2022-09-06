<?php
try {
    require_once "../config.php";
    if (isset($_POST["approve_post"])) 
    {
        extract($_POST);

        //for checking if the user is exists or not

        $reviewID = $_POST['approve_post'];
        $query = "SELECT * FROM kosai_limited.allpost WHERE (post_id= $reviewID  AND post_status='pending');";
        $res = mysqli_query($dbc, $query);
        $numRows = mysqli_num_rows($res);
        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($res);
        }




        //inserting in to all post

        $change_status = mysqli_query(
            $dbc,
            "UPDATE allpost SET post_status='approved' where (allpost.post_id=$reviewID)"
        );
        

        if ($change_status) {
            $_SESSION["update_status"] = "success";
            header("location: ./adminpanel.php");
            exit();
        } else {
            $_SESSION["update_status"] = "failed";
            header("location: ../../index.php");
            exit();
        }
    } 

    elseif (isset($_POST["delete_post"])) {
        extract($_POST);
        $reviewID = $_POST['delete_post'];
        $resultDelete = mysqli_query($dbc, "DELETE FROM allpost WHERE (allpost.post_id=$reviewID);");
        if ($resultDelete) {
            $_SESSION["update_status"] = "success";
            header("location: ./adminpanel.php");
            exit();
        } else {
            $_SESSION["update_status"] = "failed";
            header("location: ../../index.php");
            exit();
        }
    }
    else {
        $_SESSION["update_status"] = "failed";
        header("location:../login.php?loginerror=" . $login);
        exit();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
 mysqli_close($dbc);?>