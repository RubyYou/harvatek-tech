<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/




$cColor = new Color();
$arr = $cColor->getColor($_GET['color_id']);

?>