

<?php include("includes/header.php");?>

<body>
<div id='layout'>
<header id="header">
	<div class="headercover">

	<!--Navigation 
    ================================================== -->

	<?php include("includes/topNavi.php");?>


	<!-- Title : define which page with title changes.
	================================================== -->

		<div class="container text-center">
			<div class="title">
				<h3>Applications</h3>
			</div>
		</div>
	</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">
		<div class="col-md-10 col-md-offset-1">

<!-- page: applications
================================================== -->
		<p class="lead text-center">Designing components to meet the needs of a wide range of design and efficiency requirement,
			Harvatek Technologies offers high quality and competitive LED solutions for industries across the globe.</p>

		<ul class="nav nav-pills">
			<li class="active"><a href="#tabs-1" data-toggle="pill">General Lighting</a></li>
			<li><a href="#tabs-2" data-toggle="pill">Display</a></li>
			<li><a href="#tabs-3" data-toggle="pill">Infrared</a></li>
			<li><a href="#tabs-4" data-toggle="pill">SMD LED</a></li>
			<li><a href="#tabs-5" data-toggle="pill">UV</a></li>
		</ul>

		<div class="tab-content">
			<div id="tabs-1" class="tab-pane fade in active">
				<h3>General Lighting</h3>
				<img class="img-responsive" alt="general_lighting" src="http://harvatek-tech.com/wp-content/uploads/2014/04/app_generallighting.jpg" usemap="#Map" width="1000" height="426" border="0" />
				<map name="Map" id="Map">
				  <area shape="rect" coords="692,31,878,98" href="?product=ht-t530-series-2" target="_self" alt="HT-T530" />
				  <area shape="rect" coords="690,104,879,161" href="?product=ht-t7201bp" target="_self" alt="HT-T720" />
				</map>
			</div>
			<div id="tabs-2" class="tab-pane fade">
				<h3>Display Application</h3>
				<img class="img-responsive" alt="general_lighting" src="http://harvatek-tech.com/wp-content/uploads/2014/04/app_display.jpg" width="1000" height="418" border="0" />
			</div>
			<div id="tabs-3" class="tab-pane fade">
				<h3>Infrared Application</h3>
				<img class="img-responsive" alt="general_lighting" src="http://harvatek-tech.com/wp-content/uploads/2014/04/app_infrared1.jpg" width="1000" height="438" border="0" />
				<img class="img-responsive" alt="general_lighting" src="http://harvatek-tech.com/wp-content/uploads/2014/04/app_infrared2.jpg" width="1000" height="432" border="0" />
			</div> 
			<div id="tabs-4" class="tab-pane fade">
				<h3>SMD LED Application</h3>
				<img class="img-responsive" alt="SMD LED" src="http://harvatek-tech.com/wp-content/uploads/2014/04/app_smd.jpg" usemap="#Map2" width="1000" height="921" border="0" />
				<map name="Map2" id="Map2"><area shape="rect" coords="631,705,869,769" href="?product=ht-t7201bp" target="_self" alt="HT-T720" />
				  <area shape="rect" coords="631,771,869,841" href="?product=ht-t169-series" target="_self" />
				  <area shape="rect" coords="51,46,248,147" href="?product=ht-d1711bp" target="_self" alt="HT-D171" />
				  <area shape="rect" coords="603,58,875,168" href="?product=ht-f104tw" target="_self" alt="HT-F104" />
				  <area shape="rect" coords="602,193,885,279" href="?product=ht-f196-series" target="_self" alt="HT-F196" />
				  <area shape="rect" coords="655,367,912,551" href="?product=ht-f107tw" target="_self" />
				  <area shape="rect" coords="43,459,247,548" href="?product=ht-t7201bp" target="_self" alt="HT-T720" />
				  <area shape="rect" coords="631,638,870,702" href="?product=ht-t530-series-2" target="_self" alt="HT-T530" />
				</map>
			</div>
			<div id="tabs-5" class="tab-pane">
				<h3>UV Application</h3>
				<img class="alignleft size-full" alt="UV" src="http://harvatek-tech.com/wp-content/uploads/2014/04/app_uv.jpg" width="1000" height="469" border="0" />
			</div>
		</div>

		</div>
	</div>
</section>
<div id='layout_footer'></div>
</div>
	<!-- Footer & javascript 
    ================================================== -->
<?php include("includes/footer.php");?>
<?php include("includes/javascript.php");?>

</body>
</html>