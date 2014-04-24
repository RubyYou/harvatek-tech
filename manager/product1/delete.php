<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cProduct = new Product1();
$cProduct->deleteProduct1($_GET['product1_id']);
header("Location:list.php?nowpage=".$_GET['nowpage']);
?>