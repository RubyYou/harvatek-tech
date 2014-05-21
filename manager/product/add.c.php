<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
$cProduct = new Product();
$categoriesSelect = $cProduct->getCategoriesSelect();

$cColor = new Color();
$colorSelect = $cColor->getPage();
$cCri = new Cri();
$criSelect = $cCri->getPage();
?>