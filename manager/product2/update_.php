<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['product2_id'] = intval($_GET['product2_id']);
$cProduct2 = new Product2();
$cProduct2->updateProduct2($_POST);
goto_('list.php');
?>