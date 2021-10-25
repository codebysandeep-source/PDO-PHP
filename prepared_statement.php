<?php 

// include "./config.php";

/*
Sytax:

$sql = "INSERT INTO student (name,class,subject,roll_no) VALUES(?,?,?,?)";      <- this is a positional parameter or
$sql = "INSERT INTO student (name,class,subject,roll_no) VALUES(:name, :class, :sub, :roll)";    <- this is a named parameter          
// Note : mysqli have only positional parameter and PDO it have both postional and named parameter.

$result = $conn->prepare($sql);

// bindParam() - It binds a parameter to the specified variable name. It returns TRUE on Success or FALSE on Failure.
// Syntax : 
bindParam(parameter_marker, $variable, data_type, length);
e.g.,
//========= bindParam uisng named parameter ===========//
$result->bindParam(':name',$name,PDO::param_STR,10);    where :name is a parameter_marker, $name is a variable, PDO::param_STR is a data_type of string, 10 is a length...  And also data_type and length is optional...
or
$result->bindparam(':name',$name);
$result->bindparam(':class',$class);
$result->bindparam(':sub',$sub);
$result->bindparam(':roll',$roll);
//========= // bindParam uisng named parameter ===========//


//========= bindParam uisng positional parameter ===========//
// Note: Positional Parameter start from 1...
$result->bindParam(1,$name,PDO::param_STR,10);    where 1 is a parameter_marker, $name is a variable, PDO::param_STR is a data_type of string, 10 is a length...  And also data_type and length is optional...
or
$result->bindparam(1,$name);
$result->bindparam(2,$class);
$result->bindparam(3,$sub);
$result->bindparam(4,$roll);
//========= // bindParam uisng positional parameter ===========//

// bindValue - It is similar as bindParam, where bindParam takes $variable whereas bindValue takes both $variable and <value class=""></value> 
Syntax : 
bindValue(parameter_maker, $variable/value, data_type, length);
e.g.,
$result->bindValue(':name',$name);
$result->bindValue(':class',"BCA");
$result->bindValue(':sub',$sub);
$result->bindValue(':roll',11);

// execute() - It execute  a prepared statement. It returns TRUE on Success or FALSE on Failure.
syntax:
execute();   
or  
execute([array $input_parameter]);

e.g.,
$result->execute();  
or  
$result->execute(array($name,$class,$sub,$roll));



// ============== PREPARED STATEMENT STEP BY STEP for Insert ===============//
1.  $sql
2.  prepare($sql);
3.  bindParam() or bindValue()
4.  execute()
// ============== //PREPARED STATEMENT STEP BY STEP for Insert ===============//


*/

?>

<?php 

include "./config.php";

// ============ (1)Select (Fetch) Data from database using Prepared Statement =============//
try{
    echo"(1)Select (Fetch) Data from database using Prepared Statement";

    $sql = "SELECT * FROM student";
    $result = $conn->prepare($sql);
    $result->execute();

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row){
        $id = $row['id'];
        $name = $row['name'];
        $class = $row['class'];
        $sub = $row['subject'];
        $roll = $row['roll_no'];
        echo "
        <div style='border:1px solid #000;margin:10px;'>
        ID : $id <br/>
        Name : $name <br/>
        Class : $class <br/>
        Subject : $sub <br/>
        Roll No : $roll <br/>
        </div>
        ";
    }

}
catch(PDOException $e){
    echo $e->getMessage();
}
// Close Prepared Statement
unset($result);
// ============ // (1)Select (Fetch) Data from database using Prepared Statement =============//



// ============ (2)Select (Fetch) Data from database using Prepared Statement =============//
try{
    echo"(2)Select (Fetch) Data from database using Prepared Statement";

    $sql = "SELECT * FROM student";
    $result = $conn->prepare($sql);

    // $result->bindColumn('id',$id);
    // $result->bindColumn('name',$name);
    // $result->bindColumn('class',$class);
    // $result->bindColumn('subject',$sub);
    // $result->bindColumn('roll_no',$roll);
    // or
    $result->bindColumn(1,$id);
    $result->bindColumn(2,$name);
    $result->bindColumn(3,$class);
    $result->bindColumn(4,$sub);
    $result->bindColumn(5,$roll);

    $result->execute();

    while($result->fetch(PDO::FETCH_BOUND)){      //for bind we use fetch_bound or you can also use fetch_assoc   Note: while using bindColumn you can not use foreach loop ...
        echo "
        <div style='border:1px solid #000;margin:10px;'>
        ID : $id <br/>
        Name : $name <br/>
        Class : $class <br/>
        Subject : $sub <br/>
        Roll No : $roll <br/>
        </div>
        "
        ;
    }

}
catch(PDOException $e){
    echo $e->getMessage();
}
// Close Prepared Statement
unset($result);
// ============ // (2)Select (Fetch) Data from database using Prepared Statement =============//

// ============ (3)Select (Fetch) Data from database with where clause using Prepared Statement (positional parameter) =============//
try{
    echo"(3)Select (Fetch) Data from database with where clause using Prepared Statement (positional parameter)"; 

    $sql = "SELECT * FROM student WHERE subject = ?";
    $result = $conn->prepare($sql);

    $result->bindParam(1,$sub);
    $sub = "PHP";

    $result->execute();

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row){
        $id = $row['id'];
        $name = $row['name'];
        $class = $row['class'];
        $sub = $row['subject'];
        $roll = $row['roll_no'];
        echo "
        <div style='border:1px solid #000;margin:10px;'>
        ID : $id <br/>
        Name : $name <br/>
        Class : $class <br/>
        Subject : $sub <br/>
        Roll No : $roll <br/>
        </div>
        ";
    }

}
catch(PDOException $e){
    echo $e->getMessage();
}
// Close Prepared Statement
unset($result);
// ============ // (3)Select (Fetch) Data from database with where clause using Prepared Statement (positional parameter) =============//

// ============ (4)Select (Fetch) Data from database with where clause using Prepared Statement (named parameter) =============//
try{
    echo"(4)Select (Fetch) Data from database with where clause using Prepared Statement (named parameter)"; 

    $sql = "SELECT * FROM student WHERE subject = :sub";
    $result = $conn->prepare($sql);

    $result->bindParam(':sub',$subj);
    $subj = "PHP";

    $result->execute();

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row){
        $id = $row['id'];
        $name = $row['name'];
        $class = $row['class'];
        $sub = $row['subject'];
        $roll = $row['roll_no'];
        echo "
        <div style='border:1px solid #000;margin:10px;'>
        ID : $id <br/>
        Name : $name <br/>
        Class : $class <br/>
        Subject : $sub <br/>
        Roll No : $roll <br/>
        </div>
        ";
    }

}
catch(PDOException $e){
    echo $e->getMessage();
}
// Close Prepared Statement
unset($result);
// ============ // (4)Select (Fetch) Data from database with where clause using Prepared Statement (named parameter) =============//

?>