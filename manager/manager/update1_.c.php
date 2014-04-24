<?php
session_start();
include_once '../../config/config.main.php';
require_once(BGM_PATH.'config/password.php');
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){goto_(BGM_ROOT);}
unset($cPri);
/*permission*/

/*code*/
if($_POST['o_acc'] != $user || $_POST['o_pwd'] != $pwd)
{
    callAlert(STR_NULLACCOUNTPASSWORD);
    goback();
}
else
{
    
    $fp = fopen(BGM_PATH.'config/password.php', 'w');
    fwrite($fp, '<?php $user=\''.trim($_POST['n_acc']).'\'; $pwd=\''.trim($_POST['n_pwd1']).'\';?>');
    fclose($fp);
    
    
    callAlert(STR_CHANGEACCOUNTPASSWORDSUCCESS);
    goto_('../welcome.php');
    
}

?>