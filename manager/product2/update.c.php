<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
$cProduct1 = new Product1();
$product1Select = $cProduct1->getSelect($_GET['product1_id']);
$cProduct2 = new Product2();
$arr = $cProduct2->getProduct2($_GET['product2_id']);
?>