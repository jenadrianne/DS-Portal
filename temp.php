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
<html>


<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet" href="assets/css/calendar.css" />



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
														<h3><strong>ACTIVITIES</h3>
														<hr>
 												<?php 
 												$result = mysqli_query($mysqli, "SELECT `activity_name` FROM `activity` WHERE `activity_type`='CES Activity'");
												   if($result){
												   	 while($row = mysqli_fetch_array($result)){
			 										   	echo "<span class='external-event label bg-warning'>".$row[0]."</span>";
													  }													
												   }

												$result = mysqli_query($mysqli, "SELECT `activity_name` FROM `activity` WHERE `activity_type`='Tutorials Activity'");
												   if($result){
												   	 while($row = mysqli_fetch_array($result)){
			 										   	echo "<span class='external-event label bg-info'>".$row[0]."</span>";
													  }													
												   }
 										   	 	?>
														
												</div>
												<hr>
														
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

		
</div>

	dsfsdfsdfsdfsdfsdf
<img src="uploaded_image/capture.png">

		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     MAIN SHOW CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		
		
		

<!-- //wrapper-->
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
					start: new Date(y, m, 2),
					end: new Date(y, m, 3),
					color:"#f37864"
				}/*,
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
				}*/
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