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
						<li><a href="#">Library</a></li>
						<li class="active">Data</li>
				</ol>
				<!-- //breadcrumb-->

				<div id="content">
						
						<div class="row">
							<div class="col-lg-12">
										<section class="panel">
												<div class="widget-clock">
														<div id="clock"></div>
												</div>
										</section>
										
									
								</div>
								<div class="col-md-4">
										<div class="well bg-info">
												<div class="widget-tile">
													<section>
															<h5><strong>DS</strong> STUDENTS </h5>
															<h2><?php 
															  $str= "SELECT COUNT(*) FROM `person` WHERE 1";

															  $result = mysqli_query($mysqli, $str);

															  while($row = mysqli_fetch_array($result)){
															        $sy_id = $row[0];
															    } 

															   echo $sy_id;
															?></h2>
															<div class="progress progress-xs 
															progress-white progress-over-tile">
																	<div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
															</div>
															
													</section>
													<div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
												</div>
										</div>
								</div>
								<div class="col-md-4">
										<div class="well bg-inverse">
												<div class="widget-tile">
													<section>
															<h5><strong>Tutorial</strong> Activities </h5>
															<h2>
																<?php 
															  $str= "SELECT COUNT(*) FROM `tutorial` WHERE 1";

															  $result = mysqli_query($mysqli, $str);

															  while($row = mysqli_fetch_array($result)){
															        $sy_id = $row[0];
															    } 

															   echo $sy_id;
															?>

															</h2>
															<div class="progress progress-xs progress-white progress-over-tile">
																	<div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="478" aria-valuemax="1000"></div>
															</div>
															
													</section>
													<div class="hold-icon"><i class="fa fa-shopping-cart"></i></div>
												</div>
										</div>
								</div>
								<div class="col-md-4">
										<div class="well bg-theme">
												<div class="widget-tile">
													<section>
															<h5><strong>CES </strong> ACTIVITIES </h5>
															<h2>
																<?php 
															  $str= "SELECT COUNT(*) FROM `ces` WHERE 1";

															  $result = mysqli_query($mysqli, $str);

															  while($row = mysqli_fetch_array($result)){
															        $sy_id = $row[0];
															    } 

															   echo $sy_id;
															?>


															</h2>
															<div class="progress progress-xs progress-white progress-over-tile">
																	<div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="97584" aria-valuemax="300000"></div>
															</div>
															<label class="progress-label label-white">32.53% of  viewer target</label>
													</section>
													<div class="hold-icon"><i class="fa fa-laptop"></i></div>
												</div>
										</div>
								</div>
						</div>
						<div class="row">
						
								<div class="col-lg-12" >
										<section class="panel corner-flip">
												<div class="widget-chart bg-lightseagreen bg-gradient-green">
														<div id="reportrange" class="pull-right" style="background: rgba(255,255,255,0.3); color:#FFF; cursor: pointer; padding: 5px 10px 10px; margin-top:5px;">
																
																
														</div>
														<h2>DS STUDENTS</h2>
														<table class="flot-chart" data-type="lines" data-tick-color="rgba(255,255,255,0.2)" data-width="100%" data-height="220px">
																<thead>
																		<tr>
																				<th></th>
																				<th style="color : #FFF;">Test</th>
																		</tr>
																</thead>
																<tbody>
																		<tr>
																				<th>SY 2014-2015</th>
																				<td>60</td>
																		</tr>

																		<tr>
																				<th>SY 2015-2016</th>
																				<td>30</td>
																		</tr>
																		<tr>
																				<th>SY 2016-2017</th>
																				<td>30</td>
																		</tr>
																		<tr>
																				<th>SY 2017-2018</th>
																				<td>20</td>
																		</tr>
																		<tr>
																				<th>SY 2018-2019</th>
																				<td>50</td>
																		</tr>
																		
																		
																</tbody>
														</table>
												</div>

												
										</section>

										
								</div>
									<div class="col-md-4" >
										
								</div>
							
								
						</div>
						<!-- //content > row-->
						
				</div>
				<!-- //content-->

				<div id="content">

						<div class="row">
								<div class="col-md-8">
								
									
											
										
		</div>
		<!-- //modal-->
		
		
		
		<!--
		//////////////////////////////////////////////////////////////////////////
		//////////     MODAL NOTIFICATION     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="md-notification" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="500">
				<div class="modal-header bd-danger-darken">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h4 class="modal-title"><i class="fa fa-bell-o"></i> Notification</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body" style="padding:0">
						<div class="widget-im notification">
								<ul>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago lasted" datetime="2014">when you opened the page</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Your request approved</h4>
														<div class="im-thumbnail bg-theme-inverse"><i class="fa fa-check"></i></div>
														<div class="pre-text">One Button (click to remove this)</div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago" datetime="2013-11-17T14:24:17Z">timeago</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Dashboard new design!! you want to see now ? </h4>
														<div class="im-thumbnail bg-theme"><i class="fa fa-bell-o"></i></div>
														<div class="pre-text">Two Button (with link and click to close this) Lorem ipsum dolor sit amet, consectetur adipisicing elit, </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse" href="dashboard.html">Go Now.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago" datetime="2013-11-17T01:24:17Z">timeago</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Error 404 <small>( File not  found )</small></h4>
														<div class="im-thumbnail bg-warning"><i class="fa fa-exclamation-triangle"></i></div>
														<div class="pre-text">Two Button (click to  action and remove) </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="actionNow">Fixed now.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago" datetime="2013-09-17T09:24:17Z">timeago</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Upgrade Premium ?</h4>
														<div class="im-thumbnail bg-inverse">
																<i class="fa fa-cogs"></i></div>
														<div class="pre-text"> Three button (test action) </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="actionNow">Now.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
																<a class="btn btn-danger im-confirm" href="javascript:void(0)" data-confirm="yes">Delete.</a>
														</div>
												</div>
										</li>
								</ul>
						</div>
						<!-- //widget-im-->
				</div>
				<!-- //modal-body-->
		</div>
		<!-- //modal-->
		

<?php
	include("views/admin_vFooter.php");
?>


