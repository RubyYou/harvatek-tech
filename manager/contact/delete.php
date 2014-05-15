<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cContact = new Contact();
$cContact->deleteContact($_GET['contact_id']);
header('Location:list.php?nowpage='.$_GET["nowpage"].'&contact_id='.$_GET['contact_id']);
?>