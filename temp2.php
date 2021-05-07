<?php
	include("controllers/admin_cSqlConnect.php");

	session_start();
	if (!isset($_SESSION['loginuser'])){
	    header("Location: loginPage.php");
	}
?>

<?php 
  include("controllers/admin_cSqlConnect.php");
 
?>

<!DOCTYPE html>
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
<link type="text/css" rel="stylesheet" href="front/assets/css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="front/assets/css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet" href="front/assets/css/style2.css" />

<!-- Styleswitch if  you don't chang theme , you can delete -->
<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="assets/css/styleTheme1.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="assets/css/styleTheme2.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="assets/css/styleTheme3.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="assets/css/styleTheme4.css" />

</head>
<body>
<div id="wrap">
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     TOP SEARCH CONTENT     ///////
		//////////////////////////////////////////////////////////////////////
		-->
		
		<section class="section">
				<div class="container  text-center">
					<div class="col-md-12">
							<h3 class="sub-title animated fast" data-effect="fadeInUp">Amazing <em>" Caplet Theme "</em></h3>
							<h3 class="sub-title animated fast" data-effect="fadeInDown">This completed set  admin + front end system.</h3>
							<hr>
							
					</div>
				</div>
		</section>
		<section id="portfolio" class="mosaic mosaic-5 clearfix">
				



				<!--<article class=" photography webdesign">
						<figure> <img alt="" src="assets/photos_preview/portfolio/10.jpg" class="img-responsive " height="10px">
								<figcaption>
										<div class="info">
												<h3>Photo</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
										<div class="link">
											<a href="assets/photos_preview/portfolio/preview.jpg"  rel="preview"><i class="fa fa-plus"></i></a>
										</div>
								</figcaption>
						</figure>
				</article>-->
				
			    <?php 
					$result = mysqli_query($mysqli,"SELECT a.activity_id, c.ces_description, a.activity_name, a.activity_venue, a.activity_date, a.activity_start, a.activity_end, a.activity_image	FROM activity a, ces c WHERE a.activity_id = c.activity_id");

		                if($result){
		                  while($row = mysqli_fetch_array($result)){
		                  		echo "<article class='photography webdesign'>"; 
		                  		echo "<figure> <img src='uploaded_image/".$row[7]."' class='img-responsive' id = 'img-CES'>";
		                  		echo "<figcaption>";
		                  		echo  "<div class='info'>";
		                  		echo "<h3>".$row[2]."</h3>";
		                  		echo "<p> DATE:".$row[4]." </p>";
		                  		echo "<p> TIME:".$row[5]."-".$row[6]." </p>";
		                  		echo "<p> DESCRIPTION:".$row[1]."</p>";
		                  		echo "</div>";
		                  		echo " <button class='btn btn-xs btn-primary'>REGISTER</button>";
		                  		echo "<div class='link'>";
		                  		echo "<a href='uploaded_image/".$row[7]."'  rel='preview'><i class='fa fa-plus'></i></a>
										</div>";

								echo "</figcaption></figure></article>";
		          			    }
		          		}
				?>
		
		
</div>

<!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->
		
<!-- Jquery Library -->
<script type="text/javascript" src="front/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="front/assets/js/jquery.ui.min.js"></script>
<script type="text/javascript" src="front/assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- Modernizr Library For HTML5 And CSS3 -->
<script type="text/javascript" src="front/assets/js/modernizr/modernizr.js"></script>
<!-- Owl Carousel  -->
<script type="text/javascript" src="front/assets/plugins/owl-carousel/owl.carousel.js"></script>
<link href="front/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="front/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
<link href="front/assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
<!-- Revolution Slide -->
<script type="text/javascript" src="front/assets/plugins/slide/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="front/assets/plugins/slide/js/jquery.themepunch.revolution.min.js"></script>
<link rel="stylesheet" type="text/css" href="front/assets/plugins/slide/css/settings.css" media="screen" />
<!-- Select Nav -->
<script type="text/javascript" src="assets/plugins/selectnav/selectnav.min.js"></script>
<!-- Fancybox plugin -->
<script type="text/javascript" src="front/assets/plugins/fancybox/jquery.fancybox.js"></script>	
<link href="front/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
<!-- Library Themes Customize-->
<script type="text/javascript" src="front/assets/js/caplet.custom.js"></script>
<script type="text/javascript" src="front/assets/plugins/isotope/isotope.js"></script>	
<script type="text/javascript">
	$(function() {

	// Initialize box isotope 
        var $container= $('.mosaic');
        var $filter= $('.portfolio-filter');

	$container.isotope({
			filter : '*',
			layoutMode : 'fitRows',
			animationOptions : {  duration : 750, easing : 'linear' }
	}); 
        $filter.find('a').click(function() {
				var selector = $(this).attr('data-filter');
				$filter.find('a').removeClass('active');
				$(this).addClass('active');
				$container.isotope({ 
					filter: selector,
					animationOptions   : { animationDuration  : 750, easing: 'linear',   queue: false  }
				});
				return false;
        }); 
	}); 

</script>
</body>
</html>