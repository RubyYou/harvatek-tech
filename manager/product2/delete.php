<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cProduct2 = new Product2();
$cProduct2->deleteProduct2($_GET['product1_id'],$_GET['product2_id']);
header("Location:list.php?nowpage=".$_GET['nowpage']);
?>