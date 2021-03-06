<?php include_once 'brands.c.php';?>

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
				<h3> Harvatek Brands </h3>
			</div>
		</div>
	</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">

<!-- Side menu // product categories
================================================== -->
<?php include("includes/productCategories.php");?>


<!-- product // table & product location
================================================== -->
		<div class="col-md-9">
			<h3>Harvatek Technologies Brands</h3>

			<p>Small introduction about the folowing three brands.<br/>
			xxxx fack text. was founded in 1995 and are listed on Taiwan Stock Exchange (TWSE) 
			in 2003 under ticker number 6168. Also one of the SMD LEDs leading manufacturers 
			in the world with 800 employees worldwide.
			</p>

			
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="thumbnail brand">
						<img src="images/harvatek_brand.jpg"/>
						<div class="productLine">
							<a href="product.php?t=2&ps=3#SMD-LED">SMD LED</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="thumbnail brand">
						<img src="images/inolux_brand.jpg"/>
						<div class="productLine">
							<a href="product.php?t=4&ps=4#Display-Through-Hole-Display-Numeric">Display</a>
						</div>
						<div class="productLine">
							<a href="product.php?t=2&ps=7#Through-Hole-LED">Through Hole LED</a>
						</div>
						<div class="productLine">
							<a href="product.php?t=1&ps=8">UV LED</a></div>

					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="thumbnail brand">
						<img src="images/ctm_brand.jpg"/>
						<div class="productLine">
							<a href="product.php?t=2&ps=12#Infrared-Emitter-Sensor-Coupler">
								Infrared Emitter / Sensor / Coupler</a>
						</div>
					</div>
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