<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['color_id'] = intval($_GET['color_id']);
$cColor = new Color();
$cColor->updateColor($_POST);
goto_('list.php');
?>