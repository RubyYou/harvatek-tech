<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
$cProduct2 = new Product2();
$product2Select = $cProduct2->getSelect($product1Ary);
;?>