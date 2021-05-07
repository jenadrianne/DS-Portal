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
	                <div class="w3-quarter" style="margin-top: 100px">
	                    <center>
	                        <img src ="studentAssets/img/111.png" height ="80px" width="80px" class = "task_btn" id = "btn1">
	                        <img src ="studentAssets/img/112.png" height ="80px" width="80px" class = "task_btn" id = "btn2">
	                        <img src ="studentAssets/img/113.png" height ="80px" width="80px" class = "task_btn" id = "btn4">
	                        <img src ="studentAssets/img/115.png" height ="80px" width="80px" class = "task_btn" id = "btn5">

	                    </center>
	                </div>
	                <div class="w3-quarter">
	                    <center>
	                        <img src ="studentAssets/img/0111.png" height ="150px" width="250px" class = "taskName">
	                        <img src ="studentAssets/img/0112.png" height ="150px" width="250px" class = "taskName">
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
                                    $result = mysqli_query($mysqli,"SELECT a.activity_id, a.activity_name, a.activity_venue, a.activity_date, a.activity_start, a.activity_end, a.activity_image FROM activity a, ces c WHERE a.activity_id = c.activity_id");

                                        if($result){
                                          while($row = mysqli_fetch_array($result)){
                                                echo "<article class='photography webdesign'>"; 
                                                echo "<figure> <img src='uploaded_image/".$row[6]."' class='img-responsive' id = 'img-CES'>";
                                                echo "<figcaption>";
                                                echo  "<div class='info'>";
                                                echo "<h3>".$row[2]."</h3>";
                                                echo "<p> DATE:".$row[4]." </p>";
                                                echo "<p> TIME:".$row[5]."-".$row[6]." </p>";
                                                echo "<p> DESCRIPTION:".$row[1]."</p>";
                                                echo "</div>";
                                                echo " <button class='btn btn-add'data-toggle='modal' data-target='#modalSignIn'  data-id='".$row[0]."' class='open-AddBookDialog btn'  title='Register'>REGISTER</button>";
                                                echo "<div class='link'>";
                                                echo "<a href='uploaded_image/".$row[6]."'  rel='preview'><i class='fa fa-plus'></i></a>
                                                        </div>";

                                                echo "</figcaption></figure></article>";
                                                }
                                        }
                                ?>
                        </section>
	                </div>
	            </div>




	            <div id = "requestTutorial"  style="background-color: white; height: 700px;">
	                <p class ="taskHeader" align="center">REQUEST TUTORIAL</p>
	              <div id="wrap">

	                        	<?php
        							$result = mysqli_query($mysqli, "SELECT p.person_id ,CONCAT(p.person_lastname, ' ', p.person_firstname) , p.person_schoolId, s.student_course, m.memfee_status, m.amtPaid , m.date FROM person p JOIN student s ON p.person_schoolId = s.person_id JOIN memfee m on m.student_id = p.person_schoolId WHERE p.person_schoolId = 16101810");

        							if($result){
										while($row = mysqli_fetch_array($result)){
											
											
											
												echo "<div class = 'col-sm-6 col-sm-offset-1 form-group' style='margin-top: 200px; size: 20px; padding-left:-100px;'>";
												echo "<label class = 'control-label'><h1 style='font-size:350%;''><strong>";
												echo "<p align = 'left'>HAPPY TO CATER YOUR NEEEDS. ";
												echo "SUBMIT YOUR REQUEST NOW.</strong></h1></label> <br><br> ";

												echo "<button type='button' title='Delete' data-toggle='modal' data-target='#modalRequest'  data-id='".$row[0]."' class='open-AddBookDialog btn' style='margin-right: 5px; background-color: rgb(155, 183, 190); border-color: rgb(155, 183, 190); color: rgb(255, 255, 255);'>REGISTER</button>";
												echo "</div>";
											
												echo "<div class = 'col-sm-4' style='margin-top: 100px; size: 20px; '><img src = 'front/assets/img/request.png' height = '400px'></div>";
												

										}
									}

	                        	?>
	                </div>
	            </div>


				<div id = "memStatus" style="background-color: white; height: 700px;">
	                <p class ="taskHeader" align="center">MEMBERSHIP FEE STATUS</p>

	                <div id="wrap">

	                        	<?php
        							$result = mysqli_query($mysqli, "SELECT CONCAT(p.person_lastname, ' ', p.person_firstname) , p.person_schoolId, s.student_course, m.memfee_status, m.amtPaid , m.date FROM person p JOIN student s ON p.person_schoolId = s.person_id JOIN memfee m on m.student_id = p.person_schoolId WHERE p.person_schoolId = 16101810");

        							if($result){
										while($row = mysqli_fetch_array($result)){
											if($row[3] == "paid"){

											
												echo "<div class = 'col-sm-4 col-sm-offset-1'><img src = 'front/assets/img/check1.png'></div>";
												echo "<div class = 'col-sm-6 col-sm-offset-1 form-group' style='margin-top: 220px; size: 20px; padding-left:-100px; '>";
											echo "<label class = 'control-label'><h1><strong>".$row[0]."<h1></strong></label>";
												echo "<label class = 'control-label'><h2><strong>".$row[1]."</h2></strong></label><br>";
												echo "<label class = 'control-label'><h2>".$row[2]."<h2></label>";
												echo "<label class = 'control-label'><h2><span>&#8369;</span> ".$row[4]."</h2></label><br>";
												echo "<label class = 'control-label'><h2>".$row[5]."</h2></label>";
												echo "</div></div>";

											}else{
												echo "<div class = 'col-sm-4' style='margin-top: 100px; size: 20px; '><img src = 'front/assets/img/unpaid.png' height = '400px'></div>";
												echo "<div class = 'col-sm-6 col-sm-offset-1 form-group' style='margin-top: 200px; size: 20px; padding-left:-100px;'>";
												echo "<label class = 'control-label'><h1 style='font-size:500%;''><strong>";
												echo "HAVEN'T PAID, <br>";
												echo "PLEASE SETTLE YOUR DUES BEFORE</strong></h1></label> ";
												echo "</div>";
											}

										}
									}

	                        	?>
	                </div>
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
        <div class="modal fade" id="modalSignIn" data-backdrop="true">
            
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
                                    <input type="text" name="sid" class="form-control" required pattern="[0-9]{8}">                         
                                </div>
                            </div>



                            <div class="form-group offset">
                                <div>
                                        <input type="submit" value="Submit" class = "btn">
                                        <button type="reset" class="btn" style = "background-color: gray;">Cancel</button>
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
                                    <input type="text" name="sid" class="form-control" required pattern="[0-9]{8}">                         
                                </div>
                            </div>



                            <div class="form-group offset">
                                <div>
                                        <input type="submit" value="Submit" class = "btn">
                                        <button type="reset" class="btn" style = "background-color: gray;">Cancel</button>
                                </div>
                            </div>
                         </form>
                     </div> 
                </div>     
            </div> 
        </div>
    <!-------------------------------- end of modal------------------------------------------------>


	<!---------------------------------- MODAL FOR REQUEST---------------------------------------------->
        <div class="modal fade" id="modalRequest" data-backdrop="true">
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    
                </div>
                <div class="modal-body">
                    <div class="panel-body">

                       <form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="student_cRegAct.php" method="POST" enctype="multipart/form-data">
                           
                               
                            <div class="form-group">
                                <label class="control-label">ID NUMBER: </label>
                                <div>
                                    <input type="text" name="sid" class="form-control" required pattern="[0-9]{8}">                         
                                </div>
                            </div>

                            
							<div class="form-group">												
								<?php 
								 echo '<select  class="selectpicker form-control" data-size="10" data-live-search="true" id="schoolyear" name="scode" >';
								
								 $result = mysqli_query($mysqli, "SELECT `subject_id`, `subject_code` FROM `subject` WHERE 1");
									 
									 if($result){
						                  while($row = mysqli_fetch_array($result)){
						                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
						                   
						                  }
						             }
									
								 echo '</select>';
								?>
							</div>

                            
                            <div class="form-group offset">
                                <div>
                                        <input type="submit" value="Submit" class = "btn" >
                                        <button type="reset" class="btn" style = "background-color: gray;">Cancel</button>
                                </div>
                            </div>
                         </form>
                     </div> 
                </div>     
            </div> 
        </div>
    <!-------------------------------- end of modal------------------------------------------------>


