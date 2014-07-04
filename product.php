<?php include("product.c.php");?>

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
				<?php
				$categoryArr = explode(' / ' , $path);
				if($categoryArr[0] == 'Display' || $categoryArr[0] == 'Through Hole LED' || $categoryArr[0] == 'UV LED' )
				{
					echo '<img src="images/inolux_logo.png" alt="inolux_logo" />';
				}
				else if($categoryArr[0] == 'Infrared Emitter/Sensor/Coupler')
				{
					echo '<img src="images/CT_brand.png" alt="ctm_logo" />';
				}
				else if($categoryArr[0] == 'SMD LED')
				{
					echo '<img src="images/harvatek_brand.png" alt="harvatek_logo" />';
				}
				?>
				
				<h3> PRODUCTS </h3>
			</div>
		</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content" class="product">
	<div class="container">

<!-- Side menu // product categories
================================================== -->
<?php include("includes/productCategories.php");?>


<!-- product // table & product location
================================================== -->
		<div class="col-md-9 ">
			<ol class="breadcrumb"> <?php echo $path;?></ol>
			<div class="table-responsive">
				<table width="100%" border="1" class="text-center">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th>Name</th>
							<th>Dimension</th>
							<?php
							if($_GET['ps']==16 || $_GET['ps']==17){
								?>
							<th>Wp(typ.)</th>
							<?php } else{?>
								<th>Datasheet</th>
							<?php } ?>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(is_array($product_arr))
						{
							foreach($product_arr['data'] as $key => $val)
							{
								$datasheetLink = ($product_arr['data'][$key]['datasheet'] == '') ? '' : $product_arr['data'][$key]['datasheet'];
						?>
								<tr>
									<td><img src="<?php echo $cProduct->webRoot.$product_arr['data'][$key]['product_id'].$product_arr['data'][$key]['ext'];?>" width="60" height="60" alt="product-thumbnails"></td>
									<td><?php echo $product_arr['data'][$key]['name'];?></td>
									<td><?php echo $product_arr['data'][$key]['dimension'];?></td>
									<td><?php 
										if($_GET['ps']==16 || $_GET['ps']==17){
											echo $product_arr['data'][$key]['wp_type'];
										}else{
											if($datasheetLink != '')
											{
											echo "<td>"+'<a href="'.$datasheetLink.'"><i class="fa fa-download fa-2x"></i></a>'+"</td>";
											}
										}?>
									</td>
									<td><a href="details.php?i=<?php echo $product_arr['data'][$key]['product_id'];?>" class="btn btn-primary">Details</a></td>
								</tr>
						<?php
							}
						}
						else
						{
						?>
								<!--<tr><td colspan="5">No data</td></tr>-->
						<?php
						}
						?>
					</tbody>
				</table>
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