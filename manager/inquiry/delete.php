<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cInquiry = new Inquiry();
$cInquiry->deleteInquiry($_GET['inquiry_id']);
header('Location:list.php?nowpage='.$_GET["nowpage"]);
?>