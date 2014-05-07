

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
				<h3> Contact US</h3>
			</div>
			<p class="subTitle"> We would love to hear from you! </p>
		</div>
	</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">
		<p class="lead text-center">Please fill out this form and we will get in touch with you shortly.</p>
<!-- product // table & product location
================================================== -->
	<form class="form-horizontal" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					 <label for="Name" class="col-md-3 control-label">Name</label>
					 <div class="col-md-9">
					 <input type="text" class="form-control" name="name">
					</div>
				</div>
				<div class="form-group">
					 <label for="email" class="col-md-3 control-label">Email</label>
					 <div class="col-md-9">
					 <input type="email" class="form-control" name="email">
					</div>
				</div>
				<div class="form-group">
					 <label for="phone" class="col-md-3 control-label">Phone</label>
					 <div class="col-md-9">
					 <input type="number" class="form-control" name="phone">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					 <label for="company" class="col-md-3 control-label">Company</label>
					 <div class="col-md-9">
					 <input type="text" class="form-control" name="company">
					</div>
				</div>
				<div class="form-group">
					 <label for="position" class="col-md-3 control-label">Position</label>
					 <div class="col-md-9">
					 <input type="text" class="form-control" name="position">
					</div>
				</div>
				<div class="form-group">
					 <label for="feedback" class="col-md-3 control-label">Other Feedback</label>
					 <div class="col-md-9">
					 <textarea type="text" class="form-control" row="5" name="feedback"></textarea>
					</div>
				</div>
			</div>
		</div>
		
			<p class="lead text-center"> Inquiry Topic </p>
			<hr/>
		<div class="row">
			
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="display" name="display"><b>Display</b></li>
				<li><input type="checkbox" value="display" name="display">Throught Hole Display</li>
				<li><input type="checkbox">Numeric</li>
				<li><input type="checkbox">Dot Matrix</li>
				<li><input type="checkbox">SMD Display</li>
			</ul>
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="display" name="display"><b>SMD LED</b></li>
				<li><input type="checkbox" value="display" name="display">Surface Mount</li>
				<li><input type="checkbox">Back Lighting</li>
				<li><input type="checkbox">General Lighting</li>
				<li><input type="checkbox">LM-80</li>
			</ul>
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="display" name="display"><b>THROUGH Hole LED</b></li>
				<li><input type="checkbox" value="display" name="display">Round Lamp</li>
				<li><input type="checkbox">Oval Lamp</li>
				<li><input type="checkbox">Piranha</li>
				<li><input type="checkbox">Lead Frame Axial</li>
				<li><input type="checkbox">Lamp with housing</li>
			</ul>
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="display" name="display"><b>Infrared</b></li>
				<li><input type="checkbox">Emitter</li>
				<li><input type="checkbox">Sensor</li>
				<li><input type="checkbox">Photo Coupler</li>
				<li><input type="checkbox"><b>UV LED</b></li>
			</ul>
		</div>
		<div class="form-group">
			 <label for="assistant" class="col-md-1 control-label">Application Assistant</label>
			 <div class="col-md-11">
			 <textarea type="text" class="form-control" row="5" name="feedback"></textarea>
			</div>
		</div>
		<div class="row text-center">
			<a href="#" class="btn btn-default"> RESET</a>
			<a href="#" class="btn btn-danger">SUBMIT</a>
		</div>
		</form>

	</div>
</section>

	<!-- Footer & javascript 
    ================================================== -->
<?php include("includes/footer.php");?>
<?php include("includes/javascript.php");?>

</body>
</html>