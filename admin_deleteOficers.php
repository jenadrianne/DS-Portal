<?php
	include("controllers/admin_cSqlConnect.php");

    $id = $_GET["cid"];

    $result1 = mysqli_query($mysqli, "DELETE FROM `person` WHERE `person_id`=".$id);

    $result2 = mysqli_query($mysqli, "SELECT `person_schoolId` FROM `person` WHERE `person_id` =".$id);

    while($row = mysqli_fetch_array($result2)){
        $sy_id = $row[0];
    } 
    
    $result2 = mysqli_query($mysqli, "DELETE FROM `officer` WHERE `person_id`='".$sy_id."'");

    if($result1 && $result2){
        header("Location: admin_vDsOfficers.php");
    }else{
        echo "Error Deleting Data!";
    }
?>