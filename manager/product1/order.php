<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
$cProduct=new Product1();
$cProduct->change_order("product1_id",$_GET['product1_id'],'',$_GET['order'],$cProduct->table1);
unset($cProduct);
header("Location:list.php?".$_SERVER['QUERY_STRING']);
?>