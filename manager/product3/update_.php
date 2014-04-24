<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['product3_id'] = intval($_GET['product3_id']);
$cProduct3 = new Product3();
$cProduct3->updateProduct3($_POST);
goto_('list.php');
?>