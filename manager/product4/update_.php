<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['product4_id'] = intval($_GET['product4_id']);
$cProduct4 = new Product4();
$cProduct4->updateProduct4($_POST);
goto_('list.php');
?>