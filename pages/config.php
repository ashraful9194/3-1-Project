<?php
session_start();


$dbHost='thwserver.mysql.database.azure.com';
$dbName='kosai_limited';
$dbUsername='mdrahat';
$dbPassword='Cssb140020z';
$certificatePath='C:\xampp\htdocs\kosai_limited\includes\DigiCertGlobalRootCA.crt';
 

try {
$dbc = mysqli_init(); 
mysqli_ssl_set($dbc,NULL,NULL, $certificatePath, NULL, NULL);
mysqli_real_connect($dbc, $dbHost, $dbUsername,$dbPassword , $dbName, 3306, MYSQLI_CLIENT_SSL);
} catch(Exception $e) {
    die('MySQL Connect Error: ' . $e->getTraceAsString());
    exit();
}

?>