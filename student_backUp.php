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

<?php 
  include("student_vHeader.php");
  include("student_vBanner.php");
?>

									
		<!----- main content------>

		 <div class = "top" >
			  <div class = "customDiv">
	            <div class="w3-row w3-border">
	                <div class="w3-quarter">
	                    <center>
	                        <img src ="studentAssets/img/111.png" height ="80px" width="80px" class = "task_btn" id = "btn1">
	                        <img src ="studentAssets/img/112.png" height ="80px" width="80px" class = "task_btn" id = "btn2">
	                        <img src ="studentAssets/img/114.png" height ="80px" width="80px" class = "task_btn" id = "btn3">
	                        <img src ="studentAssets/img/113.png" height ="80px" width="80px" class = "task_btn" id = "btn4">
	                        <img src ="studentAssets/img/115.png" height ="80px" width="80px" class = "task_btn" id = "btn5">

	                    </center>
	                </div>
	                <div class="w3-quarter">
	                    <center>
	                        <img src ="studentAssets/img/0111.png" height ="150px" width="250px" class = "taskName">
	                        <img src ="studentAssets/img/0112.png" height ="150px" width="250px" class = "taskName">
	                        <img src ="studentAssets/img/0113.png" height ="150px" width="250px" class = "taskName">
	                        <img src ="studentAssets/img/0114.png" height ="150px" width="250px" class = "taskName">
	                        <img src ="studentAssets/img/0115.png" height ="150px" width="250px" class = "taskName">

	                    </center>
	                </div>
	                
	            </div>
	           <!-- <hr color="#141c27">-->



	            <div id = "viewTutorialSessions">
	                <p class ="taskHeader" align="center">VIEW TUTORIAL SESSIONS</p>

	                <div id="wrap">
	                        <section id="portfolio" class="mosaic mosaic-5 clearfix"> 
	                                <?php 
	                                    $result = mysqli_query($mysqli,"SELECT a.activity_id, c.ces_description, a.activity_name, a.activity_venue, a.activity_date, a.activity_start, a.activity_end, a.activity_image FROM activity a, ces c WHERE a.activity_id = c.activity_id");

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
	                                                echo " <button class='btn btn-add'data-toggle='modal' data-target='#modalSignIn'  data-id='".$row[0]."' class='open-AddBookDialog btn'  title='Register'>REGISTER</button>";
	                                                echo "<div class='link'>";
	                                                echo "<a href='uploaded_image/".$row[7]."'  rel='preview'><i class='fa fa-plus'></i></a>
	                                                        </div>";

	                                                echo "</figcaption></figure></article>";
	                                                }
	                                        }
	                                ?>
	                        </section>
	                </div>
	            </div>




	            <div id = "requestTutorial">
	                <p class ="taskHeader" align="center">REQUEST TUTORIAL</p>
	                <br>
	                <div class="col-sm-2">
							<section class="panel corner-flip hidden">

							</section>		
					</div>
					<div class="col-sm-8" id = "box">
						<header class="panel-heading no-borders">
						
						</header>
							<div class="form-group">
								<label class="control-label">Subject Code</label>
								<div>
									<input type="text" name="actname" class="form-control">	
								</div>
							</div>
						
					</div>
					<div class="col-sm-2">
						<section class="panel corner-flip hidden">

						</section>		
					</div>
	            </div>



	            <div id = "memStatus">
	                <p class ="taskHeader" align="center">MEMBERSHIP FEE STATUS</p>
	               	<br>
					<div class="col-sm-3">
						<section class="panel corner-flip hidden">
									
						</section>		
					</div>
					<div class="col-sm-6" id = "box">
							<section class="panel corner-flip">
								<header class="panel-heading no-borders">
									<h3><strong>Receipt</strong></h3>
									<!--<label class="color"> <strong>Real-time  update ( 5 sec)</strong></label>-->
									
									<p align = "right">Date: Jan 22, 2017 </p>
									<p align = "right">ID#: 14104561 </p>
									Christine Diane Malazarte 
									<br>
									BSIT-3
								</header>	

							</section>		
					</div>
					<div class="col-sm-3">
						<section class="panel corner-flip hidden">

						</section>		
					</div>

	            </div> 




	            <div id = "registeredAct">
	                <p class ="taskHeader" align="center">REGISTERED ACTIVITIES</p>

	        			
	            </div>





	            <div id = "viewCES">
	                <p class ="taskHeader" align="center">VIEW CES ACTIVITIES</p>
	                <div id="wrap">
	                       <section id="portfolio" class="mosaic mosaic-5 clearfix">
	                                
	                                
	                                <?php 
	                                    $result = mysqli_query($mysqli,"SELECT a.activity_id, c.ces_description, a.activity_name, a.activity_venue, a.activity_date, a.activity_start, a.activity_end, a.activity_image FROM activity a, ces c WHERE a.activity_id = c.activity_id");

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
	                                                echo " <button class='btn btn-add'data-toggle='modal' data-target='#modalSignIn'  data-id='".$row[0]."' class='open-AddBookDialog btn'  title='Register'>REGISTER</button>";
	                                                echo "<div class='link'>";
	                                                echo "<a href='uploaded_image/".$row[7]."'  rel='preview'><i class='fa fa-plus'></i></a>
	                                                        </div>";

	                                                echo "</figcaption></figure></article>";
	                                                }
	                                        }
	                                ?>
	                        </section>  
	                </div>
            </div> <!--end of viewCES-->
          
        </div><!--END OF CUSTOMDIV-->

	</div><!--END OF TOP-->


	<!---------------------------------- MODAL FOR CES ACTIVITIES ---------------------------------------------->
        <div class="modal fade" id="modalSignIn" data-backdrop="false">
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    
                </div>
                <div class="modal-body">
                    <div class="panel-body">

                        <form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="student_activityRegistration.php" method="POST" enctype="multipart/form-data">
                            <input type="text" name="aid" id="bookId" value="bookId" />
                               
                            <div class="form-group">
                                <label class="control-label">ID NUMBER: </label>
                                <div>
                                    <input type="text" name="sid" class="form-control">                         
                                </div>
                            </div>



                            <div class="form-group offset">
                                <div>
                                        <input type="submit" value="Submit" >
                                        <button type="reset" class="btn">Cancel</button>
                                </div>
                            </div>
                         </form>
                     </div> 
                </div>     
            </div> 
        </div>
    <!-------------------------------- end of modal------------------------------------------------>


    <!---------------------------------- MODAL FOR TUTORIALS  ---------------------------------------------->
        <div class="modal fade" id="modalSignIn" data-backdrop="false">
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    
                </div>
                <div class="modal-body">
                    <div class="panel-body">

                        <form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="student_activityRegistration.php" method="POST" enctype="multipart/form-data">
                            <input type="text" name="aid" id="bookId" value="bookId" />
                               
                            <div class="form-group">
                                <label class="control-label">ID NUMBER: </label>
                                <div>
                                    <input type="text" name="sid" class="form-control">                         
                                </div>
                            </div>



                            <div class="form-group offset">
                                <div>
                                        <input type="submit" value="Submit" >
                                        <button type="reset" class="btn">Cancel</button>
                                </div>
                            </div>
                         </form>
                     </div> 
                </div>     
            </div> 
        </div>
    <!-------------------------------- end of modal------------------------------------------------>

