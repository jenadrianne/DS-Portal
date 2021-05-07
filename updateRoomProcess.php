<?php
  include("controllers/admin_cSqlConnect.php");
    session_start();

        $roomid = $_POST['bookId'];
        $roomCode = $_POST['roomCode'];
        $roomDesc = $_POST['roomDesc'];
        $roomType = $_POST['roomType'];
        
        $result = mysqli_query($mysqli, 
            "UPDATE `room` SET `room_code`='".$roomCode."',`room_description`='".$roomDesc."', `room_type`='".$roomType."' WHERE room_id=".$roomid);

        if($result){
            header("Location: admin_vRooms.php");
        }else{
            echo "Error Inserting Data!";
        }
?>