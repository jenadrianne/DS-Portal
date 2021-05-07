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
						<li class="active">Site Map</li>
				</ol>
				<!-- //breadcrumb-->
				
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-12" >
										<section class="panel">
												<header class="panel-heading">
														<h2><strong>site </strong> map</h2>
														<label class="color">site map( jQuery Treeview Plugin  )</label>
												</header>
												<div class="panel-tools panel-tools-mini color" align="right" data-toolscolor="inverse">
														<ul class="tooltip-area">
																<li><a href="javascript:void(0)" class="btn btn-inverse btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
																<li><a href="javascript:void(0)" class="btn btn-inverse btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
																<li><a href="javascript:void(0)" class="btn btn-inverse btn-close" title="Close"><i class="fa fa-times"></i></a></li>
														</ul>
												</div>
												<div class="panel-body">
														<div class="row">
																<div class="col-sm-6">
																		
																		
																		<br>
																		<div style="width:200px;margin:auto;">
																		<div id="sitemapcontrol"> 
																				<a title="Collapse the entire tree below" href="#" class="btn btn-theme"><i class="fa fa-minus"></i></a> 
																				<a title="Expand the entire tree below" href="#" class="btn btn-theme"><i class="fa fa-plus"></i></a>
																				<a title="Toggle the tree below, opening closed branches, closing open branches" href="#" class="btn btn-theme">Toggle All</a>
																		</div>
																		<br>
																		<ul id="sitemap" class="treeview-black">
																				<li><span><i class="icon  fa fa-laptop"></i> Dashboard</span>
								<ul>
										<li><a href="dashboard.html"><i class="icon  fa fa-rocket"></i> First Design </a></li>
										<li><a href="dashboard2.html"><i class="icon  fa fa-th"></i> Dashboard New </a></li>
								</ul>
						</li>
						<li><a href="front/index.html"><i class="icon  fa fa-rocket"></i> Front End </a></li>
																				<li><span><i class="icon  fa fa-th-list"></i> Layout</span>
								<ul>
										<li class="Label label-lg">Main Layout</li>
										<li><a href="alwayMenu.html"> Alway Left  Menu </a></li>
										<li><a href="hideUserPanel.html"> Hide User Panel </a></li>
										<li><a href="hideUserPanelIn.html"> Show & Hide</a></li>
										<li class="Label label-lg">Other Layout</li>
										<li><a href="topMenu.html"> Top Menu</a></li>
										<li><a href="footerShow.html"> Footer Show</a></li>
										<li><a href="footerMenu.html"> Footer with menu</a></li>
								</ul>
						</li>
						<li><a href="mailBox.html"><i class="icon  fa fa-inbox"></i> Mail</a></li>
																				<li><span><i class="icon  fa fa-briefcase"></i> UI Element</span>
																						<ul>
																								<li><a href="ui.html"> UI </a></li>
																								<li><a href="ui_button.html"> Button </a></li>
																								<li><a href="ui_icon.html"> Fonts Icon</a></li>
																								<li><a href="ui_slide.html"> Slide</a></li>
																								<li><a href="ui_modal.html"> Modal</a></li>
																								<li><a href="ui_panel.html"> Panel</a></li>
																								<li><a href="ui_alert.html"> Alert</a></li>
																								<li><a href="ui_typography.html"> Typography</a></li>
										<li><a href="ui_nestable.html"> Nestable</a></li>
																						</ul>
																				</li>
																				<li><span><i class="icon  fa fa-bar-chart-o"></i> Chart </span>
																						<ul>
																								<li><a href="chartFlot.html"> Flot Chart</a></li>
										<li><a href="chartMorris.html"> Morris Chart</a></li>
										<li><a href="chartOther.html"> Other Chart</a></li>
																						</ul>
																				</li>
																				<li><a href="calendar.html"><i class="icon  fa fa-calendar-o"></i> Calendar </a></li>
																				<li><span><i class="icon  fa fa-align-right"></i> Off  Canvas  Menu</span>
																						<ul>
																								<li><a href="menu.html"> Position </a></li>
																								<li><a href="menuOpen.html"> Touch to open</a></li>
																								<li><a href="menuVertical.html"> Vertical Level</a></li>
																								<li><span> Unlimited Level </span>
																										<ul>
																												<li><a href="#"> Level 3 </a></li>
																												<li><a href="#"> Level 3 </a></li>
																												<li><span> Level 4</span>
																														<ul>
																																<li><a href="#"> Level 4 </a></li>
																																<li><a href="#"> Level 4 </a></li>
																														</ul>
																												</li>
																										</ul>
																								</li>
																						</ul>
																				</li>
																				<li><span><i class="icon  fa fa-clipboard"></i> From</span>
																						<ul>
																								<li><a href="form.html">Form Basic</a></li>
																								<li><a href="formComponents.html">Form Components</a></li>
																								<li><a href="formValidate.html">Form Validate</a></li>
																								<li><a href="formWizard.html">Form Wizard</a></li>
										<li><a href="formMutiselect.html">Form Mutiseletion</a></li>
										<li><a href="form_x_edit.html">Form x-edit</a></li>
										<li><a href="drop_upload.html">Drop Upload</a></li>
																						</ul>
																				</li>
																				<li><a href="fileManager.html"><i class="icon  fa fa-file-text"></i> File Manager </a></li>
																				<li><span><i class="icon  fa fa-fire"></i> Table</span>
																						<ul>
																								<li><a href="table.html">Table Basic</a></li>
																								<li><a href="tableResponsive.html">Table Responsive</a></li>
																								<li><a href="tableDynamic.html">Data Table</a></li>
																						</ul>
																				</li>
																				<li><span><i class="icon  fa fa-folder-open-o"></i> Other Page</span>
																						<ul>
																								<li><a href="login.html"> login </a></li>
																								<li><a href="lockscreen.html"> Lockscreen </a></li>
																								<li><a href="images_manager.html"> Images Manager</a></li>
																								<li><a href="gallery.html"> Gallery</a></li>
										<li><a href="timeline.html"> Timeline</a></li>
										<li><a href="profile.html"> Profile</a></li>
																								<li><a href="blankPage.html"> Blank Page</a></li>
										<li><a href="page_invoice.html"> Invoice</a></li>
										<li><a href="page_search.html"> Search result</a></li>
										<li><a href="pages_pricing.html"> Pricing Table</a></li>
										<li><a href="register.html"> Register</a></li>
										<li><a href="page_chat.html"> Full Chat</a></li>
																						</ul>
																				</li>
																				<li><a href="map.html"><i class="icon  fa fa-map-marker"></i> Maps</a></li>
																				<li><a href="404.html"><i class="icon  fa fa-exclamation-triangle"></i> Error Pages</a></li>
																				<li><a href="siteMap.html"><i class="icon  fa fa-sitemap"></i> Site Map</a></li>
																			</ul>
																		</div>
																</div>
																
																<div class="col-sm-6">
																		<h4> Folder view</h4>
																		<hr>
																		<ul id="browser" class="filetree">
																				<li><span class="folder"> Folder 1</span>
																						<ul>
																								<li><span class="file"> Item 1.1</span></li>
																						</ul>
																				</li>
																				<li><span class="folder"> Folder 2</span>
																						<ul>
																								<li><span class="folder"> Subfolder 2.1</span>
																										<ul id="folder21">
																												<li><span class="file"> File 2.1.1</span></li>
																												<li><span class="file"> File 2.1.2</span></li>
																										</ul>
																								</li>
																								<li><span class="file"> File 2.2</span></li>
																						</ul>
																				</li>
																				<li class="closed"><span class="folder"> Folder 3 (closed at start)</span>
																						<ul>
																								<li><span class="file"> File 3.1</span></li>
																						</ul>
																				</li>
																				<li><span class="file"> File 4</span></li>
																		</ul>
	
																</div>
																
																
														</div>
												</div>
										</section>
										<!-- //panel tools-->
								</div>
								<!-- //content > row > col-lg-12 -->
								
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
		<div id="md-messages" class="modal fade md-slideUp bg-theme-inverse" tabindex="-1" data-width="450">
				<div class="modal-header bd-theme-inverse-darken">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h4 class="modal-title"><i class="fa fa-inbox"></i> Inbox messages</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body" style="padding:0">
						<div class="widget-im">
								<ul>
										<li>
												<section  class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<i class="fa fa-paperclip"></i>
																</span>
																<span>
																		<i class="fa fa-reply-all"></i>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
																</span>
																<span>
																		<time datetime="2013-11-16">1 : 52 am</time>
																</span>
														</div>
														<h4><a href="javascript:void(0)">Edlado Holder</a>
														</h4>
														<div class="im-thumbnail"><img alt="" src="assets/img/avatar2.png" /></div>
														<label></label>
														<div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
														</div>
												</div>
										</li>
										<li>
												<section  class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<i class="fa fa-paperclip"></i>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
																</span>
																<span>
																		<time datetime="2013-11-16">12 : 00 pm</time>
																</span>
														</div>
														<h4><a href="javascript:void(0)">Laine Franchi</a>
														</h4>
														<div class="im-thumbnail"><i class="glyphicon glyphicon-user"></i></div>
														<div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
																</span>
																<span>
																		<time datetime="2013-11-16">4 : 45 pm</time>
																</span>
														</div>
														<h4><a href="javascript:void(0)">Cinda Collar</a>
														</h4>
														<div class="im-thumbnail"><img alt="" src="assets/img/avatar.png" /></div>
														<label data-color="theme"></label>
														<div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
														</div>
												</div>
										</li>
								</ul>
								<button class="btn btn-inverse btn-block btn-lg" title="See More"><i class="fa fa-plus"></i></button>
						</div>
						<!-- //widget-im-->
				</div>
				<!-- //modal-body-->
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
		
		
		
	
		
		
</div>
<!-- //wrapper-->


<!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->
		
<!-- Jquery Library -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.ui.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- Modernizr Library For HTML5 And CSS3 -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/plugins/mmenu/jquery.mmenu.js"></script>
<script type="text/javascript" src="assets/js/styleswitch.js"></script>
<!-- Library 10+ Form plugins-->
<script type="text/javascript" src="assets/plugins/form/form.js"></script>
<!-- Datetime plugins -->
<script type="text/javascript" src="assets/plugins/datetime/datetime.js"></script>
<!-- Library Chart-->
<script type="text/javascript" src="assets/plugins/chart/chart.js"></script>
<!-- Library  5+ plugins for bootstrap -->
<script type="text/javascript" src="assets/plugins/pluginsForBS/pluginsForBS.js"></script>
<!-- Library 10+ miscellaneous plugins -->
<script type="text/javascript" src="assets/plugins/miscellaneous/miscellaneous.js"></script>
<!-- Library Themes Customize-->
<script type="text/javascript" src="assets/js/caplet.custom.js"></script>
<script type="text/javascript">
	$(function() {
			   
			$("#sitemap").treeview({
				control: "#sitemapcontrol",
				persist: "cookie",
				cookieId: "treeview-black"
			});
			
			$("#browser").treeview();
	});
</script>
</body>
</html>