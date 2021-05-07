<?php
  include("controllers/admin_cSqlConnect.php");

  $id = $_GET['id'];

  $result = mysqli_query($mysqli,"DELETE FROM officer WHERE officer_id = ".$id);
  if($result){
  		header("Location:admin_vDsOfficers.php");
  }else{
  	echo "Insert failed!";
  }
?>