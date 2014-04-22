

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
			<ol class="breadcrumb"> Display / Numeric / Sigal Digit</ol>
			<table width="100%" border="1" class="text-center">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Name</th>
						<th>DIMENSION</th>
						<th>DATASHEET</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
						<td>HT-T158 Series</td>
						<td>3.0 x 2.0 x 1.3 (mm)</td>
						<td><a href="#"><i class="fa fa-download fa-2x"></i></a></td>
						<td><a href="#" class="btn btn-primary">Details</a></td>
					</tr>
					<tr>
						<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
						<td>HT-T158 Series</td>
						<td>3.0 x 2.0 x 1.3 (mm)</td>
						<td><a href="#"><i class="fa fa-download fa-2x"></i></a></td>
						<td><a href="#" class="btn btn-primary">Details</a></td>
					</tr>
					<tr>
						<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
						<td>HT-T158 Series</td>
						<td>3.0 x 2.0 x 1.3 (mm)</td>
						<td><a href="#"><i class="fa fa-download fa-2x"></i></a></td>
						<td><a href="#" class="btn btn-primary">Details</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>


	<!-- Footer & javascript 
    ================================================== -->
<?php include("includes/footer.php");?>
<?php include("includes/javascript.php");?>

</body>
</html>