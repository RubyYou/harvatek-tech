<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['product1_id'] = intval($_GET['product1_id']);
$cProduct = new Product1();
$cProduct->updateProduct1($_POST);
goto_('list.php');
?>