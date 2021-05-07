
<?php
  include("controllers/admin_cSqlConnect.php");
 

        $memid = $_POST['bookId'];
        $email= $_POST['email'];
        $cnt=$_POST['cnt'];
        $sid =$_POST['sid'];
        
        $result = mysqli_query($mysqli, 
            "UPDATE `person` SET `person_email`='".$email."',`person_phoneNo`='".$cnt."',`person_schoolId`='".$sid."' WHERE `person_id`=".$memid);

       
            
        if($result){
            header("Location: admin_vDsTeachers.php");
        }else{
            echo "Error Inserting Data!";
        }
?> 


<div class="form-group">


