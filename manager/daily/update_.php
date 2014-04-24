<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['daily_id'] = intval($_GET['id']);
$cDaily = new Daily();
$cDaily->updateDaily($_POST);
goto_('list.php');
?>