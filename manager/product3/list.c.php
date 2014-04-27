<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/


$cProduct2 = new Product2();
$product2Ary = $cProduct2->getAll();

$product2_id = intval($_GET['product2_id']);
if($product2_id == 0) $product2_id = $product2Ary[0]['product2_id'];

$product2Select = $cProduct2->getSelect($product2_id,true);
$cProduct3 = new Product3();
$page = $cProduct3->getPage($_GET['nowpage'],$product2_id);
$nowpage = $page['nowpage'];
;?>