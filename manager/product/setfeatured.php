<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/

$product_id = intval($_POST['i']);
$featured = ($_POST['v'] == true) ? 1 : 0;
$cProduct = new Product();
echo $cProduct->updateFeatured($product_id,$featured);
unset($cProduct);
?>