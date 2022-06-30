<?php
try {
    require_once "../config.php";
    if (isset($_POST["submit_post"])) {
        extract($_POST);
        $result = mysqli_query($dbc, "INSERT into users
            values(null, '$fname','$lname','$username','$email','$password','$date','$role')");

        if ($result) {
            $done = 2;
        } else {
            $errors->sql[] = 'Failed. Something went wrong';
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
