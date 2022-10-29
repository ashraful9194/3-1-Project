<?php
session_start();
// $_SESSION['id']=null;

$dbHost='localhost';
$dbName='kosai_limited';
$dbUsername='root';
$dbPassword='';



try {
    $dbc=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName); 
} catch(Exception $e) {
    die('MySQL Connect Error: ' . $e->getTraceAsString());
    exit();
}

?>