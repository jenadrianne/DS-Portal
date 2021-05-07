<?php
  
  include("controllers/admin_cSqlConnect.php");

    
    /*session_start();
    if (!isset($_SESSION['loginuser'])){
        header("Location: index.php");
    }*/

    
        $subjCode = $_POST['subjCode'];
        $subjDesc = $_POST['subjDesc'];
        
        $result = mysqli_query($mysqli, "INSERT INTO subject(subject_code, subject_description) VALUES ('".$subjCode."','".$subjDesc."')");

        if($result){
            header("Location: admin_vSubjects.php");
            echo "<h1>INSERTED!!!!</h1>";
        }else{
            echo "Error Inserting Data!";
            echo mysqli_error_no();
        }
?>