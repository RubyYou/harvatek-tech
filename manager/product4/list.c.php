<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/



$cProduct3 = new Product3();
$product3Ary = $cProduct3->getAll();

$product3_id = intval($_GET['product3_id']);
if($product3_id == 0) $product3_id = $product3Ary[0]['product3_id'];

$product3Select = $cProduct3->getSelect($product3_id,true);
$cProduct4 = new Product4();
$page = $cProduct4->getPage($_GET['nowpage'],$product3_id);
$nowpage = $page['nowpage'];
;?>