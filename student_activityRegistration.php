<?php 
   include("controllers/admin_cSqlConnect.php");
?>
 <?php 
 	$sid = $_POST['sid']; 
 	$aid = $_POST['aid'];

 	
	$result = mysqli_query($mysqli, "INSERT INTO `registration`(`registration_id`, `person_id`, `activity_id`) VALUES (NULL, ".$sid.",".$aid.")");

    if($result){
        header("Location: student_vDSDashboard.php");
        echo "<h1>INSERTED!!!!</h1>";
    }else{
        echo "Error Inserting Data!";
        echo mysqli_error_no();
    }
 	
 ?>