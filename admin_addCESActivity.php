<?php 
    include("controllers/admin_cSqlConnect.php");
    include ('xcl_lib/Classes/PHPExcel/IOFactory.php');

    $actname = $_POST['actname']; 
    $date = $_POST['date'];
    $venue = $_POST['venue']; 
    $time_start = $_POST['time_start']; 
    $time_end = $_POST['time_end']; 
    $des = $_POST['des']; 

   
   if (!empty($_FILES["myFile"])) {
        $myFile = $_FILES["myFile"];

        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo "<p>An error occurred.</p>";
            exit;
        }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists("uploaded_image/" . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"], "uploaded_image/" . $name);
   
    


    $result = mysqli_query($mysqli,
    "INSERT INTO `activity`(`activity_id`, `activity_name`, `activity_venue`, `activity_date`, `activity_start`, `activity_end`, `activity_type`, `activity_image`) VALUES (NULL, '".$actname."', ".$venue.", '".$date."', '".$time_start."', '".$time_end."', 'CES Activity', '".$name."')");

    $result = mysqli_query($mysqli,
    "SELECT `activity_id` FROM `activity` ORDER BY activity_id  DESC LIMIT 1");
     
    if($result){
        while($row = mysqli_fetch_array($result)){
                        $act_id = $row[0];
        } 
    }


    $result = mysqli_query($mysqli,
    "INSERT INTO `ces`(`ces_id`, `activity_id`, `ces_description`) VALUES (NULL,".$act_id.",'".$des."')");

        // set proper permissions on the new file
        chmod("uploaded_image/" . $name, 0644);
         header("Location: admin_vCESActivities.php");
    }

   


   
?>