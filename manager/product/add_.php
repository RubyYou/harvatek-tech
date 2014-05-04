<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/


$cProduct = new Product();
$cProduct->addProduct($_POST,$_FILES);
goto_('list.php');
?>