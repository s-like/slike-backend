<?php
$menu_options = request()->route()->getAction();
$MainValues = substr($menu_options['controller'], strrpos($menu_options['controller'], "\\") + 1);
$MainSettings = explode('@', $MainValues);
$controller = $MainSettings[0];
$action = $MainSettings[1];
$version = MyFunctions::getCurrentVersion(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo MyFunctions::getSiteTitle(); ?> - Adminstrator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Slike" />
	<meta name="keywords" content="Slike, admin Admin">
	<meta name="_token" content="{{csrf_token()}}" />

	<script src="{{ asset('js/jquery-2.2.3.min.js?v=').$version }}"></script>
	
	<link rel="stylesheet" href="{{ asset('css/admin/new-style.css?v=').$version }}" />
	<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css?v=').$version }}">
	<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-icons.css?v=').$version }}">
	<link rel="stylesheet" href="{{ asset('css/admin/font-awesome.min.css?v=').$version }}">
	<!-- <link rel="stylesheet" href="{{ asset('css/admin/animate.css') }}">    -->
	<link rel="stylesheet" href="{{ asset('css/admin/responsive.css?v=').$version }}">
	<link href="{{ asset('css/admin/jquery.atAccordionOrTabs.css?v=').$version }}" rel="stylesheet" type="text/css">

	<!-- calender css -->
	<link href="{{ asset('css/admin/fullcalendar.min.css?v=').$version }}" rel='stylesheet' />
	<link href="{{ asset('css/admin/fullcalendar.print.css?v=').$version }}" rel='stylesheet' media='print' />

	<link href="{{ asset('datatables/datatables.min.css?v=').$version }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('datatables/plugins/bootstrap/datatables.bootstrap.css?v=').$version }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{ asset('js/jquery.dataTables.js?v=').$version }}"></script>

	<script src="{{ asset('files/amchart/amcharts.js?v=').$version }}"></script>
    <script src="{{ asset('files/amchart/serial.js?v=').$version }}"></script>
    <script src="{{ asset('files/amchart/light.js?v=').$version }}"></script>
	<link href="{{ asset('css/select2.min.css?v=').$version }}" rel="stylesheet" />
	<script src="{{ asset('js/select2.min.js?v=').$version }}"></script>
	
	<link href="{{ asset('css/bootstrap-toggle.min.css?v=').$version }}" rel="stylesheet" />
	<link href="{{ asset('gradx-master/gradX.css?v=').$version }}" rel="stylesheet" />
	<link href="{{ asset('gradx-master/colorpicker/css/colorpicker.css?v=').$version }}" rel="stylesheet" />

	<script src="{{ asset('js/bootstrap-toggle.min.js?v=').$version }}"></script>
	<script src="{{ asset('js/sweetalert.min.js?v=').$version }}"></script>
	<?php //if (Route::currentRouteName() != 'admin.app_settings') { 
	?>
	<script src="{{ asset('files/wysiwyg-editor/js/tinymce.min.js?v=').$version }}"></script>
	<?php //} 
	?>
	<!-- Custom js -->
	<script src="{{ asset('files/wysiwyg-editor/wysiwyg-editor.js?v=').$version }}"></script>
	<script src="{{ asset('gradx-master/lib/js/jquery.js?v=').$version }}"></script>
	<script src="{{ asset('gradx-master/colorpicker/js/colorpicker.js?v=').$version }}"></script>
	<script src="{{ asset('gradx-master/dom-drag.js?v=').$version }}"></script>
	<script src="{{ asset('gradx-master/gradX.js?v=').$version }}"></script>
</head>

<body>
	<section>
		<div class="container-fluid">
			<div class="row">
				@include('includes.admin.sidebar')

				<div class="col-xxl-10 col-xl-10 col-lg-9 no-pad right-main-div">
					@include('includes.admin.topbar')

					<section class="padding-top10  mrg-top-100">
						<div class="container-fluid">
							@yield('content')
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>

	<!-- <script src="js/bootstrap.min.js"></script> -->
	<script src="{{ asset('js/admin/bootstrap.min.js?v=').$version }}"></script>
	<script src="{{ asset('js/admin/bootstrap.bundle.min.js?v=').$version }}"></script>

	<script src="{{ asset('js/wow.min.js?v=').$version }}"></script>
	<script>
		function myFunction() {
			var x = document.getElementById("myLinks");
			if (x.style.display === "block") {
				x.style.display = "none";
				transition = "all ease 600ms";
			} else {
				x.style.display = "block";
				transition = "all ease 600ms";
			}
		}
	</script>

	<!-- accordion- -->

	<script src="{{ asset('js/admin/jquery.bbq.js?v=').$version }}"></script>

	<script src="{{ asset('js/admin/jquery.atAccordionOrTabs.js?v=').$version }}"></script>
	<script type="text/javascript">
		$('.demo').accordionortabs();
	</script>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-36251023-1']);
		_gaq.push(['_setDomainName', 'jqueryscript.net']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<!-- accordion- -->
	<!-- calendar- -->

	<script src="{{ asset('js/admin/moment.js?v=').$version }}"></script>
	<script src="{{ asset('js/admin/jquery-ui.min.js?v=').$version }}"></script>
	<script src="{{ asset('js/admin/fullcalendar.min.js?v=').$version }}"></script>


	<script>
		$(document).ready(function() {

			height=$( window ).height();
			$('.menu-main').css({'max-height':$( window ).height()+'px','overflow-y':'scroll'});
			$('.right-main-div').css({'height':height+'px','overflow-y':'scroll'});
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();

			/*  className colors
  
      className: default(transparent), important(red), chill(pink), success(green), info(blue)
  
      */


			/* initialize the external events
			-----------------------------------------------------------------*/

			$('#external-events div.external-event').each(function() {

				// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
				// it doesn't need to have a start or end
				var eventObject = {
					title: $.trim($(this).text()) // use the element's text as the event title
				};

				// store the Event Object in the DOM element so we can get to it later
				$(this).data('eventObject', eventObject);

				// make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 999,
					revert: true, // will cause the event to go back to its
					revertDuration: 0 //  original position after the drag
				});

			});


			/* initialize the calendar
			-----------------------------------------------------------------*/

			var calendar = $('#calendar').fullCalendar({
				header: {
					left: 'title',
					center: 'agendaDay,agendaWeek,month',
					right: 'prev,next today'
				},
				editable: true,
				firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
				selectable: true,
				defaultView: 'month',

				axisFormat: 'h:mm',
				columnFormat: {
					month: 'ddd', // Mon
					week: 'ddd d', // Mon 7
					day: 'dddd M/d', // Monday 9/7
					agendaDay: 'dddd d'
				},
				titleFormat: {
					month: 'MMMM yyyy', // September 2009
					week: "MMMM yyyy", // September 2009
					day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
				},
				allDaySlot: false,
				selectHelper: true,
				select: function(start, end, allDay) {
					var title = prompt('Event Title:');
					if (title) {
						calendar.fullCalendar('renderEvent', {
								title: title,
								start: start,
								end: end,
								allDay: allDay
							},
							true // make the event "stick"
						);
					}
					calendar.fullCalendar('unselect');
				},
				droppable: true, // this allows things to be dropped onto the calendar !!!
				drop: function(date, allDay) { // this function is called when something is dropped

					// retrieve the dropped element's stored Event Object
					var originalEventObject = $(this).data('eventObject');

					// we need to copy it, so that multiple events don't have a reference to the same object
					var copiedEventObject = $.extend({}, originalEventObject);

					// assign it the date that was reported
					copiedEventObject.start = date;
					copiedEventObject.allDay = allDay;

					// render the event on the calendar
					// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
					$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

					// is the "remove after drop" checkbox checked?
					if ($('#drop-remove').is(':checked')) {
						// if so, remove the element from the "Draggable Events" list
						$(this).remove();
					}

				},

				events: [{
						title: 'All Day Event',
						start: new Date(y, m, 1)
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: new Date(y, m, d - 3, 16, 0),
						allDay: false,
						className: 'info'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: new Date(y, m, d + 4, 16, 0),
						allDay: false,
						className: 'info'
					},
					{
						title: 'Meeting',
						start: new Date(y, m, d, 10, 30),
						allDay: false,
						className: 'important'
					},
					{
						title: 'Lunch',
						start: new Date(y, m, d, 12, 0),
						end: new Date(y, m, d, 14, 0),
						allDay: false,
						className: 'important'
					},
					{
						title: 'Birthday Party',
						start: new Date(y, m, d + 1, 19, 0),
						end: new Date(y, m, d + 1, 22, 30),
						allDay: false,
					},
					{
						title: 'Click for Google',
						start: new Date(y, m, 28),
						end: new Date(y, m, 29),
						url: 'http://google.com/',
						className: 'success'
					}
				],
			});


		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

				element.addEventListener('click', function(e) {

					let nextEl = element.nextElementSibling;
					let parentEl = element.parentElement;

					if (nextEl) {
						e.preventDefault();
						let mycollapse = new bootstrap.Collapse(nextEl);

						if (nextEl.classList.contains('show')) {
							mycollapse.hide();
						} else {
							mycollapse.show();
							// find other submenus with class=show
							var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
							// if it exists, then close all of them
							if (opened_submenu) {
								new bootstrap.Collapse(opened_submenu);
							}
						}
					}
				}); // addEventListener
			}) // forEach
		});
		// DOMContentLoaded  end
	</script>

	<!-- calendar- -->

</body>

</html>