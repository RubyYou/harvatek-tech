<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['cri_id'] = intval($_GET['cri_id']);
$cCri = new Cri();
$cCri->updateCri($_POST);
goto_('list.php');
?>