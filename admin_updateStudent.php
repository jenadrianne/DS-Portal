<?php
  include("controllers/admin_cSqlConnect.php");
 

        $memid = $_POST['bookId'];
        $sid= $_POST['sid'];
        $scn= $_POST['scn'];
        $sc =$_POST['sc'];
        
        $result = mysqli_query($mysqli, 
            "UPDATE `person` SET `person_phoneNo`='".$scn."', `person_schoolId`='".$sid."'  WHERE `person_id`=".$memid);

        

         if($result){
          while($row = mysqli_fetch_array($result)){
            $sy_id = $row[0];

          }
        }

       
            
        if($result){
            header("Location: admin_vDsStudent.php");
        }else{
            echo "Error Inserting Data!";
        }
?> 


<div class="form-group">