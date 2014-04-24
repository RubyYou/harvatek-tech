<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/



$cProduct1 = new Product1();
$product1Ary = $cProduct1->getAll();

$product1_id = intval($_GET['product1_id']);
if($product1_id == 0) $product1_id = $product1Ary[0]['product1_id'];

$product1Select = $cProduct1->getSelect($product1_id,true);
$cProduct2 = new Product2();
$page = $cProduct2->getPage($_GET['nowpage'],$product1_id);
$nowpage = $page['nowpage'];
;?>