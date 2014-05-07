

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
				<h3> Your Product Inquiry Cart</h3>
			</div>
			<p class="subTitle"> Here is where your slogan. </p>
		</div>
	</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">

<!-- product // table & product location
================================================== -->
		<table width="100%" border="1" class="text-center">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Other info</th>
					<th class="delete">Delete</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
					<td><a href="product.php?ht-158Series">HT-T158 Series</a></td>
					<td>1kk ~ above </td>
					<td>Color: RED</td>
					<td class="delete"><span class="glyphicon glyphicon-remove-circle"></span></td>
				</tr>

				<tr>
					<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
					<td><a href="product.php?ht-158Series">HT-T158 Series</a></td>
					<td>1kk ~ above </td>
					<td>Color: RED</td>
					<td class="delete"><span class="glyphicon glyphicon-remove-circle"></span></td>
				</tr>
				<tr>
					<td><img src="http://harvatek-tech.com/wp-content/uploads/2013/07/HTT136-90x90.jpg" width="60" height="60" alt="product-thumbnails"></td>
					<td><a href="product.php?ht-158Series">HT-T158 Series</a></td>
					<td>1kk ~ above </td>
					<td> </td>
					<td class="delete"><span class="glyphicon glyphicon-remove-circle"></span></td>
				</tr>
			</tbody>
		</table>
		<span > &nbsp; </span>
		<div class="text-center">
			<a href="product.php" class="btn btn-default"> Back to Product</a>
			<a href="#" class="btn btn-danger next">NEXT STEP</a>
		</div>
	</div>
</section>

<!-- client info, show after click next step button -->
<section id="clientinfo">
	<div class="container well">
		<h3 class="text-center"> Your Info</h3>
		<p class="lead text-center">To provide you the best service, Please fill out the your information below.</p>
		<hr/>
		<form class="form-horizontal" role="form">
			<div class="col-md-6">
				<div class="form-group">
					 <label for="Country" class="col-md-3 control-label">Country</label>
					 <div class="col-md-9">
					 <input type="text" class=" form-control" name="country" placeholder="Country">
					</div>
				</div>
				<div class="form-group">
					 <label for="firstName" class="col-md-3 control-label">First Name</label>
					 <div class="col-md-9">
					 <input type="text" class=" form-control" name="country" placeholder="First Name">
					</div>
				</div>
				<div class="form-group">
					 <label for="lastName" class="col-md-3 control-label">Last Name</label>
					 <div class="col-md-9">
					 <input type="text" class=" form-control" name="country" placeholder="Last Name">
					</div>
				</div>
				<div class="form-group">
					 <label for="email" class="col-md-3 control-label">Email</label>
					 <div class="col-md-9">
					 <input type="email" class=" form-control" name="country" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					 <label for="phone" class="col-md-3 control-label">Phone</label>
					 <div class="col-md-9">
					 <input type="number" class=" form-control" name="country" placeholder="phone">
					</div>
				</div>

			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="address" class="col-md-3 control-label">Address</label>
					<div class="col-md-9">
					<input type="text" class="form-control" name="country" placeholder="Address">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-9 col-md-offset-3">
					<input type="text" class="form-control" name="country" placeholder="Address (optional)">
					</div>
				</div>
				<div class="form-group">
					<label for="zipcode" class="col-md-3 control-label">Zip Code</label>
					<div class="col-md-9">
					<input type="number" class="form-control" name="country" placeholder="Postcode">
					</div>
				</div>
				<div class="form-group">
					<label for="Country" class="col-md-3 control-label">Additional Info</label>
					<div class="col-md-9">
					<textarea type="text" row="5" class="form-control" name="additionalInfo"></textarea>
					</div>
				</div>
			</div>
		</form>
		
		<div class="col-md-12 text-center">
			<hr/>
			<div class="col-md-4 col-md-offset-4">
			<a href="confirm.php" class="btn btn-primary btn-block">Send</a>
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