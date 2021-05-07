<?php 
    include("controllers/admin_cSqlConnect.php");
    include ('xcl_lib/Classes/PHPExcel/IOFactory.php');

    $start = $_POST["start"];
    $end = $_POST["end"];
   
   

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
    while (file_exists("data/" . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"], "data/" . $name);


    $result = mysqli_query($mysqli,
    "INSERT INTO `semester`(`semester_id`, `sy_start`, `sy_end`,  `sy_filename`) VALUES (null,".$start.", ".$end.", '".$name."')");



    if($result){
        if (!$success) { 
            echo "<p>Unable to save file.</p>";
            exit;
        }else{
             $sy_result= mysqli_query($mysqli, "SELECT `semester_id` FROM `semester` WHERE sy_start ='".$start."' AND sy_end= '".$end."' LIMIT 1"); 

                    while($row = mysqli_fetch_array($sy_result)){
                        $sy_id = $row[0];
                    } 
            
            $obj = PHPExcel_IOFactory :: load ("data/".$name);
        
            foreach ( $obj->getWorksheetIterator() as $worksheet){
                        $highestRow = $worksheet->getHighestRow(); 
                          for ( $row=2 ; $row<=11; $row++){
                              $lname = mysqli_real_escape_string($mysqli, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                              $fname = mysqli_real_escape_string($mysqli, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                              $idnum = mysqli_real_escape_string($mysqli, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                             // $batch = mysqli_real_escape_string($mysqli, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                              $contact = mysqli_real_escape_string($mysqli, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                              $pos = mysqli_real_escape_string($mysqli, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                              $stat = mysqli_real_escape_string($mysqli, $worksheet->getCellByColumnAndRow(5, $row)->getValue());

                              $result = mysqli_query($mysqli,"INSERT INTO `officer`(`officer_id`, `person_id`, `position`, `semester_id`, `status`)  VALUES (NULL,'".$idnum."','".$pos."', ".$sy_id.", ".$stat.")"); 

                             $result = mysqli_query($mysqli, "UPDATE `person` SET `person_officer` = '1' WHERE `person`.`person_schoolId` ='".$idnum."'"); 
                          }
                     }

            header("Location: admin_vDsOfficers.php");
        }


        // set proper permissions on the new file
        chmod("data/" . $name, 0644);
         header("Location: admin_vDsOfficers.php");
    }

    }


   
?>