<?php
	include("controllers/admin_cSqlConnect.php");
    
    $roomCode = $_POST['roomCode'];
    $roomDesc = $_POST['roomDesc'];
    $roomType = $_POST['roomType'];

        
    $result = mysqli_query($mysqli, "INSERT INTO `room`(`room_id`, `room_code`, `room_description`, `room_type`, `room_status`) VALUES (NULL,'".$roomCode."','".$roomDesc."',".$roomType.",1)");

    if($result){
        header("Location: admin_vRooms.php");
        echo "<h1>INSERTED!!!!</h1>";
    }else{
        echo "Error Inserting Data!";
        echo mysqli_error_no();
    }
?>