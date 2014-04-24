<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
//$DB = new MyDb();
$cProduct1 = new Product1();
$page = $cProduct1->getPage($_GET['nowpage']);
$nowpage = $page['nowpage'];
;?>