<?php
include_once 'config/config.main.front.php';
$cProduct = new Product();
$categoriesMenu = $cProduct->getCategoriesMenu();
//echo '<pre>'.htmlspecialchars($categoriesMenu).'</pre>';
$table_id = intval($_GET['t']);
$products_id = intval($_GET['ps']);
$product_arr = $cProduct->getFrontPage($table_id,$products_id);
//print_r($product_arr);
$path = $cProduct->getProductPath($table_id,$products_id);
?>