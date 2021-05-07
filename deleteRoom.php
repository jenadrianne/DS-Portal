<?php
	include("controllers/admin_cSqlConnect.php");

    $id = $_GET["roomId"];

    $result = mysqli_query($mysqli, "UPDATE `room` SET `room_status`=0 WHERE `room_id`=".$id);

    if($result){
        header("Location: admin_vRooms.php");
        echo "<h1>INSERTED!!!!</h1>";
    }else{
        echo "Error Deleting Data!";
        echo mysqli_error_no();
    }
?>