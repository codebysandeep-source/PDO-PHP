<?php 

// Database Connection with PHP Data Objects (PDO) is a lightweight system to access data from databases with PHP.
//dsn - data source name
// dbname - database name

$dsn = "mysql:host=localhost; dbname=PDO_db;";
$db_username = "root";
$db_password = "";

try{
    $conn = new PDO($dsn,$db_username,$db_password);
    // echo "Database Connected Successfully!";
}
catch(PDOException $e){
    // echo "Connection Failed : ".$e->getMessage();
}
?>