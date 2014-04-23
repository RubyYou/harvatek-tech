

<?php include("includes/header.php");?>

<body>
<header id="header">
	<div class="headercover">

	<!--Navigation 
    ================================================== -->

	<?php include("includes/topNavi.php");?>


	<!-- Title : define which page with title changes.
	================================================== -->

		<div class="container text-center">
			<div class="title">
				<img src="images/inolux_logo.png" alt="inolux_logo" /> 
				<h3> PRODUCTS </h3>
			</div>
			<p class="subTitle"> Here is where your slogan. </p>
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
						<div class="productLine">SMD LED</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="thumbnail brand">
						<img src="images/inolux_brand.jpg"/>
						<div class="productLine">Display</div>
						<div class="productLine">Through Hole LED</div>
						<div class="productLine">UV LED</div>

					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="thumbnail brand">
						<img src="images/ctm_brand.jpg"/>
						<div class="productLine">Infrared 
							Emitter / Sensor / Coupler</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>


	<!-- Footer & javascript 
    ================================================== -->
<?php include("includes/footer.php");?>
<?php include("includes/javascript.php");?>

</body>
</html>