<?php
	include("controllers/admin_cSqlConnect.php");

	session_start();
	if (!isset($_SESSION['loginuser'])){
	    header("Location: loginPage.php");
	}
?>

<?php 
  include("controllers/admin_cSqlConnect.php");
  include ('xcl_lib/Classes/PHPExcel/IOFactory.php');


?>



<html>
<head>
	<!-- CSS Stylesheet-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet" href="assets/css/dsStudentsStyles.css" />
<link type="text/css" rel="stylesheet" href="assets/css/style.css" />


<!-- Styleswitch if  you don't chang theme , you can delete -->
<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="assets/css/styleTheme1.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="assets/css/styleTheme2.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="assets/css/styleTheme3.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="assets/css/styleTheme4.css" />


</head>
<body>
      <tbody align = "center">
	    <?php
	    $p = $_GET['p'];

		$result = mysqli_query($mysqli, "SELECT r.registration_id, r.person_id, CONCAT (p.person_firstName,' ', p.person_lastName), r.activity_id, a.activity_name FROM registration r JOIN person p on p.person_schoolId = r.person_id JOIN activity a on a.activity_id = r.activity_id and a.activity_type=".$p);

		if($result){
		  while($row = mysqli_fetch_array($result)){
		    echo "<tr>";
		    echo "<td>".$row[0]."</td>";
		    echo "<td>".$row[1]."</td>";
		    echo "<td>".$row[2]."</td>";
		    echo "<td>".$row[3]."</td>";
		    echo "<td>".$row[4]."</td>";
		    echo "<td>";
		    echo " <button type='button' title='View' class='btn' style='margin-right: 5px; background-color: rgb(181, 209, 216); border-color: rgb(181, 209, 216); color: rgb(255, 255, 255);'><i class='fa fa-eye'></i></button>";
		    echo "<button type='button' title='Edit'  class='btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button> ";
		    echo "<button type='button' title='Delete'  class='btn' style='margin-right: 5px; background-color: rgb(129, 157, 164); border-color: rgb(129, 157, 164); color: rgb(255, 255, 255);'><i class='fa fa-trash-o'></i></button> ";
		    echo "</td>";
		    echo "</tr>";
		  }
		}
?>
      </tbody>



<?php

include("views/admin_vFooter.php");
?>