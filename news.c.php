<?php
include_once 'config/config.main.front.php';

$cNews = new News();
$arr = $cNews->getNews_Front($_GET['i']);
$cProduct = new Product();
$categoriesMenu = $cProduct->getCategoriesMenu();
?>