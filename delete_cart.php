<?php
session_start();
include_once 'config/config.main.front.php';
$id = $_GET['i'];
$quantity = $_GET['q'];
$color = $_GET['c'];
$cri = $_GET['r'];

foreach($_SESSION['cart'] as $key => $val)
{
	if($_SESSION['cart'][$key]['id'] == $id && $_SESSION['cart'][$key]['quantity'] == $quantity && $_SESSION['cart'][$key]['color'] == $color && $_SESSION['cart'][$key]['cri'] == $cri)
	{
		unset($_SESSION['cart'][$key]);
	}
}
goto_('cart.php');
?>