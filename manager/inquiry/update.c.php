<?php
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/




$cInquiry = new Inquiry();
$arr = $cInquiry->getInquiry($_GET['inquiry_id']);
$item_arr = $cInquiry->getInquiryItem($_GET['inquiry_id']);
?>