<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){goto_(BGM_ROOT);}
unset($cPri);
/*permission*/

/*code*/
?>