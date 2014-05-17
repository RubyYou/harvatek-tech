<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/


$cColor = new Color();
$page = $cColor->getPage($_GET['nowpage']);
$nowpage = $page['nowpage'];
?>