<?php include_once 'index.c.php';?>

<?php include("includes/header.php");?>

<body>
<div id='layout'>
<header id="header">

	<!--Navigation 
    ================================================== -->

	<?php include("includes/topNavi.php");?>


	<!-- Page: index => has it's own style.
	================================================== -->

		<div class="container text-center">
				<h3 class="indexTitle">Lighting your view of the future!</h3>
		</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">

<!-- page: index
================================================== -->
		<div class="col-sm-4 text-center">
			<h3>About US</h3>
			<div class="row index-col">
				<p>Harvatek Technologies was built on the resources of a world class LED manufacturer based in Hsin-Chu, Taiwan. 
				   The mother company, Harvatek Corporation, was established back in 1995 as an SMD LED supplier. </p>
			<a href="company-profile.php" class="btn btn-primary">Read More</a>
			</div>
		</div>
		<div class="col-sm-4 text-center">
			<h3>Applications</h3>
			<div class="row index-col ">
				<p>Designing components to meet the needs of a wide range of design and efficiency requirement,
					Harvatek Technologies offers high quality and competitive LED solutions for industries across the globe. </p>
			<a href="applications.php" class="btn btn-primary">Read More</a>
			</div>
		</div>
		<div class="col-sm-4 newsList">
			<h3 class="text-center">News</h3>

			<!-- Latest Posts -->
			<?php
			if(is_array($newsArr)) {
				foreach($newsArr as $key => $val) {
						echo '	<p>
										<a href="news.php?i='.$newsArr[$key]['news_id'].'">'.$newsArr[$key]['name'].'</a><br/>
										<span class="date">'.$newsArr[$key]['post_date'].'<span></p>
								<hr/>';
				}
			}
			?>
			
		</div>
	</div>
</section>
<section id="featureProduct">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 hidden-xs"><hr/></div>
				<h3 class="col-sm-4 text-center">Featured Products</h3>
				<div class="col-sm-4 hidden-xs"><hr/></div>
			</div>
			<div class="row">
				<?php
				if(is_array($arr))
				{
					foreach($arr as $key => $val)
					{
						echo '
								<div class="col-sm-2 col-xs-4 text-center">
									<div class="featured text-center">
										<a href="details.php?i='.$arr[$key]['product_id'].'" >
										<img width="100" src="'.$cProduct->webRoot.$arr[$key]['product_id'].$arr[$key]['ext'].'" alt="'.$arr[$key]['name'].'">
										<p>'.$arr[$key]['name'].'</p>
										</a>
									</div>
								</div>
						';
					}
				}
				?>
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