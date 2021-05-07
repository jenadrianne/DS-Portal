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
				<li class="active">Complete List</li>
			</ol>
		
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12">
										<section class="panel">
												<header class="panel-heading">
													<h2><strong>MEMBERSHIP FEE</strong></h2>
													<h3> Complete List </h3>
													<div class="panel-tools" align="right">
														<ul class="tooltip-area">
															
															<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
															<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
														</ul>

													</div>
												</header>
												
												
												<div class="panel-body">
													<form>
														<div class="col-md-3">												
															<?php 
															 echo '<select  class="selectpicker form-control" data-size="10" data-live-search="true" id="schoolyear" name="sem" onchange="store(this.value)">';
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
													<div class="col-md-3">												
														<select  class="selectpicker form-control" data-size="10" data-live-search="true" id="semester" onchange="store2(this.value)">
															<option value="">Semester </option>
															<option value="1">First Semester</option>
									                      	<option value="2">Second Semester</option>
									                      	<option value="3">Summer Classes</option>
														</select>
													</div>

													<div class="col-md-3">												
														<select  class="selectpicker form-control" data-size="10" data-live-search="true" id="semester" onchange="showUser1(this.value)">
															<option value="">STATUS</option>
															<option value="0">ALL</option>
									                      	<option value="1">PAID</option>
									                      	<option value="2">UNPAID</option>
														</select>
													</div>
													
													<br><br>
													<div >
														<form>
															<table class="table table-striped" id="table-example">
														   		<thead>
														          <tr>
														            <th>Student ID</th>
														            <th>Student Name</th>
														            <th>Contact Number</th>
														            <th>Course</th>
														            <th>Semester</th>
														            <th>Options</th>
														            <th></th>
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


		<div id="modalupdate" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">UPDATE  MEMFEE STATUS</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
		                <div class="panel-body">
		                		<p> Name : <span class='pname'></span></p>
		                		<p> Course: <span class='pcourse'></span></p>
		                		<hr>
								<form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="admin_updateMembership.php" method="POST" enctype="multipart/form-data">
											
								         	<input type="text" name="bookId"  hidden id="bookId" value="bookId"/>

									        <div class="form-group">
									        	<label class="control-label">Amount Paid</label>
									        		<div class="form-group">
											    		<label class="sr-only">Amount</label>
													    <div class="input-group">
													      <div class="input-group-addon">PHP</div>
													      <input type="text" class="form-control" name="Amount" placeholder="Amount" required>
													      <div class="input-group-addon">.00</div>
													    </div>
											  		</div>
											  </div>
																 

											<div class="form-group">
												<label class="control-label">Date [inline] </label>
												<div>
													<input type="date"  class="form-control" name="date" required>
												</div>
											</div><!-- //form-group-->

											<div class="form-group">
												<label class="control-label">Officer ID</label>
													<div class="row">
														<input type="text" class="form-control"  name="officerID" id="sdid" required />
													</div>
											</div><!-- //form-group-->

									        

									        <div class="form-group">
									        	<label class="control-label">Membership Status</label>			
												<div class="row">
													<select  class="selectpicker form-control" data-size="10" id="memStatus" name="memstatus" required>
														<option value="2">Unpaid</option>
									                	<option value="1">Paid</option>
													</select>
												
												</div>
											</div>

									      
									      
									      
											<div class="form-group">
													<div>
															<input type="submit" value="Submit" class = "btn" style = "background-color: #141c27;" >
															<button type="reset" class="btn">Cancel</button>
													</div>
											</div>

										</form>				
				<!-- //modal-body--></div>
				</div>

		</div> <!--end of modal update -->


		<div id="modalView" class="modal fade"  data-header-color="#34495e">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h1 class="modal-title" align="center">VIEW  MEMFEE STATUS</h1>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">				
		                <div class="panel-body">
		                		<h3> Name : <strong><span class='pname'></span></strong></h3>
		                		<hr>
		                		<p> Course:<strong> <span class='pcourse'></span> </strong></p>
		                		<p> Status: <strong> <span class='pstatus'></span> </strong></p>
		                		<p> Amount: <strong><span class='pamt'></span> </strong></p>
		                		<p> Date Paid: <strong> <span class='pdatepaid'></span> </strong></p>
		                		<p> Received By:<strong> <span class='poid'></span> <strong></strong></p>
		                		<hr>
											
				<!-- //modal-body--></div>
				</div>

		</div>
		
		
		
<?php
	include("views/admin_vFooter.php");
?>



<script>
		
		var s1 ,s2; 


		function store(str){
			s1=str;
		}

		function store2(str){
			s2=str;
		}


		function showUser1(str1) {

			
				var s3= str1;
			

		  if (s1=="" && s2 == ""  && s3=="") {

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
		  xmlhttp.open("GET","admin_membershipLoadTable.php?q="+s1+"&p="+s2+"&s="+s3,true);
		  xmlhttp.send();
		}

</script>


<script>
	$(document).on("click", ".open-AddBookDialog", function () {
     	var myBookId = $(this).data('id');
     	var myname = $(this).closest('tr').find('td.name').text();
     	var mycourse = $(this).closest('tr').find('td.course').text();


     	$('body').find('.pname').text(myname);
     	$('body').find('.pcourse').text(mycourse);
     	$(".modal-body #bookId").val( myBookId );
	});
</script>



<script>
	$(document).on("click", ".view-AddBookDialogs", function () {
     	var myBookId = $(this).data('id');
     	var myname = $(this).closest('tr').find('td.name').text();
     	var mycourse = $(this).closest('tr').find('td.course').text();
     	var mystatus = $(this).closest('tr').find('td.status').text();
     	var myamt = $(this).closest('tr').find('td.amt').text();
     	var mydatepaid = $(this).closest('tr').find('td.datepaid').text();
     	var myoid = $(this).closest('tr').find('td.oid').text();


     	$('body').find('.pname').text(myname);
     	$('body').find('.pcourse').text(mycourse);
     	$('body').find('.pstatus').text(mystatus);
     	$('body').find('.pamt').text(myamt);
     	$('body').find('.pdatepaid').text(mydatepaid);
     	$('body').find('.poid').text(myoid);

     	$(".modal-body #bookId").val( myBookId);
	});
</script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


