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
				<div class="tabbable">
						<ul class="nav nav-tabs" data-provide="tabdrop">
								<li><a href="#" class="change" data-change="prev"><i class="fa fa-chevron-left"></i></a></li>
								<li><a href="#" class="change" data-change="next"><i class="fa fa-chevron-right"></i></a></li>
								<li class="active"><a href="#" data-view="month" data-toggle="tab" class="change-view">Month</a></li>
								<li><a href="#" data-view="agendaWeek" data-toggle="tab" class="change-view">Week</a></li>
								<li><a href="#" data-view="agendaDay" data-toggle="tab" class="change-view">Day</a></li>
								<li><a href="#" class="change-today">Today</a></li>
						</ul>
						<div class="tab-content">
								<div class="row">
								
										<div class="col-lg-8" >
												<div id="calendar"></div>
										</div>
										<!-- //content > row > col-lg-8 -->
										
										<div class="col-lg-4">
												<div id="external-events">
														<h3><strong>EVENTS</strong> Draggable </h3>
														<hr>
														<span class="external-event label bg-warning">Recognition dinners</span>
														<span class="external-event label bg-theme">Book discussions</span>
														<span class="external-event label bg-inverse">Fashion shows</span>
														<span class="external-event label bg-info">Exhibitions and fairs</span>
														<span class="external-event label bg-theme-inverse">Historic building tours</span>
														<span class="external-event label bg-primary">Dances</span>
														<span class="external-event label bg-purple">Fashion shows</span>
														<span class="external-event label bg-green">Exhibitions and fairs</span>
														<span class="external-event label bg-palevioletred">Guided walks</span>
												</div>
												<hr>
														<a class="btn btn-inverse" data-toggle="modal" href="#md-add-event"><i class="fa fa-plus"></i></a>
														<button class="btn btn-inverse slide-trash"><i class="fa fa-trash-o"></i></button>
										</div>
										<!-- //content > row > col-lg-4 -->
										
								</div>
								<!-- //content > row-->
						</div>
						<!-- //tab-content -->
				</div>
				<!-- //tabbable -->
				

		</div>
		<!-- //main-->
		
								<div id="slide-trash">
									<section><i class=" fa fa-trash-o"></i><span>Drop here to detele</span></section>
								</div>
								
		<!--
		///////////////////////////////////////////////////////////////////
		//////////     MODAL MESSAGES     //////////
		///////////////////////////////////////////////////////////////
		-->
		<div id="md-add-event" class="modal fade md-slideUp" tabindex="-1" data-width="450"  data-header-color="inverse">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add new events</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body" style="padding-bottom:0">
						<form id="addEvent">
								<div class="form-group">
										<label class="control-label">Event title </label>
										<input type="text" class="form-control" id="event_title" name="event_title">
								</div>
								<div class="form-group">
										<label class="control-label">Color</label>
										<div class="input-group input-icon"><i class="fa fa-dot-circle-o ico"></i>
												<input type="text" class="form-control" id="color_select" name="color_select" />
												<span class="input-group-btn">
													<div class="btn-group">
															<button type="button" class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
																<i class="fa fa-fire"></i>
															</button>
															<ul class="dropdown-menu pull-right" role="menu" style="padding:0; border:0;">
																	<li>
																			<div id="colorpalette_events" data-return-color="#color_select"></div>
																	</li>
															</ul>
													</div><!-- //btn-group-->
												</span> <!-- //input-group-btn-->
										</div><!-- //input-group-->
								</div>
								<div class="form-group">
										<hr>
										<button type="submit" class="btn btn-theme">Submit Event</button>
										<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
								</div>
						</form>
				</div>
				<!-- //modal-body-->
		</div>
		<!-- //modal-->


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
		
		
		
		<!--
		//////////////////////////////////////////////////////////////
		//////////     LEFT NAV MENU     //////////
		///////////////////////////////////////////////////////////
		-->
		<nav id="menu">
				<ul>
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
						<li><span><i class="icon  fa fa-align-right"></i>Off  Canvas  Menu</span>
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
						<li><a href="siteMap.html"><i class="icon  fa fa-sitemap"></i>Site Map</a></li>
				</ul>
		</nav>
		<!-- //nav left menu-->
		
		
		
		<!--
		/////////////////////////////////////////////////////////////////
		//////////     RIGHT NAV MENU     //////////
		/////////////////////////////////////////////////////////////
		-->
		<nav id="menu-right">
				<ul>
						<li class="Label label-lg">Theme color</li>
						<li>
							<span class="text-center">
								<div id="style1" class="color-themes col1"></div>
								<div id="style2" class="color-themes col2" ></div>
								<div id="style3" class="color-themes col3" ></div>
								<div id="style4" class="color-themes col4" ></div>
								<div id="none" class="color-themes col5" ></div>
							</span>
						</li>
						<li class="Label label-lg">Contact Group</li>
						<li data-counter-color="theme">
								<span><i class="icon fa fa-smile-o"></i> Friends</span>
								<ul>
										<li class="Label">A</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Alexa 
														<small>Johnson</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Alexander 
														<small>Brown</small>
												</a>
										</li>
										<li class="Label">F</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/3.jpg" /> Fred
														<small>Smith</small>
												</a>
										</li>
										<li class="Label">J</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/4.jpg" /> James
														<small>Miller</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Jefferson
														<small>Jackson</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/6.jpg" /> Jordan
														<small>Lee</small>
												</a>
										</li>
										<li class="Label">K</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/7.jpg" /> Kim
														<small>Adams</small>
												</a>
										</li>
										<li class="Label">M</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/8.jpg" /> Meagan
														<small>Miller</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Melissa
														<small>Johnson</small>
												</a>
										</li>
										<li class="Label">N</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/10.jpg" /> Nicole
														<small>Smith</small>
												</a>
										</li>
										<li class="Label">S</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Samantha
														<small>Harris</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="block">
														<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Scott
														<small>Thompson</small>
												</a>
										</li>
								</ul>
						</li>
						<li>
								<span><i class="icon  fa fa-home"></i> Family</span>
								<ul>
										<li class="Label">A</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/3.jpg" /> Adam
														<small>White</small>
												</a>
										</li>
										<li class="Label">B</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/4.jpg" /> Ben
														<small>Robinson</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Bruce
														<small>Lee</small>
												</a>
										</li>
										<li class="Label">E</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/6.jpg" /> Eddie
														<small>Williams</small>
												</a>
										</li>
										<li class="Label">J</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/7.jpg" /> Jack
														<small>Johnson</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/8.jpg" /> John
														<small>Jackman</small>
												</a>
										</li>
										<li class="Label">M</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Martina
														<small>Thompson</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/10.jpg" /> Matthew
														<small>Watson</small>
												</a>
										</li>
										<li class="Label">O</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Olivia
														<small>Taylor</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Owen
														<small>Wilson</small>
												</a>
										</li>
								</ul>
						</li>
						<li data-counter-color="theme-inverse">
								<span><i class="icon  fa fa-briefcase"></i> Work colleagues</span>
								<ul>
										<li class="Label">D</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/3.jpg" /> David
														<small>Harris</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/4.jpg" /> Dennis
														<small>King</small>
												</a>
										</li>
										<li class="Label">E</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Eliza
														<small>Walker</small>
												</a>
										</li>
										<li class="Label">L</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/6.jpg" /> Larry
														<small>Turner</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/7.jpg" /> Lisa<br />
														<small>Wilson</small>
												</a>
										</li>
										<li class="Label">M</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/8.jpg" /> Michael
														<small>Jordan</small>
												</a>
										</li>
										<li class="Label">R</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Rachelle
														<small>Cooper</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/10.jpg" /> Rick
														<small>James</small>
												</a>
										</li>
								</ul>
						</li>
						<li class="Label label-lg">Total week Earnings</li>
						<li>
								<span><i class="icon  fa fa-bar-chart-o"></i> See This week</span>
								<ul>
										<li class="Label">themeforest</li>
										<li><span><i class="label label-warning pull-right">HTML</i> Earnings $395 </span></li>
										<li><span> Earnings $485 </span></li>
										<li><span><i class="label label-info pull-right">Wordpress</i> Earnings $1,589 </span></li>
										<li class="Label">codecanyon </li>
										<li><span><i class="label label-danger pull-right">Item 6537086</i> Earnings $897</span></li>
										<li><span>Sunday Earnings $395</span></li>
										<li class="Label">Other</li>
										<li><span><i class="label label-success  pull-right">up 35%</i> Total Earnings $5,025</span></li>
								</ul>
						</li>
						<li>
								<span>
									<div class="widget-mini-chart align-xs-right">
											<div class="pull-left">
													<div class="sparkline mini-chart" data-type="bar" data-color="warning" data-bar-width="10" data-height="45">2,3,7,5,4,6,6,3</div>
											</div>
											<p>This week Earnings</p>
											<h4>$11,987</h4>
									</div>
									<!-- //widget-mini-chart -->			
								</span>
						</li>
						<li class="Label label-lg">Processing </li>
						<li>
								<span>								
							<p>Server Processing</p>
									<div class="progress progress-dark progress-stripes progress-xs">
											<div class="progress-bar bg-danger" aria-valuetransitiongoal="37"></div>
									</div>
									<label class="progress-label">Today , CPU 37%</label>
									<!-- //progress-->
									<div class="progress progress-dark progress-xs">
											<div class="progress-bar bg-warning" aria-valuetransitiongoal="23"></div>
									</div>
									<label class="progress-label lasted">Today , Server load  22.85%</label>
									<!-- //progress-->
								</span>
						</li>
						<li class="Label label-lg">Quick Friends Chat </li>
						<li class="img">
								<a href="#" class="online">
										<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Olivia
										<small>Taylor</small>
								</a>
						</li>
						<li class="img">
								<a href="#" class="online">
										<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Owen
										<small>Wilson</small>
								</a>
						</li>
						<li class="img">
								<a href="#">
										<img alt="" src="assets/photos_preview/50/people/8.jpg" /> Meagan
										<small>Miller</small>
								</a>
						</li>
						<li class="img">
								<a href="#" class="busy">
										<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Melissa
										<small>Johnson</small>
								</a>
						</li>
						<li class="img">
								<a href="#" class="online">
										<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Samantha
										<small>Harris</small>
								</a>
						</li>
						<li class="Label label-lg">visitors Real Time</li>
						<li>
								<span>
									<div class="widget-chart">
											<div id="realtimeChart" class="demo-placeholder" style="height:150px"></div>
											<div id="realtimeChartCount" class="align-lg-center"><span>0</span> visitors on site </div>
									</div><!-- // widget-chart -->
								</span>
						</li>
				</ul>
		</nav>
		<!-- //nav right menu-->
		
		
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

