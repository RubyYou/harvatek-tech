<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cProduct4 = new Product4();
$cProduct4->addProduct4($_POST);
goto_('list.php');
?>