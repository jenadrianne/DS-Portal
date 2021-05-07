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
						<li class="active">Subjects</li>
				</ol>
				<!-- //breadcrumb-->
				
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>DCIS</strong> SUBJECTS </h2>
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															
															<li><a href="#"  class="btn btn-add" data-toggle="modal" data-target="#modalAddStudents" title="Add Subjects"><i class="fa fa-plus"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-close" title="Update Table"><i class="fa fa-pencil"></i></a></li>
															
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
														                <th>Subject Code</th>
														                <th>Subject Description</th>
														                <th>Options</th>

														              </tr>
														          </thead>
														      
														          
														          <tbody align = "center">
														              <?php
														                $result = mysqli_query($mysqli, "SELECT * FROM subject");
														                if($result){
														                  while($row = mysqli_fetch_array($result)){
														                    echo "<tr class='odd gradeX'>";
														                    echo "<td>".$row[0]."</td>";
														                    echo "<td class='code'>".$row[1]."</td>";
														                    echo "<td class='desc'>".$row[2]."</td>";
														                    echo "<td>";
														                    echo "<button type='button' title='Delete' data-toggle='modal' data-target='#modalupdate'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'><i class='fa fa-pencil'></i></button>";
														                   
														                    echo "<a href='delSubject.php?subjCode=".$row[0]."'><button type='button' title='Delete'  class='btn' style='margin-right: 5px; background-color: rgb(129, 157, 164); border-color: rgb(129, 157, 164); color: rgb(255, 255, 255);'><i class='fa fa-trash-o'></i></button> ";

														              

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
		//////////     MODAL   //////////
		///////////////////////////////////////////////////////////////
		-->
		
		
		<div id="modalAddStudents" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">ADD SUBJECTS</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					    <div class="center">
		                  <h4> Browse spreadsheet files (.xls) to upload data to the database. </h4>
		                </div>
               			<br><br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="insertSubject.php" method="POST" enctype="multipart/form-data">
										<div class="center">
									       	 
									          <div class="form-group">
									            <label for="subjCode">Subject Code</label>
									             <input type="text" class="form-control" name="subjCode" placeholder="Subject Code" required>
									          </div>
									          <div class="form-group">
									            <label for="subjDesc">Subject Description</label>
									            <input type="text" class="form-control" name="subjDesc" placeholder="Subject Description" required pattern="[a-zA-Z\s][0-9]+{140}">
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


		<div id="modalupdate" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">UPDATE SUBJECTS</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
               			<br>
			         
		                <div class="panel-body">
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="updateSubjProcess.php" method="POST" enctype="multipart/form-data">
										<div class="center">

									         <input type="text" hidden name="bookId" id="bookId" value="bookId"/>

									         <div class="form-group">
									            <label for="subjCode">Subject Code</label>
									             	<input type="text" class="form-control" name="subjCode" id="scid" required/>
									          </div>

									          <div class="form-group">
									            <label for="subjCode">Subject Description</label>
									             	<input type="text" class="form-control"  name="subjDesc" id="sdid" required pattern="[a-zA-Z\s][0-9]+{140}"/>
									          </div>
									       	
									      </div>
									      
									      </div>
											<div class="form-group offset">
													<div>
													<input type="submit" value="Submit" class = "btn" style = "background-color: #141c27;">
															<!--<input type="submit" value="Submit" >-->
															<button type="reset" class="btn">Cancel</button>
													</div>
											</div>

										</form>
									
								
				<!-- //modal-body-->
				</div>

		</div>

 
    </div>
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
     	

     	$('body').find('#scid').val(code);
     	$('body').find('#sdid').val(desc);
     	$(".modal-body #bookId").val( myBookId );
	});
</script>