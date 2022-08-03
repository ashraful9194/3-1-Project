<?php
try {
    require_once "../config.php";
    if (isset($_POST["user_remove"])) {
        extract($_POST);

        $user_removal_id = $_POST['user_remove'];
        $query = "SELECT * FROM kosai_limited.users WHERE (id= $user_removal_id );";
        $res = mysqli_query($dbc, $query);
        $numRows = mysqli_num_rows($res);
        if ($numRows == 1) {
            //userfound
            $resultRemove = mysqli_query($dbc, "DELETE FROM users WHERE (id=$user_removal_id);");
            if ($resultRemove) {
                $_SESSION["update_status"] = "success";
                header("location: ./all_users.php");
                exit();
            } else {
                $_SESSION["update_status"] = "failed";
                header("location: ./all_users.php");
                exit();
            }
        } else {
            //indicates user not found
            $_SESSION["update_status"] = "failed";
            header("location:./all_users.php ");
            exit();
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
mysqli_close($dbc);
?>