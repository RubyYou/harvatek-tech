

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
				<h3> Contact Us</h3>
			</div>
		</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">
		<p class="lead text-center">We would love to hear from you!<br/>
		Please fill out this form and we will get in touch with you shortly.</p>
<!-- product // table & product location
================================================== -->
	<form id="form" class="form-horizontal">
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
		<div class="row form-group">
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="display" name="inquiryProduct"><b>Display</b></li>
				<li><input type="checkbox" value="Numeric" name="inquiryProduct" >Numeric</li>
				<li><input type="checkbox" value="Dot-Matrix" name="inquiryProduct">Dot Matrix</li>
				<li><input type="checkbox" value="SMD-Display" name="inquiryProduct">SMD Display</li>
			</ul>
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="SMD-LED" name="inquiryProduct"><b>SMD LED</b></li>
				<li><input type="checkbox" value="Surface-Mount" name="inquiryProduct">Surface Mount</li>
				<li><input type="checkbox" value="Back-Lighting" name="inquiryProduct">Back Lighting</li>
				<li><input type="checkbox" value="General-Lighting" name="inquiryProduct">General Lighting</li>
				<li><input type="checkbox" value="LM-80" name="inquiryProduct">LM-80</li>
			</ul>
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="Through-Hole-LED" name="inquiryProduct"><b>Through Hole LED</b></li>
				<li><input type="checkbox" value="Round-Lamp" name="inquiryProduct">Round Lamp</li>
				<li><input type="checkbox" value="Oval-Lamp" name="inquiryProduct">Oval Lamp</li>
				<li><input type="checkbox" value="Piranha" name="inquiryProduct">Piranha</li>
				<li><input type="checkbox" value="Lead-Frame-Axial" name="inquiryProduct">Lead Frame Axial</li>
				<li><input type="checkbox" value="Lamp-with-housing" name="inquiryProduct">Lamp with housing</li>
			</ul>
			<ul class="col-sm-3 col-xs-6">
				<li><input type="checkbox" value="Infrared" name="inquiryProduct"><b>Infrared</b></li>
				<li><input type="checkbox" value="Emitter" name="inquiryProduct">Emitter</li>
				<li><input type="checkbox" value="Sensor" name="inquiryProduct">Sensor</li>
				<li><input type="checkbox" value="Photo-Coupler" name="inquiryProduct">Photo Coupler</li>
				<li><input type="checkbox" value="UV-LED" name="inquiryProduct"><b>UV LED</b></li>
			</ul>
		</div>
		<div class="form-group">
			 <label for="assistant" class="col-md-1 control-label">Application Assistant</label>
			 <div class="col-md-11">
			 <textarea type="text" class="form-control" row="5" name="Application-Assist"></textarea>
			</div>
		</div>
		<div class="row text-center">
			<button type="reset" class="btn btn-primary">RESET</button>
			<button type="submit" class="btn btn-danger">SUBMIT</button>
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