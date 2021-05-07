<?php
  include("controllers/admin_cSqlConnect.php");
    session_start();

        $memid = $_POST['bookId'];
        $amount = $_POST['Amount'];
        $date = $_POST['date'];
        $oid= $_POST['officerID'];
        $mstat=$_POST['memstatus'];
        
        $result = mysqli_query($mysqli, 
            "UPDATE memfee SET amtPaid=".$amount." , date='".$date."', officer_id='".$oid."', memfee_status=".$mstat." WHERE `memFee_id`  =".$memid);

        if($result){
            header("Location: admin_vMemFeeList.php");
        }else{
            echo "Error Inserting Data!";
        }
?>