<?php
include_once("../../../config/config.main.php");
$cAddress = new Address();
$area = $cAddress->getArea($_REQUEST['city']);
echo json_encode($area);
$cAddress->close();
unset($address);
?>