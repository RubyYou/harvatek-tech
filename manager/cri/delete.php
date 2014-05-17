<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cCir = new Cir();
$cCir->deleteCir($_GET['cir_id']);
header('Location:list.php?nowpage='.$_GET["nowpage"]);
?>