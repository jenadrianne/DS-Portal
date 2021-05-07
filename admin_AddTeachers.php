<?php
	include("controllers/admin_cSqlConnect.php");

    $fn = $_POST["fname"];
    $ln = $_POST["lname"];
    $em = $_POST["email"];
    $ct = $_POST["cnt"];
    $sd = $_POST["sid"];


    $str = "INSERT INTO `person`(`person_id`, `person_firstName`, `person_lastName`, `person_email`, `person_phoneNo`, `person_schoolId`, `person_teacher`) VALUES (NULL,'".$fn."','".$ln."','".$em."','".$ct."','".$sd."', 1)" ; 

    $result1 = mysqli_query($mysqli, $str);

    if($result1 ){
        header("Location: admin_vDsTeachers.php");
    }else{
        echo "Error Deleting Data!";
    }
?>


