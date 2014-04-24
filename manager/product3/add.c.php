<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
$cProduct1 = new Product1();
$product1Ary = $cProduct1->getAll();
$cProduct2 = new Product2();
$product2Select = $cProduct2->getSelect($product1Ary);
;?>