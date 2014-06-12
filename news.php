<?php include("news.c.php");?>

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
				<h3>News</h3>
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
				<h3><?php echo $arr[0]['name'];?></h3>
					<p class="date">Post Date : <?php echo $arr[0]['post_date'];?> </p>
					<?php echo $arr[0]['content'];?>
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