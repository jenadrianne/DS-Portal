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
				<li><a href="#">Membership Fee</a></li>
				<li class="active">Unpaid</li>
			</ol>
		
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>MEMBERSHIP FEE</strong></h2>
													<h3> Unpaid </h3>
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															<li><a href="#" class="btn" data-toggle="modal" data-target="#modalDownload" title="Download File"><i class="fa fa-download"></i></a></li>
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modalAddOfficers" title="Add Officers"><i class="fa fa-plus"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-close" title="Update Table"><i class="fa fa-pencil"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-close" title="Delete Data"><i class="fa fa-trash-o"></i></a></li>
															<li>       </li>
															<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
														</ul>

													</div>
												</header>
												
												
												<div class="panel-body">

														<form>

															<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" data-provide="data-table" id="toggle-column">

														        <thead>
														              <tr>
														                <th>ID Number</th>
														                <th>Student Name</th>
														                <th>Contact Number</th>
														                <th>Course</th>
														                <th>Status</th>
														                <th>Date Paid</th>
														                <th></th>
														              </tr>
														          </thead>
														      
														          
														          <tbody align = "center">
														          	 <?php
														                $result = mysqli_query($mysqli,"SELECT p.person_id, CONCAT(p.person_firstname, ' ', p.person_lastname), p.person_phoneNo, s.student_course, o.officer_batch, o.position FROM person p, student s, officer o WHERE p.person_schoolId = s.person_id AND o.person_id = p.person_schoolId");

														                if($result){
														                  while($row = mysqli_fetch_array($result)){
														                    echo "<tr>";
														                    echo "<td>".$row[0]."</td>";
														                    echo "<td>".$row[1]."</td>";
														                    echo "<td>".$row[2]."</td>";
														                    echo "<td>".$row[3]."</td>";
														                    echo "<td>".$row[4]."</td>";
														                    echo "<td>".$row[5]."</td>";
														                    
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
						<h2 class="modal-title">DOWNLOAD LIST OF STUDENTS</h2>
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
			            <input type="submit" value="Download" >
			             </form>		
				</div>
				<!-- //modal-body-->
		</div>


		<div id="modalAddOfficers" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">ADD LIST OF STUDENTS</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					    <div class="center">
		                  <h4> Browse spreadsheet files (.xls) to upload data to the database. </h4>
		                </div>
               			<br><br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="admin_uploadOfficerFiles.php" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label class="control-label">School Year</label>
											<div>
												<input type="text" name="start" class="form-control" placeholder="Start">
												
												<input type="text" name="end" class="form-control col-md-6" placeholder="End">
												
											</div>
										</div>
										
																			
										<div class="form-group">
													<label class="control-label">File Upload</label>
													<div>
													    <div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="input-group">
																	<div class="form-control uneditable-input" data-trigger="fileinput">
																		<i class="glyphicon glyphicon-file fileinput-exists"></i>
																		<span class="fileinput-filename"></span>
																	</div>
																	<span class="input-group-addon btn btn-inverse btn-file">
																	<span class="fileinput-new">BROWSE</span>
																	<span class="fileinput-exists" >Change</span>
																	<input type="file" name="myFile">
																	</span>
																	 <a href="#" class="input-group-addon  btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
															</div>
													</div><!-- //fileinput-->
												    </div>
										</div>
										<div class="form-group offset">
												<div>
														<input type="submit" value="Submit" >
														<button type="reset" class="btn">Cancel</button>
												</div>
										</div>
								</form>
				<!-- //modal-body-->
		</div>
		
		
<?php
	include("views/admin_vFooter.php");
?>


