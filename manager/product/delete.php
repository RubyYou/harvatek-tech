<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cProduct = new Product();
$cProduct->deleteProduct($_GET['product_id']);
header('Location:list.php?nowpage='.$_GET["nowpage"].'&table_id='.$_GET['table_id'].'&products_id='.$_GET['products_id']);
?>