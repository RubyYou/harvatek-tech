

<?php include("includes/header.php");?>

<body>
<div id='layout'>
<header id="header">

	<!--Navigation 
    ================================================== -->

	<?php include("includes/topNavi.php");?>


	<!-- Title : define which page with title changes.
	================================================== -->

		<div class="container text-center">
			<div class="title">
				<h3>Harvatek Americas Sales Territories</h3>
			</div>
		</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">

<!-- page: Local-representatives
================================================== -->

<!-- todo: need to take out iframe: or change to other way of doing / not responsive and can not be hover as well-->
<iframe id="mapFrame" class="visible-lg visible-md" src="salesMap.html" 
		height="642" width="1028" frameborder="0" scrolling="no"></iframe>
<br/><br/>
<img class="visible-sm visible-xs img-responsive" src="http://harvatek-tech.com/wp-content/uploads/2013/08/salesMap.jpg">
<div class="row salesRepo">
	<ul class="col-sm-4">
		<li style="color: #febe10;">OASIS SALES</li>
		<li>WI, IL</li>
		<li><a href="mailto:pcorzine@oasis-sales.com">pcorzine@oasis-sales.com</a></li>
		<li><i class="fa fa-phone"></i> 847-805 9500</li>
		<li><i class="fa fa-print"></i> 847-805-9510</li>
		<li><a href="http://www.oasis-sales.com" target="_blank">www.oasis-sales.com</a></li>
	</ul>
	<ul class="col-sm-4">
		<li style="color: #43bf36;">CONTI-YOUNGER ASSOCIATES</li>
		<li>Massachusetts, Maine, Vermont,
	Rhode Island and Connecticut</li>
		<li><a href="mailto:sales@conti-younger.com">sales@conti-younger.com</a></li>
		<li><i class="fa fa-phone"></i> 508-485-7204</li>
		<li><i class="fa fa-print"></i> 317-612-5005</li>
		<li><a href="http://www.conti-younger.com" target="_blank">www.conti-younger.com</a></li>
	</ul>
	<ul class="col-sm-4">
		<li style="color: #f287b7;">CC ELECTRO SALES, INC</li>
		<li>Indiana, Kentucky, Michigan, Ohio,
	Western Pennsylvania, and West Virginia</li>
		<li><i class="fa fa-phone"></i> 317-612-5000</li>
		<li><i class="fa fa-print"></i> 317-612-5005</li>
		<li><a href="http://www.ccrep.com" target="_blank">www.ccrep.com</a></li>
		<li></li>
	</ul>
</div>
<div class="row salesRepo">
	<ul class="col-sm-4">
		<li style="color: #5ddff4;">TRINITY</li>
		<li>Northern California</li>
		<li><a href="mailto:carolm@trinity-tech.com"> carolm@trinity-tech.com</a></li>
		<li><i class="fa fa-phone"></i> 847-805-9500</li>
		<li><i class="fa fa-print"></i> 408-986-9299</li>
		<li><a href="http://www.trinity-tech.com" target="_blank">www.trinity-tech.com</a></li>
	</ul>
	<ul class="col-sm-4">
		<li style="color: #53c6e0;">ATMI</li>
		<li>WA,OR</li>
		<li><a href="mailto:sales@atmisales.com">sales@atmisales.com</a></li>
		<li><i class="fa fa-phone"></i> 503-643-8307</li>
		<li><i class="fa fa-print"></i> 503-643-4364</li>
		<li><a href="http://www.a-t-m-i.com" target="_blank">www.a-t-m-i.com</a></li>
	</ul>
	<ul class="col-sm-4">
		<li style="color: #83dd9f;">Dyn-e-Mark</li>
		<li>Florida, Puerto Rico, North Carolina, South Carolina, Tennessee, Georgia
			Alabama, Mississippi</li>
		<li><i class="fa fa-phone"></i> 407-660-1661</li>
		<li><a href="http://www.dyneamark.com" target="_blank">www.dyneamark.com</a></li>
	</ul>
</div>
<div class="row salesRepo">
	<ul class="col-sm-4">
		<li style="color:#b299f2;">Eagle Ridge Mktg</li>
		<li>CO, UT</li>
		<li><i class="fa fa-phone"></i> 303-667-2699</li>
	</ul>
	<ul class="col-sm-4">
		<li style="color:#938eff;">Tech Coast Sales</li>
		<li>Southwest, Az and NM</li>
		<li><a href="mailto:sales@tc-sales.com">sales@tc-sales.com</a></li>
		<li><i class="fa fa-phone"></i> 949-305-6869</li>
	</ul>
	<ul class="col-sm-4">
		<li style="color:#054a51;">KOBAMA</li>
		<li>Brazil</li>
		<li><i class="fa fa-phone"></i>+55 11 5102-2460</li>
		<li><i class="fa fa-print"></i>+55 11 5102-2460</li>
		<li><a href="http://kobama.com.br" target="_blank">kobama.com.br</a></li>
	</ul>
</div>
<div class="row salesRepo">
	<ul class="col-sm-4">
		<li style="color: #468dcb;">HARVATEK Technology</li>
		<li>The USA, Canada, Mexico</li>
		<li><a href="mailto:sales@harvatek-tech.com">sales@harvatek-tech.com</a></li>
		<li><i class="fa fa-phone"></i> 408-844-8734</li>
		<li><i class="fa fa-print"></i> 408-844-9618</li>
		<li><a href="www.harvatek-tech.com">www.harvatek-tech.com</a></li>
	</ul>
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