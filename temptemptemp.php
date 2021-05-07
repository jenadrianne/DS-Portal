<html lang="en">
<head>

<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- Title-->
<title>CAPLET |  Admin HTML Themes</title>

<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/ico/favicon.ico">

<!-- CSS Stylesheet-->
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet" href="assets/css/style.css" />

<!-- Styleswitch if  you don't chang theme , you can delete -->
<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="assets/css/styleTheme1.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="assets/css/styleTheme2.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="assets/css/styleTheme3.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="assets/css/styleTheme4.css" />

</head>
<body>



<section class="panel">
												<header class="panel-heading">
														<h2><strong>Date</strong> & Times </h2>
														<label class="color">Tags Input Bootstrap</label>
												</header>
												<div class="panel-tools fully color" align="right" data-toolscolor="theme-inverse">
														<ul class="tooltip-area">
																<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
																<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
																<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
														</ul>
												</div>
												<div class="panel-body">
														<form class="form-horizontal" data-collabel="4" data-label="color">
																<div class="form-group">
																		<label class="control-label">Date [inline] </label>
																		<div>
																				<div id="dateinline" data-provide="datetimepicker-inline" ></div>
																		</div>
																</div><!-- //form-group-->
																
																<div class="form-group">
																		<label class="control-label">Date input [component] </label>
																		<div>
																				<div class="row">
																						<div class="input-group date form_datetime col-lg-12" data-picker-position="bottom-left"  data-date-format="dd MM yyyy - HH:ii p" >
																								<input type="text" class="form-control">
																								<span class="input-group-btn">
																								<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
																								<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
																								</span>
																						</div>
																				</div>
																		</div>
																</div><!-- //form-group-->
																
																<div class="form-group">
																		<label class="control-label">Date range</label>
																		<div>
																				<div class="row">
																						<div class="col-lg-6">
																								<input type="text" class="form-control" id="daterange" />
																						</div>
																				</div>
																		</div>
																</div><!-- //form-group-->
																
																<div class="form-group">
																		<label class="control-label">Date range [advance] </label>
																		<div>
																				<div id="reportrange"  style="background: #97D4BB; color:#FFF; cursor: pointer; padding: 7px 10px; display:inline-block"><i class="fa fa-calendar"></i> <span></span></div>
																		</div>
																</div><!-- //form-group-->
																
														</form>
												</div><!-- //panel-body-->
												
										</section><!-- //panel-->

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
<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
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
	// Call CkEditor
	CKEDITOR.replace( 'editorCk', {
		startupFocus : false,
		uiColor: '#FFFFFF'
	});

</script>
	<script>
		//$(function() {
			   //  $("input#taginput").tagsinput();
			     $('input#taginputs').tagsinput();
		//});
	</script>
</body>
</html>
