<?php
  include("controllers/admin_cSqlConnect.php");
    
    /*session_start();
    if (!isset($_SESSION['loginuser'])){
        header("Location: index.php");
    }*/

        $subj = $_GET['subjCode'];
        $subjCode = $_POST['subjCode'];
        if($subjCode){
            $result = mysqli_query($mysqli, "DELETE FROM `subject` WHERE subject_id = '".$subjCode."' ");
        }else  if($subj){
            $result = mysqli_query($mysqli, "DELETE FROM `subject` WHERE subject_id = '".$subj."' ");
        }
        
        if($result){
            header("Location: admin_vSubjects.php");
            echo "<h1>DELETED!!!!</h1>";
        }else{
            echo "Error Inserting Data!";
        }
?>