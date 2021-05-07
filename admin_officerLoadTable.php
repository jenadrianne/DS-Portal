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

      	 	$q=$_GET['q'];
      	 	

            $result = mysqli_query($mysqli,"SELECT p.person_id, CONCAT(p.person_firstname, ' ', p.person_lastname), p.person_phoneNo, s.student_course, o.position FROM person p, student s, officer o, semester sy WHERE p.person_schoolId = s.person_id AND o.person_id = p.person_schoolId AND sy.semester_id =".$q." AND o.semester_id =".$q);

            if($result){
              while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td class='idnum'>".$row[0]."</td>";
                echo "<td class='name'>".$row[1]."</td>";
                echo "<td class='cnt'>".$row[2]."</td>";
                echo "<td class='course'>".$row[3]."</td>";
                echo "<td class='position'>".$row[4]."</td>";
;
                
                echo "<td>";


                echo "<button type='button' title='Update' data-toggle='modal' data-target='#modalupdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";

                echo "<a href='admin_deleteOficers.php?cid=".$row[0]."'><button type='button' title='Delete'  class='btn' style='margin-right: 5px; background-color: rgb(129, 157, 164); border-color: rgb(129, 157, 164); color: rgb(255, 255, 255);'><i class='fa fa-trash-o'></i></button> ";

                echo "</td>";
                echo "</tr>";
              }
            }
          ?>
 		 </tbody>


<?php

include("views/admin_vFooter.php");
?>


