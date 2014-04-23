

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
				<h3> Your Inquiry Details </h3>
			</div>
			<p class="subTitle"> Thank you! your inquiry has been received. </p>
		</div>
	</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">

<!-- inQuiry details
	================================================== -->
		<h3 class="pull-left"> Inquiry products</h3>
		<p class="pull-right"> <b>Inquiry number</b> # 166 / 
			<b>Date</b>
			<?php date_default_timezone_set('UTC');
				  echo date("d/M/Y");?></p>
		<table width="100%" border="1" class="text-center">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Other info</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
					<td><a href="product.php?ht-158Series">HT-T158 Series</a></td>
					<td>1kk ~ above </td>
					<td>Color: RED</td>
				</tr>

				<tr>
					<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
					<td><a href="product.php?ht-158Series">HT-T158 Series</a></td>
					<td>1kk ~ above </td>
					<td>Color: RED</td>
				</tr>
				<tr>
					<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
					<td><a href="product.php?ht-158Series">HT-T158 Series</a></td>
					<td>1kk ~ above </td>
					<td> </td>
				</tr>
			</tbody>
		</table>
	</div>
</section>

<!-- client info, show after click next step button -->
<section id="clientdetail">
	<div class="container">
		<h3 >Your Info</h3>
		<hr/>
			<div class="col-md-6">
				<div class="row">
					<p class="col-xs-3"><b>Country</b></p><p class="col-xs-9">The U.S.A</p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>First Name</b></p><p class="col-xs-9">ShihYu</p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Last Name</b></p><p class="col-xs-9">YOU</p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Email</b></p><p class="col-xs-9">ruby@gmail.com</p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Phone</b></p><p class="col-xs-9">+1.445.665.6767</p>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<p class="col-xs-3"><b>Address</b></p><p class="col-xs-9">first line of address</p>
				</div>
				<div class="row">
					<p class="col-xs-3"> </p><p class="col-xs-9">second line of address</p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Zip Code</b></p><p class="col-xs-9">1235324</p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Additional Info</b></p><p class="col-xs-9">I would like just have some information regards the part number and dimension with what I ordered.</p>
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