<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/



$cProduct = new Product();
$ary = $cProduct->getProduct($_GET['product_id']);
$keyAry['table_id'] = $ary['table_id'];
$keyAry['products_id'] = $ary['products_id'];
$cProduct->change_order("product_id",$ary['product_id'],$keyAry,$_GET['order'],$cProduct->table1);
unset($cProduct);
header("Location:list.php?".$_SERVER['QUERY_STRING']);
?>