<script src="assets/plugins/fullcalendar/fullcalendar.js"></script>
<link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" />
<!-- Library  5+ plugins for bootstrap -->
<script type="text/javascript" src="assets/plugins/pluginsForBS/pluginsForBS.js"></script>
<!-- Library 10+ miscellaneous plugins -->
<script type="text/javascript" src="assets/plugins/miscellaneous/miscellaneous.js"></script>
<!-- Library Themes Customize-->
<script type="text/javascript" src="assets/js/caplet.custom.js"></script>
<script>
	$(document).ready(function() {	

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$("#addEvent").submit(function(event){
			event.preventDefault();
			if($("#event_title").val()){
				var events=$('<span class="external-event  label" data-color="'+$("#color_select").val()+'">'+$("#event_title").val() +'</span>');
				events.css({'background-color': $("#color_select").val() || "#CCC" , 'margin-right': "3px"});
				$("#external-events").append(events);
				$("#external-events span.external-event").draggable({
					zIndex: 999,
					revert: true,     
					revertDuration: 0 ,
					drag: function() { $("#slide-trash").addClass("active") },
					stop: function() { $("#slide-trash").removeClass("active") }
				});
				$(this)[0].reset();
				$('#md-add-event').modal('hide');
			}else{
				$.notific8('Please enter <strong>event  title</strong> ',{ life:5000, theme:"danger" ,heading:"ERROR :);" });
				$("#event_title").focus();
			}
		});
		$('#external-events span.external-event').draggable({
				zIndex: 999,
				revert: true,     
				revertDuration: 0 ,
				drag: function() { $("#slide-trash").addClass("active") },
				stop: function() { $("#slide-trash").removeClass("active") }
		});
		
	    $( "#slide-trash" ).droppable({
		 accept: "#external-events span.external-event , .fc-event",
		 hoverClass: "active-hover",
		 drop: function( event, ui ) {
			 ui.draggable.remove();
			 $(this).removeClass( "active" );
		 }
	    });
		var isElemOverDiv = function(draggedItem, dropArea) {
			// Prep coords for our two elements
			var a = $(draggedItem).offset;	
			a.right = $(draggedItem).outerWidth + a.left;
			a.bottom = $(draggedItem).outerHeight + a.top;
			
			var b = $(dropArea).offset;
			a.right = $(dropArea).outerWidth + b.left;
			a.bottom = $(dropArea).outerHeight + b.top;
		
			// Compare
			if (a.left >= b.left
				&& a.top >= b.top
				&& a.right <= b.right
				&& a.bottom <= b.bottom) { return true; }
			return false;
		}
		$('#calendar').fullCalendar({
/*			    eventClick: function(calEvent, jsEvent, view) {
			
				  alert('Event: ' + calEvent._id);
				  alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
				  alert('View: ' + view.name);
				$(this).fullCalendar('removeEvents',calEvent._id);
				  // change the border color just for fun
				//  $(this).css('border-color', 'red');
			
			    },*/
			eventDragStop: function(event, jsEvent, ui, view) {			
				var x = isElemOverDiv(ui, $('#slide-trash'));
				alert(x);			
				if (x) {
					alert("delete");
					$('#calendar').fullCalendar('removeEvents', event.id);
				}			
			},
			header: {
				left: 'title',
				center: '',
				right: ''
			},
			editable: true,
			droppable: true, 
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1),
					end: new Date(y, m, 2),
					color:"#f37864"
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-10),
					end: new Date(y, m, d-7),
					color:"#1bc6b0"
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					color:"#7ace30"
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d-5, 19, 0),
					end: new Date(y, m, d-4, 22, 30),
					allDay: false,
					color:"#ffcc33"
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 15),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					color:"#62707d"
				}
			],
			drop: function(date, allDay) { 
                        var  copiedEventObject = {
                                title: $(this).text(),
                                start: date,
                                allDay: allDay,
                                color: $(this).css('background-color')
                            };
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				$(this).remove();
			}
		});
		$(".change-view").click(function(){
			 var data=$(this).data();
			$('#calendar').fullCalendar( 'changeView', data.view ); 
		});
		$(".change-today").click(function(){
			$('#calendar').fullCalendar( 'today' );
		});
		$(".change").click(function(){
			  var data=$(this).data();
			$('#calendar').fullCalendar( data.change );
		});
		
	});

</script>
</body>
</html>