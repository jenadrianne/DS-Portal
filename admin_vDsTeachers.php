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

<?php 
	include("views/admin_vHeader.php");
?>

		
<!--
/////////////////////////////////////////////////////////////////////////
//////////     MAIN SHOW CONTENT     //////////
//////////////////////////////////////////////////////////////////////
-->
		<div id="main">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">DS Community</a></li>
				<li class="active">Teachers</li>
			</ol>
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>DCIS</strong> TEACHERS </h2>
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modalAddOfficers" title="Add Teachers"><i class="fa fa-plus"></i></a></li>
															
															<li>       </li>
															<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
														</ul>

													</div>
												</header>
												
												
												<div class="panel-body">

														<form>

															<table class="table table-striped" id="table-example">

														        <thead>
														              <tr>
														                <th>Student ID</th>
														                <th>Student Name</th>
														                <th>Contact Number</th>
														                <th>Course</th>
														                <th>Batch</th>
														                <th>Options</th>
														                <th></th>
														              </tr>
														          </thead>
														      
														          
														          <tbody align = "center">
														          	 <?php
														                $result = mysqli_query($mysqli,"SELECT p.person_id, CONCAT(p.person_lastname, ' ', p.person_firstname),p.person_schoolId, p.person_phoneNo, p.`person_email`  FROM PERSON p where `person_teacher` = 1  ");

														                if($result){
														                  while($row = mysqli_fetch_array($result)){
														                    echo "<tr>";
														                    echo "<td class='tid'>".$row[0]."</td>";
														                    echo "<td class='tname'>".$row[1]."</td>";
														                    echo "<td class='tsid'>".$row[2]."</td>";
														                    echo "<td class='tcn'>".$row[3]."</td>";
														                    echo "<td class='tem'>".$row[4]."</td>";
														                    
														                    echo "<td>";
														                  
														                    echo "<button type='button' title='Delete' data-toggle='modal' data-target='#modalupdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";
														                     echo "<a href='admin_deleteTeachers.php?cid=".$row[0]."'><button type='button' title='Delete'  class='btn' style='margin-right: 5px; background-color: rgb(129, 157, 164); border-color: rgb(129, 157, 164); color: rgb(255, 255, 255);'><i class='fa fa-trash-o'></i></button> ";
														                    echo "</td>";
														                    echo "</tr>";
														                  }
														                }
														              ?>
														              
														            </tbody>
														      </table>
																
														</form>
												</div>
										</section>

										
								</div>

						</div>
						<!-- //content > row-->
						
				</div>
				<!-- //content-->
				
				
		</div>
		<!-- //main-->
		
		
		
		<!--
		///////////////////////////////////////////////////////////////////
		//////////     MODAL MESSAGES     //////////
		///////////////////////////////////////////////////////////////
		-->
		
		<div id="modalDownload" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h2 class="modal-title">DOWNLOAD LIST OF TEACHERS</h2>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					    <div class="center">
		                  <h4> Downloads spreadsheet files (.xls) from the database. </h4>
		                </div>
               			<br><br>
			             <form action="admin_downloadFiles.php" method="POST" enctype="multipart/form-data"> 
			                  <?php
			                     $sy_result= mysqli_query($mysqli, "SELECT `sy_filename` FROM `semester` WHERE sy_start ='2016' AND sy_end= '2017' LIMIT 1"); 

			                              while($row = mysqli_fetch_array($sy_result)){
			                                  $sy_filename = $row[0];
			                              } 
			                               echo '<input type="hidden" name="sy_file" value="'.$sy_filename.'">';

			                  ?>
			            <input type="submit" value="Download" class = "btn" style = "background-color: #141c27;">
			             </form>		
				</div>
				<!-- //modal-body-->
		</div>


		<div id="modalupdate" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">UPDATE TEACHERS</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
               			<br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="admin_updateDsTeachers.php" method="POST" enctype="multipart/form-data">
										<div class="center">

									     <input type="text" hidden name="bookId" id="bookId" value="bookId"/>

									     <div class="form-group">
									            <label for="subjCode"> NAME: </label>
									             	<h3 id="sname"/></h3>
									          </div>

										<div class="form-group">
											<label class="control-label">Email</label>
											<div>
												<input type="text" id='em' name="email" class="form-control"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
											</div>
										</div>

										<div class="form-group">
											<label class="control-label">Contact Number</label>
											<div>
												<input type="text"  id='cn' name="cnt" class="form-control" required pattern = "[0-9]+" >
											</div>
										</div>

										<div class="form-group">
											<label class="control-label">School ID</label>
											<div>
												<input type="text" id='si' name="sid" class="form-control" required pattern="[0-9]{8}">
											</div>
										</div>
								
									       	
									      </div>
									      
									      </div>
											<div class="form-group offset">
													<div>
															<input type="submit" value="Submit" class = "btn" style = "background-color: #141c27;">
															<button type="reset" class="btn">Cancel</button>
													</div>
											</div>

										</form>
									
								
				<!-- //modal-body-->
				</div>

		</div>


		<div id="modalAddOfficers" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">ADD LIST OF TEACHERS</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					    <div class="center">
		                  <h4> Browse spreadsheet files (.xls) to upload data to the database. </h4>
		                </div>
               			<br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="admin_AddTeachers.php" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label class="control-label">First Name</label>
											<div>
												<input type="text"  name="fname" class="form-control" required pattern="[a-zA-Z\s]+">
											</div>
										</div>
										

										<div class="form-group">
											<label class="control-label">Last Name</label>
											<div>
												<input type="text" name="lname" class="form-control" required pattern="[a-zA-Z\s]+">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label">Email</label>
											<div>
												<input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
											</div>
										</div>

										<div class="form-group">
											<label class="control-label">Contact Number</label>
											<div>
												<input type="text"  name="cnt" class="form-control" required pattern = "[0-9]+">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label">School ID</label>
											<div>
												<input type="text"  name="sid" class="form-control" required pattern = "[0-9]{08}">
											</div>
										</div>
								
										<div class="form-group offset">
												<div>
														<input type="submit" value="Submit" class = "btn" style = "background-color: #141c27;">
														<button type="reset" class="btn">Cancel</button>
												</div>
										</div>
								</form>
				<!-- //modal-body-->
		</div>
		
		
<?php
	include("views/admin_vFooter.php");
?>


<script>
	$(document).on("click", ".open-AddBookDialog", function () {
     	var myBookId = $(this).data('id');
     	var a =$(this).closest('tr').find('td.tname').text();
     	var b =$(this).closest('tr').find('td.tsid').text();
     	var c =$(this).closest('tr').find('td.tcn').text();
     	var d =$(this).closest('tr').find('td.tem').text();
     	

     	$('body').find('#sname').text(a);
     	$('body').find('#cn').val(c);
     	$('body').find('#si').val(b);
     	$('body').find('#em').val(d);
     	$(".modal-body #bookId").val( myBookId );
	});
</script>

 