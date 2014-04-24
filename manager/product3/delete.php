<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cProduct3 = new Product3();
$cProduct3->deleteProduct3($_GET['product2_id'],$_GET['product3_id']);
header('Location:list.php?nowpage='.$_GET["nowpage"].'&product2_id='.$_GET['product2_id']);
?>