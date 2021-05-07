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
///////////////////////////////////////////////////////////////////////
//////////     MAIN SHOW CONTENT                            //////////
//////////////////////////////////////////////////////////////////////
-->
		<div id="main">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">DS Community</a></li>
				<li class="active">Students</li>
			</ol>		
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>Registeration List</strong> for Activities </h2>

													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modalAddStudents" title="Add Students"><i class="fa fa-plus"></i></a></li>
															
															<li>       </li>
															<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
														
															
														</ul>

													</div>
												</header>
												
												
												<div class="panel-body">
													<div class="col-md-3">												
														<select  class="selectpicker form-control" data-size="10" data-live-search="true" id="semester" onchange="showUser1(this.value)">
															<option value="">Activity Type </option>
															<option value="1">Tutorial Activity</option>
									                      	<option value="2">CES Activity</option>
														</select>
													</div>
													
													<br><br>
													<div >
														<form>
															<table class="table table-striped" id="table-example">
														   		<thead>
														          <tr>
														            <th>ID</th>
														            <th>Student ID</th>
														            <th>Student Name</th>
														            <th>Activity id</th>
														            <th>Activity Name</th>
														            <th>Options</th><th></th><th></th><th></th>
														          </tr>
      														</thead>
      
														      	
															</table>
														</form>
													</div>
												
												</div>
										</section> <!-- end of section -->

										
								</div>

						</div>
						<!-- //content > row-->
						
				</div>
				<!-- //content-->
				
				
		</div>
		<!-- //main-->
		
		
		
		<!--
		///////////////////////////////////////////////////////////////
		//////////     MODAL MESSAGES                        //////////
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
		  xmlhttp.open("GET","admin_loadRegisterActivity.php?p="+ s2,true);
		  xmlhttp.send();
		}

</script>