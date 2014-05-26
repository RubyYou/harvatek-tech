<?php include 'confirm.c.php';?>

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
				<h3> Your Inquiry Details </h3>
			</div>
		</div>
</header>


	<!-- Content
    ================================================== -->

<section id="content">
	<div class="container">

<!-- inQuiry details
	================================================== -->
		<p class="lead text-center well">Thank you! your inquiry has been received.</p>

		<h3 class="pull-left"> Inquiry products</h3>
		<p class="pull-right date"> <b>Inquiry number</b> # <?php echo $form['inquiry_id'];?> / 
			<b>Date</b>
			<?php echo date("d/M/Y");?></p>
		<table width="100%" border="1" class="text-center">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Other info</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(count($cartItems))
				{
					/***************** email.html *****************/
					$emailList = '';
					
					
					foreach($cartItems as $key => $val)
					{
						$color = ($cartItems[$key]['color'] == '') ? '' : '<p> Color:'.$cartItems[$key]['color'].'</p>';
						$cri = ($cartItems[$key]['cri'] == '') ? '' : '<p> Cri:'.$cartItems[$key]['cri'].'</p>';
				?>
							<tr>
								<td><img src="<?php echo $cartItems[$key]['img'];?>" width="60" height="60" alt="product-thumbnails"></td>
								<td><a href="details.php?i=<?php echo $cartItems[$key]['id'];?>"><?php echo $cartItems[$key]['name'];?></a></td>
								<td><?php echo $cartItems[$key]['quantity_info'];?></td>
								<td>
									<?php echo $color;?>
									<?php echo $cri;?>
								</td>
							</tr>
				<?php
							$emailList .= '<tr style="background:#EDECEC; color:#183648;" align="center">
												<td height="35">'.$cartItems[$key]['name'].'</td>
												<td>'
													.$color . $cri .
												'</td>
												<td>'.$cartItems[$key]['quantity_info'].'</td>
											</tr>
											';
					}
					
					
					
					
					$cMail=new Mail(FWEB_SERVICEMAILTITLE,FWEB_WEBSITEMAIL,$form['email'],"email.html");
					$cMail->setBcc(FWEB_SERVICEMAIL1);
					$cMail->assign("country",$form['country']);
					$cMail->assign("address",$form['address']);
					$cMail->assign("first_name",$form['first_name']);
					$cMail->assign("postcode",$form['postcode']);
					$cMail->assign("last_name",$form['last_name']);
					$cMail->assign("address_option",$form['address_option']);
					$cMail->assign("additionalinfo",$form['additionalinfo']);
					$cMail->assign("email",$form['email']);
					$cMail->assign("phone",$form['phone']);
					$cMail->assign("list",$emailList);
					$cMail->assign("addtime",date("Y-m-d H:i:s"));
					$cMail->replace();
					$cMail->send();
				}
				?>
			</tbody>
		</table>
	</div>
</section>

<!-- client info, show after click next step button -->
<section id="clientdetail">
	<div class="container">
		<h3 >Your Info</h3>
		<hr/>
			<div class="col-md-6">
				<div class="row">
					<p class="col-xs-3"><b>Country</b></p><p class="col-xs-9"><?php echo $form['country'];?></p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>First Name</b></p><p class="col-xs-9"><?php echo $form['first_name'];?></p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Last Name</b></p><p class="col-xs-9"><?php echo $form['last_name'];?></p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Email</b></p><p class="col-xs-9"><?php echo $form['email'];?></p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Phone</b></p><p class="col-xs-9"><?php echo $form['phone'];?></p>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<p class="col-xs-3"><b>Address</b></p><p class="col-xs-9"><?php echo $form['address'];?></p>
				</div>
				<div class="row">
					<p class="col-xs-3"> </p><p class="col-xs-9"><?php echo $form['address_option'];?></p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Zip Code</b></p><p class="col-xs-9"><?php echo $form['postcode'];?></p>
				</div>
				<div class="row">
					<p class="col-xs-3"><b>Additional Info</b></p><p class="col-xs-9">
						<?php echo nl2br($form['additionalInfo']);?>
					</p>
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