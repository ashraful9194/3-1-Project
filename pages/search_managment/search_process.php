<?php 
if (isset($_POST['submit_search'])) {
    extract($_POST);
    $search = $_POST['search_string'];
    // echo $search;
    $query = "SELECT allpost.post_id,allpost.post_title,post_category_relationship.post_category FROM allpost natural join post_category_relationship 
     where(post_title like '%$search%' or post_category like '%$search%');";
    $res = mysqli_query($dbc, $query);
    

}

?>