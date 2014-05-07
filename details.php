

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


	<!-- product // product details location
    ================================================== -->
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3 productImg">
						<img src="http://harvatek-tech.com/wp-content/uploads/2013/08/Throughhole-DotMatrix-150x150.jpg"/>
					</div>
					<div class="col-md-9">
						<h3> 0.67″ 5×7 Dot Matrix</h3>
						<!--quanitity-->
						<form role="form" class="form-inline">
							<label class="control-label" >Quantity</label>
							<select class="form-control input-sm">
							  <option>0 ~ 10K</option>
							  <option>10k ~ 100K</option>
							  <option>100k ~ 1kk</option>
							  <option>1kk and above</option>
							</select>
						<!-- color -->
							<label class="control-label " >Color</label>
							<select class="form-control input-sm">
							  <option>Amber</option>
							  <option>Blue</option>
							  <option>Yellow</option>
							  <option>Red</option>
							</select>
							<br/><br/>
							<a href="cart.php" class="btn btn-success">Add to Cart</a>
						</form>
					</div>
				</div>
					<!--here start the php input html parts -->
					<div class="product-description row">
						<h3>Product Descriptions</h3>
						<img src="http://harvatek-tech.com/wp-content/uploads/2013/08/ThDot0.67-01-1024x488.jpg" class="img-responsive"/>
					<table class="table" border="1">
						<thead>
							<tr>
								<th colspan="2">Product</th>
								<th rowspan="2">IF (mA)</th>
								<th rowspan="2">Color</th>
								<th rowspan="2">λD (nm)</th>
								<th rowspan="2">IV (mcd)</th>
								<th rowspan="2">VF (V)</th>
							</tr>
							<tr>
								<th>Common Anode</th>
								<th>Common Cathode</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>HDMT5767UAA</td>
								<td>HDMT5767UAC</td>
								<td>20</td>
								<td>Amber</td>
								<td>606</td>
								<td>40</td>
								<td>2.1</td>
							</tr>
							<tr>
								<td>HDMT5767UYGA</td>
								<td>HDMT5767UYGC</td>
								<td>20</td>
								<td>Yellow Green</td>
								<td>571</td>
								<td>20</td>
								<td>3.2</td>
							</tr>
							<tr>
								<td>HDMT5767TGA</td>
								<td>HDMT5767TGC</td>
								<td>20</td>
								<td>True Green</td>
								<td>525</td>
								<td>160</td>
								<td>2.0</td>
							</tr>
							<tr>
								<td>HDMT5767UYA</td>
								<td>HDMT5767UYC</td>
								<td>20</td>
								<td>Yellow</td>
								<td>590</td>
								<td>40</td>
								<td>2.0</td>
							</tr>
							<tr>
								<td>HDMT5767USRA</td>
								<td>HDMT5767USRC</td>
								<td>20</td>
								<td>Super Red</td>
								<td>639</td>
								<td>30</td>
								<td>2.0</td>
							</tr>
							<tr>
								<td>HDMT5767URA</td>
								<td>HDMT5767URC</td>
								<td>20</td>
								<td>Hyper Red</td>
								<td>625</td>
								<td>40</td>
								<td>3.2</td>
							</tr>
							<tr>
								<td>HDMT5767UBA</td>
								<td>HDMT5767UBC</td>
								<td>20</td>
								<td>Blue</td>
								<td>470</td>
								<td>60</td>
								<td>2.0</td>
							</tr>
						</tbody>
						</table>
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