<?php
include_once("conexao.php");
$result_events = "SELECT id, title,email, color, start, end,telefone FROM events";
$resultado_events = mysqli_query($conn, $result_events);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="shortcut icon"  href="img/1.png">
		<meta charset='utf-8' />
		<title>Agenda-Clínica Estética & Spa Fitness - Mara Chandelier</title>
		<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/personalizado.css' rel='stylesheet' />
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/pt-br.js'></script>
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
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {
						
						$('#visualizar #id').text(event.id);
						$('#visualizar #title').text(event.title);
						$('#visualizar #telefone').text(event.telefone);
						$('#visualizar #email').text(event.email);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						
						$('#visualizar').modal('show');
						return false;

					},
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){
								?>
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['title']; ?>',
								telefone: '<?php echo $row_events['telefone']; ?>',
								email: '<?php echo $row_events['email']; ?>',
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

		<div id='calendar'></div>

		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Dados do Evento</h4>
					</div>
					<div class="modal-body">
						<dl class="dl-horizontal">
							<dt>ID:</dt>
							<dd id="id"></dd>
							<dt>Nome:</dt>
							<dd id="title"></dd>
							<dt>Telefone:</dt>
							<dd id="telefone"></dd>
							<dt>Email:</dt>
							<dd id="email"></dd>
							<dt>Data/Hora:</dt>
							<dd id="start"></dd>
							
						</dl>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>