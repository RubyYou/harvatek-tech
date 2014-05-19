<?php
session_start();
include_once 'config/config.main.front.php';
$_SESSION['form'] = $_POST;
$_POST['cart'] = $_SESSION['cart'];
$cInquiry = new Inquiry();
$inquiry_id = $cInquiry->addInquiry($_POST);
if($inquiry_id > 0){
	$_SESSION['form']['inquiry_id'] = $inquiry_id;
	goto_('confirm.php');
}
else{
	callAlert('something error.\nPlease try again.\nerror:'.$res);
	goto_('cart.php');
}
?>