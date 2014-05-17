<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/


$cCri = new Cri();
$page = $cCri->getPage($_GET['nowpage']);
$nowpage = $page['nowpage'];
?>