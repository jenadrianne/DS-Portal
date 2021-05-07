<?php 
    include("controllers/admin_cSqlConnect.php");
    include ('xcl_lib/Classes/PHPExcel/IOFactory.php');

    $aid = $_POST['bookId'];
    $actname = $_POST['actname']; 
    $date = $_POST['date'];
    $venue = $_POST['venue']; 
    $time_start = $_POST['time_start']; 
    $time_end = $_POST['time_end']; 
    $des = $_POST['des']; 

   
   

    $result = mysqli_query($mysqli,
    "UPDATE `activity` SET activity_name='".$actname."',activity_venue=".$venue.",activity_date='".$date."',activity_start='".$time_start."',activity_end='".$time_end."' WHERE activity_id=".$aid);


    $result = mysqli_query($mysqli,
    "UPDATE `ces` SET `ces_description`='".$des."' WHERE `activity_id`=".$aid);

        
         header("Location: admin_vCESActivities.php");   
?>