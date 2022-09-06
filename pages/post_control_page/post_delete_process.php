<?php
try {
    require_once "../config.php";
    if (isset($_POST["delete_post"])) {
        extract($_POST);

        $post_removal_id = $_POST['delete_post'];
        $query = "SELECT * FROM kosai_limited.allpost WHERE (post_id= $post_removal_id );"; // if post exits
        $res = mysqli_query($dbc, $query);
        $numRows = mysqli_num_rows($res);
        if ($numRows == 1) {
            //post found
            $resultRemove = mysqli_query($dbc, "DELETE FROM allpost WHERE (post_id=$post_removal_id);");
            if ($resultRemove) {
                $_SESSION["update_status"] = "success";
                header("location: ../all_posts.php");
                exit();
            } else {
                $_SESSION["update_status"] = "failed";
                header("location: ../all_posts.php");
                exit();
            }
        } else {
            //indicates post not found
            $_SESSION["update_status"] = "failed";
            header("location:../all_posts.php ");
            exit();
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>