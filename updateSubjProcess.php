<?php
  include("controllers/admin_cSqlConnect.php");
    session_start();

        $subid = $_POST['bookId'];
        $subjCode = $_POST['subjCode'];
        $subjDesc = $_POST['subjDesc'];

        
        $result = mysqli_query($mysqli, 
            "UPDATE `subject` SET `subject_code`='".$subjCode."',`subject_description`='".$subjDesc."' WHERE subject_id=".$subid);

        if($result){
            header("Location: admin_vSubjects.php");
        }else{
            echo "Error Inserting Data!";
        }
?>