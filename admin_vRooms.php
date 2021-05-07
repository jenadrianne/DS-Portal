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
				<li class="active">Rooms</li>
			</ol>
		
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>DCIS</strong> ROOMS</h2>
													
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modalAddOfficers" title="Add Rooms"><i class="fa fa-plus"></i></a></li>
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

															<table class="table table-striped" id="table-example">

														        <thead>
														              <tr>
														              	<th>ID</th>
														                <th>Room Code</th>
														                <th>Room Description</th>
														                <th>Type</th>
														                <th>Options</th>

														              </tr>
														          </thead>
														      
														          
														          <tbody align = "center">
														              <?php
														                $result = mysqli_query($mysqli, "SELECT * FROM room WHERE room_status=1");
														                if($result){
														                  while($row = mysqli_fetch_array($result)){
														                    echo "<tr class='odd gradeX'>";
														                    echo "<td>".$row[0]."</td>";
														                    echo "<td class='code'>".$row[1]."</td>";
														                    echo "<td class='desc'>".$row[2]."</td>";
														                    echo "<td class='type'>".$row[3]."</td>";
														                    echo "<td>";
														                
														                    echo "<button type='button' title='Update' data-toggle='modal' data-target='#modalupdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";
														                   
														                    echo "<a href='deleteRoom.php?roomId=".$row[0]."'><button type='button' title='Delete'  class='btn' style='margin-right: 5px; background-color: rgb(129, 157, 164); border-color: rgb(129, 157, 164); color: rgb(255, 255, 255);'><i class='fa fa-trash-o'></i></button> ";

														              

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
						<h1 class="modal-title" align="center">ADD ROOM</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">

		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="insertRoom.php" method="POST" enctype="multipart/form-data">
										<div class="center">
									       	 
									          <div class="form-group">
									            <label for="roomCode">Room Code</label>
									             <input type="text" class="form-control" name="roomCode" placeholder="Room Code" required>
									          </div>
									          <div class="form-group">
									            <label for="roomDesc">Room Description</label>
									            <input type="text" class="form-control" name="roomDesc" placeholder="Room Description" required pattern="[a-zA-Z\s][0-9]+{140}">
									          </div>
									          <div class="form-group">
									            <label for="roomType">Room Description</label><br>
									            <select name="roomType" class = "form-control" required>
									            	<option value=1>Laboratory</option>
									            	<option value=2>Lecture Room</option>
									            </select>
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
						<h1 class="modal-title" align="center">UPDATE ROOM</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
               			<br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="updateRoomProcess.php" method="POST" enctype="multipart/form-data">
										<div class="center">

									         <input type="text" hidden name="bookId" id="bookId" value="bookId"/>

									         <div class="form-group">
									            <label for="roomCode">Room Code</label>
									             	<input type="text" class="form-control" name="roomCode" id="rcode" required="" />
									          </div>

									          <div class="form-group">
									            <label for="roomDesc">Room Description</label>
									             	<input type="text" class="form-control"  name="roomDesc" id="rdesc" pattern="[a-zA-Z\s][0-9]+{140}"/>
									          </div>

									          <div class="form-group">
									            <label for="roomType">Room Type</label>
									             	<select name="roomType" id="rtype" class = "form-control" required="">
										            	<option value=1 id="rtype1">Laboratory</option>
										            	<option value=2 id="rtype2">Lecture Room</option>
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
     	var code =$(this).closest('tr').find('td.code').text();
     	var desc =$(this).closest('tr').find('td.desc').text();
     	var type =$(this).closest('tr').find('td.type').text();
     	//alert(type);
     	

     	$('body').find('#rcode').val(code);
     	$('body').find('#rdesc').val(desc);
     	if(type === "Laboratory"){
     		$('body').find('#rtype1').attr('selected',true);
     	}else if(type === "Lecture Room"){
			$('body').find('#rtype2').attr('selected',true);
     	}
     	
     	$(".modal-body #bookId").val( myBookId );
	});
</script>