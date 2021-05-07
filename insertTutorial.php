<?php
	include("controllers/admin_cSqlConnect.php");

    $ret = 1;
    
    $actImage = $_POST['actImage'];
    $actName = $_POST['actName'];
    $actVenue = $_POST['actVenue'];
    $actDate = $_POST['actDate'];
    $actStart = $_POST['actStart'];
    $actEnd = $_POST['actEnd'];
    $actRoom = $_POST['actRoom'];
    $actSubject = $_POST['actSubject'];

    $check = mysqli_query($mysqli, "SELECT * FROM tutorial t JOIN activity a ON a.activity_id=t.activity_id JOIN room r ON r.room_id=t.room_id JOIN subject s ON s.subject_id=t.subject_id");

    if($check){
        while($ret == 1 && $checks = mysqli_fetch_array($check)){
            if($actDate == $checks[7] && $actRoom == $checks[12]){
                if(strtotime($actStart) >= strtotime($checks[8]) && strtotime($actStart) < strtotime($checks[9]) || strtotime($actEnd) > strtotime($checks[8]) && strtotime($actEnd) <= strtotime($checks[9])){
                    $ret = 0;
                }
            }

        }                                                 
    }
    
    if($ret == 1){
        $result1 = mysqli_query($mysqli, "INSERT INTO `activity`(`activity_id`, `activity_name`, `activity_venue`, `activity_date`, `activity_start`, `activity_end`, `activity_type`, `activity_image`) VALUES (NULL,'".$actName."','Inside Campus','".$actDate."','".$actStart."','".$actEnd."','Tutorials Activity','".$actImage."')");

        $act = mysqli_query($mysqli, "SELECT * FROM `activity` ORDER BY `activity_id` DESC LIMIT 1");

        if($act){
            while($actId = mysqli_fetch_array($act)){
                $result2 = mysqli_query($mysqli, "INSERT INTO `tutorial`(`tutorial_id`, `room_id`, `subject_id`, `activity_id`) VALUES (NULL,'".$actRoom."','".$actSubject."','".$actId[0]."')");

            }                                                 
        }

        if($result1){
            if($result2){
                header("Location: admin_vTutorials.php");
                echo "<h1>INSERTED!!!!</h1>";
            }else{
                echo "Error Inserting Data!";
                echo mysqli_error_no();
            }
        }else{
            echo "Error Inserting Data!";
            echo mysqli_error_no();
        }
    }else{
        header("Location: admin_vTutorials.php");
        echo "<h1>CONFLICT IN SCHEDULE!!!!</h1>";
    }
?>