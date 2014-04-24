<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/


$cProduct1 = new Product1();
$product1Ary = $cProduct1->getAll();


$cProduct3 = new Product3();
$arr = $cProduct3->getProduct3($_GET['product3_id']);


$cProduct2 = new Product2();
$product2Select = $cProduct2->getSelect($product1Ary,$arr['product2_id']);
?>