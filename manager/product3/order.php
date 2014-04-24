<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/




$cProduct3=new Product3();
$keyAry['product2_id'] = $_GET['product2_id'];
$cProduct3->change_order("product3_id",$_GET['product3_id'],$keyAry,$_GET['order'],$cProduct3->table1);
unset($cProduct3);
header("Location:list.php?".$_SERVER['QUERY_STRING']);
?>