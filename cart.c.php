<?php
session_start();
include_once 'config/config.main.front.php';

$cProduct = new Product();
$cartItems = $_SESSION['cart'];
if(count($cartItems) > 0)
{
	foreach($cartItems as $key => $val)
	{
		$product = $cProduct->getProduct($cartItems[$key]['id']);
		$cartItems[$key]['name'] = $product['name'];
		$cartItems[$key]['img'] = $cProduct->webRoot.$product['product_id'].$product['ext'];
		$cartItems[$key]['quantity_info'] = $cProduct->quantityOption[$cartItems[$key]['quantity']];
	}
	
}
else
{
	callAlert('inquiry cart empty.');
	goto_('brands.php');
}
?>