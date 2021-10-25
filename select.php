<?php 

include "./config.php";

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

// $count = $result->rowCount();
// echo $count;

// $row = $result->fetch(PDO::FETCH_ASSOC);
// echo "<pre>", print_r($row) ,"</pre>";

// ============= Fetch Data Using While Loop ===============//
// if($result->rowCount() > 0){
// while($row = $result->fetch(PDO::FETCH_ASSOC)){
//     $id = $row['id'];
//     $name = $row['name'];
//     $class = $row['class'];
//     $rollno = $row['roll_no'];
//     echo "Name : ".$name."<br/>"; 
// }  
// }
// else{
//     echo "No Records Found!";
// }
// ============= // Fetch Data Using While Loop ===============//

// ============= Fetch Data Using Foreach Loop ===============//
if($result->rowCount() > 0){
    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row){
        $id = $row['id'];
        $name = $row['name'];
        $class = $row['class'];
        $rollno = $row['roll_no']; 
        echo "
        <p style='border:1px solid #000;'>
            Name : <span style='color:blue;'>$name</span> <br/>
            Class : <span style='color:blue;'>$class</span> <br/>
            Rollno : <span style='color:blue;'>$rollno</span> <br/>
        </p>
        ";
    }
}
else{
    echo "No Records Found!";
}
// ============= // Fetch Data Using Foreach Loop ===============//

?>