</div>
<?php 
  include("student_vFooter.php");
?>
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

<!----------------------------------------------TAB TRANSITION-------------------------------->
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


<!-------------------------------------------IMAGE EFFECT------------------------------------>
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


<!-------------------------------------------------------------CALENDAR-------------------------------->
<script type="text/javascript">
	$.getScript('http://arshaw.com/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js',function(){
  
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();
  
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
    events: [
      {
        title: 'All Day Event',
        start: new Date(y, m, 1)
      },
      {
        title: 'Long Event',
        start: new Date(y, m, d-5),
        end: new Date(y, m, d-2)
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: new Date(y, m, d-3, 16, 0),
        allDay: false
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: new Date(y, m, d+4, 16, 0),
        allDay: false
      },
      {
        title: 'Meeting',
        start: new Date(y, m, d, 10, 30),
        allDay: false
      },
      {
        title: 'Lunch',
        start: new Date(y, m, d, 12, 0),
        end: new Date(y, m, d, 14, 0),
        allDay: false
      },
      {
        title: 'Birthday Party',
        start: new Date(y, m, d+1, 19, 0),
        end: new Date(y, m, d+1, 22, 30),
        allDay: false
      },
      {
        title: 'Click for Google',
        start: new Date(y, m, 28),
        end: new Date(y, m, 29),
        url: 'http://google.com/'
      }
    ]
  });
})

</script>
</body>
</html>


<script>
	$(document).on("click", ".open-AddBookDialog", function () {
     	var myBookId = $(this).data('id');
     	$(".modal-body #bookId").val( myBookId );
	});
</script>