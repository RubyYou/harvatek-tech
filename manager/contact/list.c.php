<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/


$cContact = new Contact();
$page = $cContact->getPage($_GET['nowpage']);
$nowpage = $page['nowpage'];
?>