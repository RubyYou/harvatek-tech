<?php include("search.c.php");?>

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
				/*
				 *search 無法顯示path
				
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
				*/
				?>
				
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


<!-- product // table & product location
================================================== -->
		<div class="col-md-9 ">
			<div class="table-responsive">
				<?php
					if(is_array($product_arr)){
				?>
				<table width="100%" border="1" class="text-center">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th>Name</th>
							<th>Dimension</th>
							<th>Datasheet</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach($product_arr['data'] as $key => $val)
							{
								$datasheetLink = ($product_arr['data'][$key]['datasheet'] == '') ? '' : $product_arr['data'][$key]['datasheet'];
						?>
								<tr>
									<td><img src="<?php echo $cProduct->webRoot.$product_arr['data'][$key]['product_id'].$product_arr['data'][$key]['ext'];?>" width="60" height="60" alt="product-thumbnails"></td>
									<td><?php echo $product_arr['data'][$key]['name'];?></td>
									<td><?php echo $product_arr['data'][$key]['dimension'];?></td>
									<td>
										<?php
										if($datasheetLink != '')
										{
											echo '<a href="'.$datasheetLink.'"><i class="fa fa-download fa-2x"></i></a>';
										}
										?>
										
									</td>
									<td><a href="details.php?i=<?php echo $product_arr['data'][$key]['product_id'];?>" class="btn btn-primary">Details</a></td>
								</tr>
						<?php
							}
						}
						else
						{
						?>
							<p>No data for this search!</p>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			
			<?php if(is_array($product_arr)){ ?>
			<ul class="pagination">
			  <li><a href="?nowpage=<?php echo $product_arr['nowpage']-1;?>&k=<?php echo $_GET['k'];?>">&laquo;</a></li>
			  <?php
				for ($i = 1; $i <= $product_arr['pagecount'] ; $i++ )
				{
					echo '<li><a href="?nowpage='.$i.'&k='.$_GET['k'].'">'.$i.'</a></li>';
				}
			  ?>
			  <li><a href="?nowpage=<?php echo $product_arr['nowpage']+1;?>&k=<?php echo $_GET['k'];?>">&raquo;</a></li>
			</ul>
			<?php
			}else{
			?>
				
		<?php }?>
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