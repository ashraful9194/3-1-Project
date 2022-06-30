<?php
try {
    require_once "../config.php";

    $userID = $_SESSION["id"];
    $query = "select * from users where id=$userID;";
    $res = mysqli_query($dbc, $query);
    $numRows = mysqli_num_rows($res);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION["theme"] = $row['theme'];

        if ($_SESSION["theme"] == "Dark") { ?>

            <script>
                const themeToggler = document.querySelector(".theme-toggler");
                document.body.classList.toggle('dark-theme-variables');
                themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
                themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
            </script>
<?php
        }
        //no else

    } else {
        header("Location:../../index.php");
        exit();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}


?>