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
				<li class="active">Officers</li>
			</ol>
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>DCIS</strong> OFFICERS </h2>
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															<li><a href="#" class="btn" data-toggle="modal" data-target="#modalDownload" title="Download File"><i class="fa fa-download"></i></a></li>
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modaladd" title="Add Officers"><i class="fa fa-plus"></i></a></li>
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
														<div class="col-md-3">												
															<?php 
															 echo '<select  class="selectpicker form-control" data-size="10" data-live-search="true" id="schoolyear" name="sem" onchange="showUser1(this.value)">';
															 echo '<option>SCHOOL YEAR</option>';
															
															 $result = mysqli_query($mysqli, "SELECT semester_id, sy_start, sy_end FROM semester");
																 
																 if($result){
													                  while($row = mysqli_fetch_array($result)){
													                    echo "<option value='".$row[0]."'>".$row[1]." -".$row[2]."</option>";
													                   
													                  }
													             }
																
															 echo '</select>';
															?>
														</div>
													</form>
													

													<div>
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
														      
														          
														          
														      </table>
																
														</form>
														</div>
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
						<h2 class="modal-title">DOWNLOAD LIST OF OFFICERS</h2>
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


		<div id="modaladd" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">ADD LIST OF OFFICERS</h1>
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
												<input type="text" name="start" class="form-control" placeholder="Start" required pattern = "[0-9]{4}">
												
												<input type="text" name="end" class="form-control col-md-6" placeholder="End" required pattern = "[0-9]{4}">
												
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
														<input type="submit" value="Submit" class = "btn" style = "background-color: #141c27;">
														<button type="reset" class="btn">Cancel</button>
												</div>
										</div>
								</form>
				<!-- //modal-body-->
		</div>


		<div id="modalupdate" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">UPDATE OFFICER INFORMATION</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
               			<br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="admin_updateStudent.php" method="POST" enctype="multipart/form-data">
										<div class="center">

									         <input type="text" hidden name="bookId" id="bookId" value="bookId"/>

									         <div class="form-group">
									            <label for="subjCode">STUDENT NAME: </label>
									             	<h3 id="sname"/></h3>
									          </div>

									          <div class="form-group">
									            <label for="subjCode">STUDENT ID NUMBER: </label>
									             	<input type="text" class="form-control" name="sid" id="sid"/>
									          </div>

									          <div class="form-group">
									            <label for="subjCode">CONTACT NUMBER:</label>
									             	<input type="text" class="form-control"  name="scn" id="scn"/>
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
		
		
<?php
	include("views/admin_vFooter.php");
?>


<script>
		
		function showUser1(str1) {

			
		var s2 = str1;
			

		  if (s2 == "" ) {

		    document.getElementById("table-example").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {

		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		   
		   // if (this.readyState==4 && this.status==200) {
		      document.getElementById("table-example").innerHTML=this.responseText;
		  //  }
		  }
		  xmlhttp.open("GET","admin_officerLoadTable.php?q="+ s2,true);
		  xmlhttp.send();
		}

</script>