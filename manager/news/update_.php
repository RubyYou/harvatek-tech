<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/
/*code*/
$_POST['news_id'] = intval($_GET['news_id']);
$cNews = new News();
$cNews->updateNews($_POST);
goto_('list.php');
?>