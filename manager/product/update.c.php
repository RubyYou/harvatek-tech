<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/




$cProduct = new Product();
$arr = $cProduct->getProduct($_GET['product_id']);
$categoriesSelect = $cProduct->getCategoriesSelect($arr['table_id'].'-'.$arr['products_id']);

?>