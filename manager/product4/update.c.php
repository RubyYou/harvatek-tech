<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/




$cProduct4 = new Product4();
$arr = $cProduct4->getProduct4($_GET['product4_id']);

$cProduct3 = new Product3();
$product3Select = $cProduct3->getSelect($arr['product3_id']);
?>