<?php
  include("controllers/admin_cSqlConnect.php");
    
    /*session_start();
    if (!isset($_SESSION['loginuser'])){
        header("Location: index.php");
    }*/

        $roomID = $_GET['subjCode'];

        $result = mysqli_query($mysqli, "DELETE FROM `room` WHERE room_id = ".$roomID);
        
        if($result){
            header("Location: admin_vRooms.php");
            echo "<h1>DELETED!!!!</h1>";
        }else{
            echo "Error Inserting Data!";
        }
?>