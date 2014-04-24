<?php
session_start();
include_once '../config/config.main.php';
$cPri = new Pri();
if(!$cPri->checkLogin()){goto_(BGM_ROOT);}
unset($cPri);
?>