<?php
include_once 'config/config.main.front.php';
$cProduct = new Product();
$categoriesMenu = $cProduct->getCategoriesMenu();
?>