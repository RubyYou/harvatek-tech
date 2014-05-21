<?php include("details.c.php");?>
<?php //session_start(); session_destroy();?>
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
				<img src="images/inolux_logo.png" alt="inolux_logo" /> 
				<h3> PRODUCTS </h3>
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
					<div class="col-md-3">
						<img class="productImg" src="<?php echo $cProduct->webRoot.$product_arr['product_id'].$product_arr['ext'];?>" style="width: 150px;height: 150px;"/>
					</div>
					<div class="col-md-9">
						<h3><?php echo $product_arr['name'];?></h3>
						<!--quanitity-->
						<form id="addcart" role="form" class="form-inline" action="add_cart.php?i=<?php echo $product_arr['product_id'];?>" method="post">
							<?php
							if($product_arr['quantity_visible'] == 1)
							{
							?>
							<label class="control-label" >Quantity</label>
							<select class="form-control input-md" name="quantity">
								<?php
								foreach($cProduct->quantityOption as $key => $val)
								{
									echo '<option value="'.$key.'">'.$val.'</option>';
								}
								?>
							</select>
							<?php
							}
							?>
							
							
						<!-- color -->
							<?php
							
							if($product_arr['color_options'] != '')
							{
								$colorOptions = explode(',',$product_arr['color_options']);
							?>
							<label class="control-label " >Color</label>
							<select class="form-control input-md" name="color">
							  <?php
								foreach($colorOptions as $key => $val){
									echo '<option value="'.$val.'">'.$val.'</option>';
								}
							  ?>
							</select>
							<?php
							}
							?>
							
							
							
						<!-- cri -->
							<?php
							if($product_arr['cri_options'] != '')
							{
								$criOptions = explode(',',$product_arr['cri_options']);
							?>
							<label class="control-label " >CRI</label>
							<select class="form-control input-md" name="cri">
							  <?php
								foreach($criOptions as $key => $val){
									echo '<option value="'.$val.'">'.$val.'</option>';
								}
							  ?>
							</select>
							<?php
							}
							?>
							<br/><br/>
							<?php
							if($product_arr['datasheet'] != '')
							{
							?>
							<a href="<?php echo $product_arr['datasheet'];?>" class="btn btn-primary">Datasheet</a>
							<?php
							}
							?>
							<input type="submit" class="btn btn-addcart" value="Add to Cart"/>
						</form>
					</div>
				</div>
					<!--here start the php input html parts -->
					<div class="product-description">
						<?php echo $product_arr['content'];?>
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