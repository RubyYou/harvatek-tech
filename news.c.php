<?php
include_once 'config/config.main.front.php';

$cNews = new News();
$arr = $cNews->getNews_Front($_GET['i']);
//$arr = $cNews->getNews_Front();
$cProduct = new Product();
$categoriesMenu = $cProduct->getCategoriesMenu();
?>