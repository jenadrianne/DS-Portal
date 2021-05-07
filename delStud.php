<?php
  include("controllers/admin_cSqlConnect.php");
    
    /*session_start();
    if (!isset($_SESSION['loginuser'])){
        header("Location: index.php");
    }*/
    	$id = $_GET['curID'];
            $result = mysqli_query($mysqli, "DELETE FROM `student` WHERE student_id = '".$id."' ");
        
        if($result){
            header("Location: admin_vDsStudent.php");
        }else{
            echo "Error Inserting Data!";
        }
?>