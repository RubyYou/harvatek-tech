<?php include 'cart.c.php';?>

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
				<h3> Your Product Inquiry Cart</h3>
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
				<?php
				if(count($cartItems) > 0)
				{
					foreach($cartItems as $key => $val)
					{
				?>
							<tr>
								<td><img src="<?php echo $cartItems[$key]['img'];?>" width="60" height="60" alt="product-thumbnails"></td>
								<td><a href="details.php?i=<?php echo $cartItems[$key]['id'];?>"><?php echo $cartItems[$key]['name'];?></a></td>
								<td><?php echo $cartItems[$key]['quantity_info'];?></td>
								<td>
									<?php echo ($cartItems[$key]['color'] == '') ? '' : '<p> Color:'.$cartItems[$key]['color'].'</p>';?>
									<?php echo ($cartItems[$key]['cri'] == '') ? '' : '<p> Cri:'.$cartItems[$key]['cri'].'</p>';?>
								</td>
								<td class="delete"><span class="glyphicon glyphicon-remove-circle" onclick="document.location.href='delete_cart.php?i=<?php echo $cartItems[$key]['id'];?>&q=<?php echo $cartItems[$key]['quantity'];?>&c=<?php echo $cartItems[$key]['color'];?>&r=<?php echo $cartItems[$key]['cri'];?>'"></span></td>
							</tr>
				<?php
					}
				}
				?>
				
				
			</tbody>
		</table>
		<span > &nbsp; </span>
		<div class="text-center">
			<a href="product.php" class="btn btn-primary"> Back to Product</a>
			<a href="#" class="btn btn-danger next">NEXT STEP</a>
		</div>
	</div>
</section>

<!-- client info, show after click next step button -->
<section id="clientinfo">
	<div class="container well">
		<h3 class="text-center"> Your Info</h3>
		<p class="lead text-center">To provide you the best service, 
			Please fill out the your information below.</p>
		<hr/>
		<form id="form" name="form" class="form-horizontal" method="post" action="cart_.php">
			<div class="col-md-6">
				<div class="form-group">
					 <label for="Country" class="col-md-3 control-label">Country *</label>
					 <div class="col-md-9">
					 <input type="text" class="form-control" name="country" placeholder="Country">
					</div>
				</div>
				<div class="form-group">
					 <label for="firstName" class="col-md-3 control-label">First Name *</label>
					 <div class="col-md-9">
					 <input type="text" class="form-control" name="first_name" placeholder="First Name">
					</div>
				</div>
				<div class="form-group">
					 <label for="lastName" class="col-md-3 control-label">Last Name *</label>
					 <div class="col-md-9">
					 <input type="text" class="form-control" name="last_name" placeholder="Last Name">
					</div>
				</div>
				<div class="form-group">
					 <label for="email" class="col-md-3 control-label">Email *</label>
					 <div class="col-md-9">
					 <input type="email" class="form-control" name="email" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					 <label for="phone" class="col-md-3 control-label">Phone *</label>
					 <div class="col-md-9">
					 <input type="number" class="form-control" name="phone" placeholder="Phone">
					</div>
				</div>

			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="address" class="col-md-3 control-label">Address</label>
					<div class="col-md-9">
					<input type="text" class="form-control" name="address" placeholder="Address">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-9 col-md-offset-3">
					<input type="text" class="form-control" name="address_option" placeholder="Address (optional)">
					</div>
				</div>
				<div class="form-group">
					<label for="zipcode" class="col-md-3 control-label">Zip Code</label>
					<div class="col-md-9">
					<input type="number" class="form-control" name="postcode" placeholder="Postcode">
					</div>
				</div>
				<div class="form-group">
					<label for="Country" class="col-md-3 control-label">Additional Info</label>
					<div class="col-md-9">
					<textarea type="text" row="5" class="form-control" name="additionalInfo"></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<hr/>
				<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary btn-block">Send</button>
				</div>
			</div>
		</form>
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