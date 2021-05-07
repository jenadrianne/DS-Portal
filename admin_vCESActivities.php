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
				<li><a href="#">Activities</a></li>
				<li class="active">CES Activities</li>
			</ol>
		
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>CES Activities</strong></h2>
													
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modalAddOfficers" title="Add CES Activity"><i class="fa fa-plus"></i></a></li>
															
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
														                <th>ActivityStudent ID</th>
														                <th>Activity Name</th>
														                <th>Date</th>
														                <th>Time Start</th>
														                <th>Time End</th>
														                <th></th>
														                <th></th>
														              </tr>
														          </thead>
														      
														          
														          <tbody align = "center">
														          	 <?php
														                $result = mysqli_query($mysqli,"SELECT a.activity_id, c.ces_description, a.activity_name, a.activity_venue, a.activity_date, a.activity_start, a.activity_end

																		FROM activity a, ces c WHERE a.activity_id = c.activity_id");

														                if($result){
														                  while($row = mysqli_fetch_array($result)){
														                    echo "<tr>";
														                    echo "<td class='aid hidden'>".$row[0]."</td>";
														                    echo "<td class='cdes hidden'>".$row[1]."</td>";
														                    echo "<td class='aname'>".$row[2]."</td>";
														                    echo "<td class='avenue hidden'>".$row[3]."</td>";
														                    echo "<td class='adate'>".$row[4]."</td>";
														                    echo "<td class='astart'>".$row[5]."</td>";
														                    echo "<td class='aend'>".$row[6]."</td>";

														                    
														                    echo "<td>";
														                    echo "<button type='button' title='View' data-toggle='modal' data-target='#modalView'  data-id='".$row[0]."' class='view-AddBookDialogs btn' style='margin-right: 5px; background-color: rgb(181, 209, 216); border-color: rgb(181, 209, 216); color: rgb(255, 255, 255);'><i class='fa fa-eye'></i></button>";
														                    echo "<button type='button' title='Update' data-toggle='modal' data-target='#modalUpdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";
														                   echo "<a href='admin_deleteCES.php?cid=".$row[0]."'><button type='button' title='Delete'  class='btn' style='margin-right: 5px; background-color: rgb(129, 157, 164); border-color: rgb(129, 157, 164); color: rgb(255, 255, 255);'><i class='fa fa-trash-o'></i></button> ";
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
			            <input type="submit" value="Download" class = "btn" style = "background-color: #141c27;">
			             </form>		
				</div>
				<!-- //modal-body-->
		</div>


		<div id="modalAddOfficers" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">ADD A CES ACTIVITY</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					     <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="admin_addCESActivity.php" method="POST" enctype="multipart/form-data">

										<div class="form-group">
											<label class="control-label">Activity Name</label>
											<div>
												<input type="text" name="actname" class="form-control" required pattern="[a-zA-Z\s]+">	
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label">Venue</label>												
											<select  name="venue" class="selectpicker" data-size="10" data-live-search="true" id="venue" required>
												<option value="">Venue</option>
												<option value="1">Inside Campus</option>
						                      	<option value="2">Outside Campus</option>
											</select>
										</div>	

										<div class="form-group">
											<label class="control-label">Date range</label>
											<div>
													
												<input type="text" class="form-control" id="daterange" name="date"/ required>
													
											</div>
										</div><!-- //form-group-->

										

										<div class="form-group">												
											<label class="control-label">Activity Time (start and end) </label>
											<div>
												<div class="col-md-5">
												<input type="time" class=" form-control" name="time_start" required>
												</div>
												 <div  class="col-md-2" > - </div>
												  <div class="col-md-5">
												  <input type="time" class="form-control" name="time_end" required>
												  </div>
											</div>
										</div>

										<div class="form-group">
												<label class="control-label">CES Description</label>
												<div>
														<textarea name="des" class=" form-control" rows="3" maxlength="25"  data-always-show="true" placeholder="Customize Label" data-separator=' of ' data-pre-text='You have ' data-post-text=' chars remaining' required pattern="[a-zA-Z\s][0-9]{140}"></textarea>
												</div>
										</div><!-- //form-group-->

										
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
		

		<div id="modalView" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">VIEW CES ACTIVITIES</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
		                <div class="panel-body">
		                		<h3>Activity Name : <strong><span class='aname'></span></strong></h3>
		                		<hr>
		                		<p> Activity Description:<strong> <span class='adesc'></span> </strong></p>
		                		<p> Venue: <strong> <span class='ave'></span> </strong></p>
		                		<p> Date: <strong><span class='adate'></span> </strong></p>
		                		<p> Time Start: <strong> <span class='ats'></span> </strong></p>
		                		<p> Time End:<strong> <span class='ate'></span> <strong></strong></p>
		                		<hr>
											
				<!-- //modal-body--></div>
				</div>

		</div>


		<div id="modalUpdate" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">UPDATE  A CES ACTIVITY</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					     <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="admin_updateCES.php" method="POST" enctype="multipart/form-data">
										<input type="text" name="bookId" hidden id="bookId" value="bookId"/>
										
										<div class="form-group">
											<label class="control-label">Activity Name</label>
											<div>
												<input type="text" name="actname" class="form-control" id="ana" required pattern="[a-zA-Z\s]+">	
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label">Venue</label>												
											<select  name="venue" class="selectpicker" data-size="10" data-live-search="true" id="venue" required>
												<option value="">Venue</option>
												<option value="1" id="vin" >Inside Campus</option>
						                      	<option value="2" id="vou">Outside Campus</option>
											</select>
										</div>	

										<div class="form-group">
											<label class="control-label">Date</label>
											<div>
													
												<input type="text" class="cdate form-control" id="daterange" name="date" required />
													
											</div>
										</div><!-- //form-group-->


										<div class="form-group">												
											<label class="control-label">Activity Time (start and end) </label>
											<div>
												<div class="col-md-5">
												<input type="time" class="astart form-control" name="time_start" id='as' required>
												</div>
												 <div  class="col-md-2" > - </div>
												  <div class="col-md-5">
												  <input type="time" class="aend form-control" name="time_end" id='ae' required>
												  </div>
											</div>
										</div>

										<div class="form-group">
												<label class="control-label">CES Description</label>
												<div>
														<textarea name="des" id="ades" class="form-control" rows="3" maxlength="25"  data-always-show="true" placeholder="Customize Label" data-separator=' of ' data-pre-text='You have ' data-post-text=' chars remaining' required pattern="[a-zA-Z\s][0-9]{140}"></textarea>
												</div>
										</div><!-- //form-group-->

										
										
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
	$(document).on("click", ".view-AddBookDialogs", function () {
     	var myBookId = $(this).data('id');
     	var a = $(this).closest('tr').find('td.aname').text();
     	var b = $(this).closest('tr').find('td.avenue').text();
     	var c  = $(this).closest('tr').find('td.cdes').text();
     	var d = $(this).closest('tr').find('td.adate').text();
     	var e = $(this).closest('tr').find('td.astart').text();
     	var f = $(this).closest('tr').find('td.aend').text();


     	$('body').find('.aname').text(a);
     	$('body').find('.adesc').text(c);
     	$('body').find('.ave').text(b);
     	$('body').find('.adate').text(d);
     	$('body').find('.ats').text(e);
     	$('body').find('.ate').text(f);
	});
</script>

<script>
	$(document).on("click", ".open-AddBookDialog", function () {
     	var myBookId = $(this).data('id');
     	var a = $(this).closest('tr').find('td.aname').text();
     	var b = $(this).closest('tr').find('td.avenue').text();
     	var c  = $(this).closest('tr').find('td.cdes').text();
     	var d = $(this).closest('tr').find('td.adate').text();
     	var e = $(this).closest('tr').find('td.astart').text();
     	var f = $(this).closest('tr').find('td.aend').text();

     	if(b==="Inside Campus"){
     		$('body').find('#vin').attr('selected',true);
     	}

     	if(b==="Outside Campus"){
     		$('body').find('#vou').attr('selected',true);
     	}

     	$('body').find('#ana').val(a);
     	$('body').find('#ades').val(c);
     	$('body').find('#ae').val(f);
     	$('body').find('#as').val(e);
     	$('body').find('.cdate').val(d);
     	$(".modal-body #bookId").val( myBookId );
	});
</script>