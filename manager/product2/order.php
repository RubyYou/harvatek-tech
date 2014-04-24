<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/




$cProduct2=new Product2();
$keyAry['product1_id'] = $_GET['product1_id'];
$cProduct2->change_order("product2_id",$_GET['product2_id'],$keyAry,$_GET['order'],$cProduct2->table1);
unset($cProduct2);
header("Location:list.php?".$_SERVER['QUERY_STRING']);
?>