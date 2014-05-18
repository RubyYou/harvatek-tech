<?php
session_start();
include_once 'config/config.main.front.php';
$id = intval($_GET['i']);
if($id != 0)
{
	extract($_POST);
	$item = array(
			'id'			=>		$id,
			'quantity' 		=>		$quantity,
			'color'			=>		$color,
			'cri'			=>		$cri
		);
	
	if(count($_SESSION['cart']) > 0)
	{
		foreach($_SESSION['cart'] as $key => $val)
		{
			if($_SESSION['cart'][$key]['id'] == $id && $_SESSION['cart'][$key]['cri'] == $cri && $_SESSION['cart'][$key]['color'] == $color && $_SESSION['cart'][$key]['quantity'] != $quantity)
			{
				$_SESSION['cart'][$key]['quantity'] = $quantity;
			}
			else if($_SESSION['cart'][$key]['id'] == $id && $_SESSION['cart'][$key]['cri'] == $cri && $_SESSION['cart'][$key]['color'] == $color && $_SESSION['cart'][$key]['quantity'] == $quantity)
			{
				
			}
			else
			{
				$_SESSION['cart'][] = $item;
			}
		}
	}
	else
	{
		$_SESSION['cart'][] = $item;
	}
	
	$_SESSION['cart'] = array_unique($_SESSION['cart'],SORT_REGULAR);
	
	
	//echo '<pre>';
	//print_r($_SESSION['cart']);
	//echo '</pre>';
	callAlert('Added!');
	goto_('details.php?i='.$id);
}
else
{
	callAlert('Error Product!');
	goto_('details.php?i='.$id);
}
?>