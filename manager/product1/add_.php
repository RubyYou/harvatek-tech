<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$cProduct1 = new Product1();
$cProduct1->addProduct1($_POST,$_FILES);
goto_('list.php');
?>