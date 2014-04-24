<?php
/*
 * @name validation
 * @version 1.0
 * @author Nick
 * @copyright 2013 TARGETS
 * @updated 2014-01-14
 */

//中文姓名
function validChineseName($str) {
    return preg_match("/^[\u4e00-\u9fa5]{2,4}$/",$str);
}
//英文姓名
function validEnglishName($str) {
    return preg_match("/^[a-zA-Z\_\s]+$/",$str);
}
//家用電話 ***-********
function validHomePhone($str) {
    return preg_match("/^[0][1-9]{1,2}[-][0-9]{6,8}$/",$str);
}
//手機
function validCellPhone($str) {
    return preg_match("/^(0)(9)([0-9]{8})$/",$str);
}
//公司電話 ***-********#***
function validCompanyPhone1($str) {
    return preg_match("/^[0][1-9]{1,2}[-][0-9]{6,8}[#]?[0-9]*$/",$str);
}
//公司電話 (0**)****-****
function validCompanyPhone2($str) {
    return preg_match("/^[(][0][1-9]{1,2}[)][0-9]{3,4}[-][0-9]{3,4}$/",$str);
}
//公司電話加分機 (0**)****-****#*******
function validCompanyPhone3($str) {
    return preg_match("/^[(][0][1-9]{1,2}[)][0-9]{3,4}[-][0-9]{3,4}[#][0-9]+$/",$str);
}

//電話限制-一般電話 (***)-***-****
function validPhone1($str) {
    return preg_match("/^[(][0][1-9]{1,2}[)][0-9]{3,4}[-][0-9]{3,4}$/",$str);
}
//電話限制-客服 ****-****-****
function validServicePhone1($str) {
    return preg_match("/^[0-9]{4,4}[-][0-9]{3,4}[-][0-9]{3,4}$/",$str);
}
//電話限制-客服 ****-***-***
function validServicePhone2($str) {
    return preg_match("/^[0-9]{4,4}[-][0-9]{3}[-][0-9]{3}$/",$str) ;
}

//Email
function validEmail($str) {
    return preg_match("/^[0-9a-zA-Z]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/",$str);
}

//身份證字號
function validIdNo($str) {
    return preg_match("/^[A-Za-z]{1}[1-2]{1}[0-9]{8}$/",$str);
}

//網址
function validHttp($str) {
    return preg_match("/^(((http|https|ftp):\/\/)?([[a-zA-Z0-9]\-\.])+(\.)([[a-zA-Z0-9]]){2,4}([[a-zA-Z0-9]\/+=%&amp;_\.~?\-]*))*$/",$str);
}

//IP
function validIP($str) {
    return preg_match("/^((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))*$/",$str);
}

//數字
function validInt($str) {
    return preg_match("/^[0-9]+$/",$str);
}

//信用卡
function validCreditCard($str) {
    return preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|622((12[6-9]|1[3-9][0-9])|([2-8][0-9][0-9])|(9(([0-1][0-9])|(2[0-5]))))[0-9]{10}|64[4-9][0-9]{13}|65[0-9]{14}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})*$/",$str);
}

//密碼
function validPassword1($str) {
    return preg_match("/^[^\s\"\&]{6,20}$/",$str);//6~20個字元英文、數字、各種符號，不得為空白鍵、「"」及「&」
}


?>