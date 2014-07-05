	<!-- JavaScript
    ================================================== -->
	<script src="scripts/jquery-1.11.0.js" type="text/javascript" ></script>
	<script src="scripts/bootstrap/bootstrap.js" type="text/javascript" ></script>
	<script src="scripts/bootstrapValidator.min.js" type="text/javascript" ></script>
	<script src="scripts/jquery.accordion.source.js" type="text/javascript" ></script>
	<script src="scripts/script.js" type="text/javascript" ></script>
	<script src="http://localhost:35729/livereload.js"></script>
    <script type="text/javascript">
    $(function(){
        var url = window.location.href.toString();
        var hashPos = url.search('#');
        if (hashPos > 0) {
            var hash = url.split('#')[1];
            var link = $('a.btn.btn-primary').attr('href');
            $('a.btn.btn-primary').attr('href',link +'#' +  hash);
        }
        });
    </script>