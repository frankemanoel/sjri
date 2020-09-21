<?php

$painel_atual= "admin";

include_once("bd/conexao.php");
$result_events = "SELECT id, title, color, start, end FROM events";
$resultado_events = mysqli_query($link, $result_events);


?>

	<head>
			<link href='calendario/css/fullcalendar.min.css' rel='stylesheet' />
			<link href='calendario/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
			<link href='calendario/css/personalizado.css' rel='stylesheet' />
			<script src='calendario/js/moment.min.js'></script>
			<script src='calendario/js/jquery.min.js'></script>
			<script src='calendario/js/fullcalendar.min.js'></script>
			<script src='calendario/locale/pt-br.js'></script>
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){
								?>
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['title']; ?>',
								start: '<?php echo $row_events['start']; ?>',
								end: '<?php echo $row_events['end']; ?>',
								color: '<?php echo $row_events['color']; ?>',
								},<?php
							}
						?>
					]
				});
			});
		</script>
	</head>
	<body>

    <div class="col s12" style="background-image: linear-gradient(to right, white, white, white, white, #F7F9FC, #F7F9FC);">
    		<div style="color:#0d47a1; font-size:18px"><i class='material-icons'>event</i> Agenda</div><hr> 
		<div id='calendar'></div>
    </div>

    
	</body>
