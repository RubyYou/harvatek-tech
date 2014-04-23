

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
				<h3> News</h3>
			</div>
			<p class="subTitle"> Here is where your slogan. </p>
		</div>
	</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">

<!-- Side menu // currently use product categories, if have more post, will change to news list as side menu
================================================== -->
<?php include("includes/productCategories.php");?>


	<!--  News Post locations
    ================================================== -->
			<div class="col-md-9">
				<h3> Harvatek Technologies Implements New Product Branding Strategy</h3>
				<p class="date">Post Date : November 14, 2013 </p>
				<p>Santa Clara, CA – Harvatek Technologies announces the implementation of a new product branding strategy for its opto-electronics product portfolios. Beginning on Feb. 1, 2014, Harvatek Technologies will market and sell products under the following brand names:
					<ul>
						<li>Harvatek - SMD LED products</li>
						<li>CT Micro - Infrared and optocoupler products</li>
						<li>Inolux - Display LED, through hole LED and non-standard solutions products</li>
					</ul>
					Harvatek, along with its subsidiaries, has design centers, marketing and manufacturing sites in various locations around the world. To best focus our design, marketing and manufacturing resources, these divisions will operate under their own P&amp;L structures. In the Americas region, Harvatek Technologies will continue to be the sales channel for these brands, as well as their sales representatives and distribution channels.
				</p>
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