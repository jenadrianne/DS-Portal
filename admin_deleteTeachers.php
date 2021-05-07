

<?php
	include("controllers/admin_cSqlConnect.php");

    $id = $_GET["cid"];

    $result1 = mysqli_query($mysqli, "DELETE FROM `person` WHERE `person_id`=".$id);

    if($result1){
        header("Location: admin_vDsTeachers.php");
    }else{
        echo "Error Deleting Data!";
        echo mysqli_error_no();
    }
?>