<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
$cProduct3 = new Product3();
$product3Select = $cProduct3->getSelect($product1Ary);
;?>