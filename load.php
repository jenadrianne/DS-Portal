<?php 
  include("controllers/admin_cSqlConnect.php");
  include ('xcl_lib/Classes/PHPExcel/IOFactory.php');


?>
<html>
<body>


    <thead>
          <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Contact Number</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Options</th>
          </tr>
      </thead>
  
      
      <tbody align = "center">
         
     


<?php
	$result = mysqli_query($mysqli, "SELECT p.person_id, CONCAT(p.person_lastname, ' ', p.person_firstname), p.person_phoneNo, s.student_course, sy.semester_type FROM person p, student s, semester sy WHERE p.person_schoolId = s.person_id AND sy.semester_id = 1");

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
</tbody></body>
</html>