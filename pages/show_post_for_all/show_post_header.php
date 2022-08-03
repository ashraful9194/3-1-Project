<?php require_once "../config.php" ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- material CDN -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./show_post.css">
    <!-- date viewer -->
    <title>post title</title>
</head>

<body>
    <!-- fetching from database -->
    <?php
        if (isset($_POST['review_id'])) {
            extract($_POST);
            $userID=$_SESSION["id"];
            $reviewID = $_POST['review_id'];
            $query = "SELECT * FROM kosai_limited.allpost WHERE (post_id= $reviewID );";
            $res = mysqli_query($dbc, $query);
            $numRows = mysqli_num_rows($res);
            if ($numRows == 1) {
                $row = mysqli_fetch_assoc($res);
            }}
    ?>