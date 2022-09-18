<?php
try {
    require_once "../config.php";
    if (isset($_POST["submit_post"])) {

        if (extract($_POST)) {

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
                // post_paragraph_1
                // post_code_1
                // post_paragraph_2
                // post_code_2
                // post_paragraph_3
                // post_code_3
                // post_status ]

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
                $now = new DateTime();
                $date_time =  $now->format('Y-m-d H:i:s');
                $post_key1 = uniqid();

                $post_key = md5($post_key1 . $post_code1 . $post_code2 . $post_code3 .
                    $post_paragraph1 . $post_paragraph2 . $post_paragraph3 .
                    $publisher_username . $post_title);
                // die('0');

                $result = mysqli_query(
                    $dbc,
                    "INSERT into allpost
                 values(
                            null,'$date_time','$post_key','$publisher_username','$publisher_id',
                            '$post_title',
                            '$post_paragraph1','$post_code1',
                            '$post_paragraph2','$post_code2',
                            '$post_paragraph3','$post_code3','pending');"
                );
                // die('1');

                if ($result) {
                    // echo "i am ok";
                    $sql2 = "select post_id from kosai_limited.allpost where post_key='$post_key';";
                    // die('2');

                    $res2 = mysqli_query($dbc, $sql2);
                    if ($id = mysqli_fetch_assoc($res2)) {
                        $idd = $id['post_id'];


                        foreach ($categoryy as $cat) {
                            // echo $cat . "<br>";

                            // $result2 = ;
                            // die('3');
                            if (mysqli_query($dbc, "INSERT INTO kosai_limited.post_category_relationship (post_id, post_category) VALUES ($idd,'$cat')")) {
                                $_SESSION["update_status"] = "success";
                                // echo "i am ok2";


                            } else {
                                // die(mysqli_error($dbc));
                                $_SESSION["update_status"] = "failed";

                                // echo "Error: " . $dbc . "<br>" . $dbc->error;
                            }
                        }

                        // die('555');
                        if ($_SESSION["update_status"] == "success") {
                            header("location: ./create_post.php");
                            exit();
                        } else {
                            header("location: ../../index.php");
                            exit();
                        }
                    }
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
        } else {
            $_SESSION["update_status"] = "failed";
            header("location: ./create_post.php");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