<?php 
  include("student_vFooter.php");
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
<script type="text/javascript" src="front/assets/plugins/selectnav/selectnav.min.js"></script>
<!-- Fancybox plugin -->
<script type="text/javascript" src="front/assets/plugins/fancybox/jquery.fancybox.js"></script>	
<link href="front/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
<!-- Library Themes Customize-->
<script type="text/javascript" src="front/assets/js/caplet.custom.js"></script>
<script type="text/javascript">
var revapi;
$(document).ready(function() {
	   revapi = $('.tp-banner').revolution({
			delay:9000,
			startwidth:1170,
			startheight:500,
			hideThumbs:10,
			lazyLoad:"on",
			onHoverStop:"off",
			fullWidth:"on",
			forceFullWidth:"on"
		});
});	//ready
</script>



<script>
    $(document).ready(function(){
        $("#btn1").click(function(){
            $("#requestTutorial").slideUp("slow");
            $("#registeredAct").slideUp("slow");
            $("#viewCES").slideUp("slow");
            $("#memStatus").slideUp("slow");
            $("#viewTutorialSessions").slideDown("slow");

        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#btn2").click(function(){
            $("#viewTutorialSessions").slideUp("slow");
            $("#registeredAct").slideUp("slow");
            $("#viewCES").slideUp("slow");
            $("#memStatus").slideUp("slow");
            $("#requestTutorial").slideDown("slow");
        });
    });

</script>

<script>
    $(document).ready(function(){
        $("#btn3").click(function(){
            $("#viewTutorialSessions").slideUp("slow");
            $("#requestTutorial").slideUp("slow");
            $("#viewCES").slideUp("slow");
            $("#memStatus").slideUp("slow");
            $("#registeredAct").slideDown("slow");
        });
    });

</script>

<script>
    $(document).ready(function(){
        $("#btn4").click(function(){
            $("#viewTutorialSessions").slideUp("slow");
            $("#requestTutorial").slideUp("slow");
            $("#registeredAct").slideUp("slow");
            $("#memStatus").slideUp("slow");
            $("#viewCES").slideDown("slow");
        });
    });

</script>

<script>
    $(document).ready(function(){
        $("#btn5").click(function(){
            $("#viewTutorialSessions").slideUp("slow");
            $("#registeredAct").slideUp("slow");
            $("#viewCES").slideUp("slow");
            $("#requestTutorial").slideUp("slow");
            $("#memStatus").slideDown("slow");
        });
    });

</script>

<script>
    $("document").ready(function(){
        $('#btn1').click(function(){
            $('html, body').animate({
                scrollTop: $("#viewTutorialSessions").offset().top
            }, 1000);
        });
     
    });
    
</script>

<script>
    $("document").ready(function(){
        $('#btn2').click(function(){
            $('html, body').animate({
                scrollTop: $("#requestTutorial").offset().top
            }, 1000);
        });
     
    });
    
</script>

<script>
    $("document").ready(function(){
        $('#btn3').click(function(){
            $('html, body').animate({
                scrollTop: $("#registeredAct").offset().top
            }, 1000);
        });
     
    });
    
</script>

<script>
    $("document").ready(function(){
        $('#btn4').click(function(){
            $('html, body').animate({
                scrollTop: $("#viewCES").offset().top
            }, 1000);
        });
     
    });
    
</script>

<script>
    $("document").ready(function(){
        $('#btn5').click(function(){
            $('html, body').animate({
                scrollTop: $("#memStatus").offset().top
            }, 1000);
        });
     
    });
    
</script>

<script>
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