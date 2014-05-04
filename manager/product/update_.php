<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['product_id'] = intval($_GET['product_id']);
$cProduct = new Product();
$cProduct->updateProduct($_POST,$_FILES);
goto_('list.php');
?>