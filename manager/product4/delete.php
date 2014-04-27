<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cProduct4 = new Product4();
$cProduct4->deleteProduct4($_GET['product3_id'],$_GET['product4_id']);
header('Location:list.php?nowpage='.$_GET["nowpage"].'&product3_id='.$_GET['product3_id']);
?>