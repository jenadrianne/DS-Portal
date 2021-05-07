<?php
  
  include("controllers/admin_cSqlConnect.php");
        
        $subid= $_POST['sid'];
        $studid= $_POST['scode'];

        
        $result = mysqli_query($mysqli, "INSERT INTO `request_tutorial`(`request_id`, `subject_id`, `person_id`) VALUES (NULL,".$studid.",'".$subid."')");

    if($result){
        header("Location: student_vDSDashboard.php");
    }else{
        echo "Error Deleting Data!";
    }
?>