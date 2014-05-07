	<!-- JavaScript
    ================================================== -->
	<script src="scripts/jquery-1.11.0.js" type="text/javascript"></script>
	<script src="scripts/bootstrap/bootstrap.js" type="text/javascript"></script>
	<script src="scripts/jquery.accordion.source.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://localhost:35729/livereload.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.accordion').accordion();

			$('.next').on("click",function(event){
				$('#clientinfo').slideDown();
				$('.delete').hide();
				event.preventDefault();
			});
		});

	</script>