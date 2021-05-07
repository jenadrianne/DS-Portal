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
		    	 $q = $_GET['q'];
		   		 $p = $_GET['p'];
		   		 $s =$_GET['s'];

		    if($s==0){
		    		$str = "SELECT m.memFee_id, CONCAT(p.person_lastname, ' ', p.person_firstname) , s.student_course, m.memfee_status, m.amtPaid , m.date, m.officer_id 
		    			FROM person p 
		    			JOIN student s 
		    			ON p.person_schoolId = s.person_id 
		    			JOIN semester sy 
		    			on sy.semester_id =".$q." AND sy.semester_type =".$p."
		    			JOIN memfee m
		    			on m.student_id = p.person_schoolId"; 
		    	
						$result = mysqli_query($mysqli,$str);

						if($result){
			  				while($row = mysqli_fetch_array($result)){
			    			echo "<tr>";
		    				echo "<td>".$row[0]."</td>";
		    				echo "<td class='name'>".$row[1]."</td>";
		    				echo "<td class='course'>".$row[2]."</td>";
		    				echo "<td class='status'>".$row[3]."</td>";
		    				echo "<td class='amt hidden'>".$row[4]."</td>";
			    			echo "<td class='datepaid hidden'>".$row[5]."</td>";
			    			echo "<td class='oid hidden'>".$row[6]."</td>";
		    				echo "<td>";
			    			echo "<button type='button' title='View' data-toggle='modal' data-target='#modalView'  data-id='".$row[0]."' class='view-AddBookDialogs btn' style='margin-right: 5px; background-color: rgb(181, 209, 216); border-color: rgb(181, 209, 216); color: rgb(255, 255, 255);'><i class='fa fa-eye'></i></button>";
			    			echo "<button type='button' title='Delete' data-toggle='modal' data-target='#modalupdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";
			   				echo "</td>";
			    			echo "</tr>";
			  			}
					}
				}

				if($s>=1){
						$str = "SELECT m.memFee_id, CONCAT(p.person_lastname, ' ', p.person_firstname) , s.student_course, m.memfee_status, m.amtPaid , m.date, m.officer_id 
		    			FROM person p 
		    			JOIN student s 
		    			ON p.person_schoolId = s.person_id 
		    			JOIN semester sy 
		    			on sy.semester_id =".$q." AND sy.semester_type =".$p."
		    			JOIN memfee m
		    			on m.student_id = p.person_schoolId AND m.memfee_status=".$s; 
		    	
						$result = mysqli_query($mysqli,$str);

						if($result){
			  				while($row = mysqli_fetch_array($result)){
			    				echo "<tr>";
			    				echo "<td>".$row[0]."</td>";
			    				echo "<td class='name'>".$row[1]."</td>";
			    				echo "<td class='course'>".$row[2]."</td>";
			    				echo "<td class='status'>".$row[3]."</td>";
			    				echo "<td class='amt hidden'>".$row[4]."</td>";
			    				echo "<td class='datepaid hidden'>".$row[5]."</td>";
			    				echo "<td class='oid hidden'>".$row[6]."</td>";
			    				echo "<td>";
			    				

			    				echo "<button type='button' title='View' data-toggle='modal' data-target='#modalView'  data-id='".$row[0]."' class='open-AddBookDialogs btn' style='margin-right: 5px; background-color: rgb(181, 209, 216); border-color: rgb(181, 209, 216); color: rgb(255, 255, 255);'><i class='fa fa-eye'></i></button>";

			    				echo "<button type='button' title='Update' data-toggle='modal' data-target='#modalupdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";
			    				echo "</td>";
			   					 echo "</tr>";
			  				}
			  			}
					}    
		?>
 		</tbody>


<?php
include("views/admin_vFooter.php");
?>