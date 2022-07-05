<?php
try {
    require_once "../config.php";
    

    if (isset($_POST["delete_post"])) {
        extract($_POST);
        $reviewID = $_POST['delete_post'];
        $resultDelete = mysqli_query($dbc, "DELETE FROM allpost WHERE (post_id=$reviewID);");
        if ($resultDelete) {
            $_SESSION["update_status"] = "success";
            header("location: ../all_posts/all_posts.php");
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
