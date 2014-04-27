<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/


$cProduct3 = new Product3();
$arr = $cProduct3->getProduct3($_GET['product3_id']);


$cProduct2 = new Product2();
$product2Select = $cProduct2->getSelect($arr['product2_id']);
?>