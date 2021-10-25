<?php 

include "./config.php";

$name = "Mukesh";
$class = "BCA";
$subject = "c+";
$rollno = "8"; 

try{
$sql = "INSERT INTO student (name,class,subject,roll_no) VALUES('$name','$class','$subject',$rollno)";
$result = $conn->exec($sql);  // exec means execute
echo $result."Row Inserted";
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>  