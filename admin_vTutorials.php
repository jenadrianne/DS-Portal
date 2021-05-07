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
				<li><a href="#">Acitivities</a></li>
				<li class="active">DS Tutorials</li>
			</ol>
		
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>DCIS</strong> TUTORIALS</h2>
													
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modalAddOfficers" title="Add Officers"><i class="fa fa-plus"></i></a></li>
															
															<li>       </li>
															<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
														</ul>

													</div>
												</header>
												
												
												<div class="panel-body">

														<form>

															<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" data-provide="data-table" id="toggle-column table-example">

														        <thead>
														              <tr>
														                <th>ID</th>
														                <th>Activity Name</th>
														                <th>Venue</th>
														                <th>Date</th>
														                <th>Time Start</th>
														                <th>Time End</th>
														                <th>Room</th>
														                <th>Subject</th>
														                <th>Options</th>
														              </tr>
														          </thead>
														      
														          
														          <tbody align = "center">
														          	 <?php
														                $result = mysqli_query($mysqli, "SELECT * FROM tutorial t JOIN activity a ON a.activity_id=t.activity_id JOIN room r ON r.room_id=t.room_id JOIN subject s ON s.subject_id=t.subject_id");

														                if($result){
														                  while($row = mysqli_fetch_array($result)){
														                    echo "<tr>";
														                    echo "<td>".$row[0]."</td>";
														                    echo "<td class='name'>".$row[5]."</td>";
														                    echo "<td class='venue'>".$row[6]."</td>";
														                    echo "<td class='date'>".$row[7]."</td>";
														                    echo "<td class='start'>".$row[8]."</td>";
														                    echo "<td class='end'>".$row[9]."</td>";
														                    echo "<td class='code'>".$row[13]."</td>";
														                    echo "<td class='desc'>".$row[18]."</td>";
														                    
														                    echo "<td>";
														                    echo "<button type='button' title='View' data-toggle='modal' data-target='#modalView'  data-id='".$row[0]."' class='view-AddBookDialogs btn' style='margin-right: 5px; background-color: rgb(181, 209, 216); border-color: rgb(181, 209, 216); color: rgb(255, 255, 255);'><i class='fa fa-eye'></i></button>";
														                    echo "<button type='button' title='Update' data-toggle='modal' data-target='#modalupdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";
														                    echo "<a href='deleteTutorial.php?tutorialId=".$row[3]."'><button type='button' title='Delete'  class='btn' style='margin-right: 5px; background-color: rgb(129, 157, 164); border-color: rgb(129, 157, 164); color: rgb(255, 255, 255);'><i class='fa fa-trash-o'></i></button> ";
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
						<h1 class="modal-title" align="center">ADD TUTORIAL</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">

		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="insertTutorial.php" method="POST" enctype="multipart/form-data">
										<div class="center">
									       	 
									          <div class="form-group">
									            <label for="actName">Activity Image</label>
									             <input type="file" class="form-control" name="actImage" required>
									          </div>
									          <div class="form-group">
									            <label for="actName">Activity Name</label>
									             <input type="text" class="form-control" name="actName" placeholder="Activity Name" required pattern="[a-zA-Z\s]+">
									          </div>
									          <div class="form-group">
									            <label for="actDate">Date</label>
									            <input type="date" class="form-control" name="actDate" required>
									          </div>
									          <div class="form-group">
									            <label for="actEnd">Time Start</label>
									            <input type="time" class="form-control" name="actStart" required>
									          </div>
									          <div class="form-group">
									            <label for="actEnd">Time End</label>
									            <input type="time" class="form-control" name="actEnd" required>
									          </div>
									          <div class="form-group">
									            <label for="actRoom">Room</label><br>
									            <select name="actRoom" class = "form-control" required>
									            	<?php
											           $result = mysqli_query($mysqli, "SELECT * FROM room WHERE room_status=1");
													   if($result){
													   	 while($row = mysqli_fetch_array($result)){
				 										   echo "<option value=".$row[0].">".$row[1]."</option>";
														  }													
													   }
		 										   	 ?>
									            </select>
									          </div>
									          <div class="form-group">
									            <label for="actSubject">Subject</label><br>
									            <select name="actSubject" class = "form-control" required>
									            	<?php
											           $result = mysqli_query($mysqli, "SELECT * FROM subject");
													   if($result){
													   	 while($row = mysqli_fetch_array($result)){
				 										   echo "<option value=".$row[0].">".$row[1]."</option>";
														  }													
													   }
		 										   	 ?>
									            </select>
									          </div>
									      </div>
										
										<div class="form-group offset">
												<div>

														<input type="submit" value="Submit"  class = "btn" style = "background-color: #141c27;">
														<button type="reset" class="btn">Cancel</button>
												</div>
										</div>
								</form>
				<!-- //modal-body-->
		</div>


		<div id="modalView" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">VIEW TUTORIAL</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
		                <div class="panel-body">
		                		<h3>Activity Name : <strong><span class='aname'></span></strong></h3>
		                		<hr>
		                		<p> Avenue:<strong> <span class='adesc'></span> </strong></p>
		                		<p> Date: <strong> <span class='ave'></span> </strong></p>
		                		<p> Time Start: <strong><span class='adate'></span> </strong></p>
		                		<p> Time End: <strong> <span class='ats'></span> </strong></p>
		                		<p> Room Code:<strong> <span class='ate'></span> <strong></strong></p>
		                		<p> Subject Code:<strong> <span class='ates'></span> <strong></strong></p>
		                		<hr>
											
				<!-- //modal-body--></div>
				</div>

		</div>


		<div id="modalupdate" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">UPDATE TUTORIAL</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
               			<br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="updateTutorialProcess.php" method="POST" enctype="multipart/form-data">
										<div class="center">

											  <input type="text" hidden name="bookId" id="bookId" value="bookId"/>
									       	 
									          <!--<div class="form-group">
									            <label for="actName">Activity Image</label>
									             <input type="file" class="form-control" name="actImage">
									          </div>-->
									          <div class="form-group">
									            <label for="actName">Activity Name</label>
									             <input type="text" class="form-control" name="actName" placeholder="Activity Name" id="aName" required pattern="[a-zA-Z\s]+">
									          </div>
									          <div class="form-group">
									            <label for="actDate">Date</label>
									            <input type="date" class="form-control" name="actDate" id="aDate" required>
									          </div>
									          <div class="form-group">
									            <label for="actEnd">Time Start</label>
									            <input type="time" class="form-control" name="actStart" id="aStrt" required>
									          </div>
									          <div class="form-group">
									            <label for="actEnd">Time End</label>
									            <input type="time" class="form-control" name="actEnd" id="aEnd" required>
									          </div>
									          <div class="form-group">
									            <label for="actRoom">Room</label><br>
									            <select name="actRoom" class = "form-control" required>
									            	<?php
											           $result = mysqli_query($mysqli, "SELECT * FROM room WHERE room_status=1");
													   if($result){
													   	 while($row = mysqli_fetch_array($result)){
				 										   echo "<option id='aRoom".$row[0]."' value=".$row[0].">".$row[1]."</option>";
														  }													
													   }
		 										   	 ?>
									            </select>
									          </div>
									          <div class="form-group">
									            <label for="actSubject">Subject</label><br>
									            <select name="actSubject" class = "form-control" required>
									            	<?php
											           $result = mysqli_query($mysqli, "SELECT * FROM subject");
													   if($result){
													   	 while($row = mysqli_fetch_array($result)){
				 										   echo "<option id='aSubj".$row[0]."' value=".$row[0].">".$row[1]."</option>";
														  }													
													   }
		 										   	 ?>
									            </select>
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
	$(document).on("click", ".open-AddBookDialog", function () {
     	var myBookId = $(this).data('id');
     	var name =$(this).closest('tr').find('td.name').text();
     	var date =$(this).closest('tr').find('td.date').text();
     	var start =$(this).closest('tr').find('td.start').text();
     	var end =$(this).closest('tr').find('td.end').text();
     	var code =$(this).closest('tr').find('td.code').text();
     	var desc =$(this).closest('tr').find('td.desc').text();

     	$('body').find('#aName').val(name);
     	$('body').find('#aDate').val(date);
     	$('body').find('#aStrt').val(start);
     	$('body').find('#aEnd').val(end);
     	if(code === "LB442TC"){
     		$('body').find('#aRoom1').attr('selected',true);
     	}else if(code === "LB470TC"){
			$('body').find('#aRoom3').attr('selected',true);
     	}else if(code === "LB468"){
			$('body').find('#aRoom4').attr('selected',true);
     	}

     	if(desc === "IT 138"){
     		$('body').find('#aSubj1').attr('selected',true);
     	}else if(desc === "IT 166"){
			$('body').find('#aSubj2').attr('selected',true);
     	}else if(desc === "CS 190"){
			$('body').find('#aSubj3').attr('selected',true);
     	}

     	
     	$(".modal-body #bookId").val( myBookId );
	});
</script>


<script>
	$(document).on("click", ".view-AddBookDialogs", function () {
     	var myBookId = $(this).data('id');
     	var a =$(this).closest('tr').find('td.name').text();
     	var b =$(this).closest('tr').find('td.date').text();
     	var c =$(this).closest('tr').find('td.start').text();
     	var d =$(this).closest('tr').find('td.end').text();
     	var e =$(this).closest('tr').find('td.code').text();
     	var f =$(this).closest('tr').find('td.desc').text();
     	var g =$(this).closest('tr').find('td.venue').text();

 
														                    
     	$('body').find('.aname').text(a);
     	$('body').find('.adesc').text(g);
     	$('body').find('.ave').text(b);
     	$('body').find('.adate').text(c);
     	$('body').find('.ats').text(d);
     	$('body').find('.ates').text(f);
     	$('body').find('.ate').text(e);
	});
</script>