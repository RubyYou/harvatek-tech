<?php
include_once 'config/config.main.front.php';
$cProduct = new Product();
$categoriesMenu = $cProduct->getCategoriesMenu();
//echo '<pre>'.htmlspecialchars($categoriesMenu).'</pre>';
$searchKey = trim($_GET['k']);
if(!empty($searchKey)) {
    $product_arr = $cProduct->getSearch(intval($_GET['nowpage']),$_GET['k']);
}
//print_r($product_arr);
//$path = $cProduct->getProductPath($table_id,$products_id);
?>