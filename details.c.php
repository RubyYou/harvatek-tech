<?php
include_once 'config/config.main.front.php';
$cProduct = new Product();
$categoriesMenu = $cProduct->getCategoriesMenu();
$product_id = intval($_GET['i']);
$product_arr = $cProduct->getProduct($product_id);
//$quantity_visible = $product_arr['quantity_visible'];
//$color_options = $product_arr['color_options'];
//$cri_options = $product_arr['cri_options'];

$cColor = new Color();
$cCri = new Cri();

?>