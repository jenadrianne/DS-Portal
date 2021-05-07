<?php
	include("controllers/admin_cSqlConnect.php");

    $id = $_GET["cid"];

    $result1 = mysqli_query($mysqli, "DELETE FROM activity WHERE activity_id=".$id);

    $result2 = mysqli_query($mysqli, "DELETE FROM ces WHERE activity_id=".$id);

    if($result1 && $result2){
        header("Location: admin_vCESActivities.php");
    }else{
        echo "Error Deleting Data!";
        echo mysqli_error_no();
    }
?>