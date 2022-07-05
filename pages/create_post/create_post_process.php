<?php
try {
    require_once "../config.php";
    if (isset($_POST["submit_post"])) {
        extract($_POST);

        //for checking if the user is exists or not
        $publisher_username = $_SESSION["username"];
        $publisher_email = $_SESSION["login_email"];
        $publisher_id = $_SESSION["id"];
        $sql = "select * from users where (username='$publisher_username' or email='$publisher_email');";
        $res = mysqli_query($dbc, $sql);
        if (mysqli_fetch_assoc($res) > 0) {
            // sql columns sequentially[
            // post_id 
            // post_date
            // post_publisher_username
            // post_publisher_id
            // post_title
            // post_category
            // post_paragraph_1
            // post_code_1
            // post_paragraph_2
            // post_code_2
            // post_paragraph_3
            // post_code_3 ]

            // form variables names[
            // post_title
            // post_category
            // post_paragraph1
            // post_code1
            // post_paragraph2
            // post_code2
            // post_paragraph3
            // post_code3  ]

            //initialized date
            $date = date('Y-m-d');
            $result = mysqli_query(
                $dbc,
                "INSERT into temporaryposts
                 values(
                            null,'$date','$publisher_username','$publisher_id',
                            '$post_title','$post_category',
                            '$post_paragraph1','$post_code1',
                            '$post_paragraph2','$post_code2',
                            '$post_paragraph3','$post_code3');");

            if ($result) {
                $_SESSION["update_status"] = "success";
                header("location: ./create_post.php");
                exit();
            } else {
                $_SESSION["update_status"] = "failed";
                header("location: ../../index.php");
                exit();
            }
        } else {
            $_SESSION["update_status"] = "failed";
            header("location:../login.php?loginerror=" . $login);
            exit();
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>