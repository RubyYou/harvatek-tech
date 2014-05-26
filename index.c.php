<?php
include_once 'config/config.main.front.php';
$cProduct = new Product();
$arr = $cProduct->getFeatured();
$cNews = new News();
$newsArr = $cNews->getNews_Front();
?>