<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/




$cProduct4=new Product4();
$keyAry['product3_id'] = $_GET['product3_id'];
$cProduct4->change_order("product4_id",$_GET['product4_id'],$keyAry,$_GET['order'],$cProduct4->table1);
unset($cProduct4);
header("Location:list.php?".$_SERVER['QUERY_STRING']);
?>