<?php
/***************************************
 *Error message
 **************************************/
//date_default_timezone_set('Asia/Taipei');
date_default_timezone_set('UTC');
ini_set('display_errors', true);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
//error_reporting(E_ALL ^ (E_NOTICE));
//ini_set('upload_max_filesize',10240);

/***************************************
 *Meta Tag-
 ***************************************/
define(WEB_CHARSET,'utf-8');
define(WEB_KEYWORD,'harvatek-tech');
define(WEB_DESCRIPTION,'harvatek-tech');
define(WEB_KEYWORD_CN,'');
define(WEB_DESCRIPTION_CN,'');
/***************************************
 *Define-
 *Front-End
 ***************************************/
define(WEB_HOST,$_SERVER['HTTP_HOST']);//gethostbyname($_SERVER['HTTP_HOST']) || $_SERVER['HTTP_HOST'];
define(WEB_ROOT,'http://'.WEB_HOST.'/harvatek-tech-git/');
define(WEB_PATH,$_SERVER['DOCUMENT_ROOT'].'/harvatek-tech-git/');
define(WEB_TITLE,'harvatek-tech');
define(FWEB_TITLE,'harvatek-tech');
define(FWEB_WEBSITEMAIL,'nick14@targets.com.tw');
define(FWEB_SERVICEMAIL1,'nick@targets.com.tw');
define(FWEB_SERVICEMAIL2,'');
define(FWEB_SERVICEMAILTITLE,'Harvatek Technologies');
/***************************************
 *Define-
 *DB path
 ***************************************/
define(DBCONFIG,WEB_PATH."config/db.config.local.php");
/***************************************
 *Define-
 *BackgroundManager
 ***************************************/
define(BGM_ACCOUNTSETTING,1);//Login---> 1 = use file , 2 = use db
define(BGM_ROOT,WEB_ROOT.'manager/');
define(BGM_PATH,WEB_PATH.'manager/');
define(BGM_UPLOADPATH,WEB_PATH.'uploads/');
define(BGM_TITLE,WEB_TITLE.' Control Panel.');
define(BGM_WELCOME,'Welcome to '.WEB_TITLE.' Control Panel.');

/***************************************
 *Define-
 *Copyright
 ***************************************/

define(OFFICIAL,'Nick');
define(DESIGNBYOFFICIAL,'Design by:'.OFFICIAL);
define(OFFICIALWEBSITE,'http://www.nickchen14.com');
define(FULLCOPYRIGHT,'Copyright © '.date('Y').' Nick');
define(SHORTCOPYRIGHT,'Copyright © '.date('Y').' Nick');
define(WEBSITEAUTHOR,'Nick');

/***************************************
 *Define-
 *String
 ***************************************/
define(STR_REDIRECTPAGE,'Redirect...');
define(STR_RESET,'Reset');
define(STR_LOGIN,'Login');
define(STR_LOGOUT,'Logout');
define(STR_SUBMIT,'Submit');
define(STR_ACCOUNT,'Account');
define(STR_PASSWORD,'Password');

define(STR_NULLACCOUNT,STR_ACCOUNT.' is required field!');
define(STR_NULLPASSWORD,STR_PASSWORD.' is required field!');
define(STR_NULLACCOUNTPASSWORD,'Please fill in '.STR_ACCOUNT.'&'.STR_PASSWORD.'!');

define(STR_CHANGEPASSWORDSUCCESS,'Edit success!\\nPlease use new '.STR_PASSWORD.' login.');
define(STR_CHANGEACCOUNTPASSWORDSUCCESS,'Edit success!\\nPlase use new '.STR_ACCOUNT.'&'.STR_PASSWORD.' login.');

define(STR_VALIDACCOUNT,STR_ACCOUNT.' format error!');
define(STR_VALIDPASSWORD,STR_PASSWORD.' format error！');
define(STR_VALIDNEWPASSWORD,'New '.STR_PASSWORD.' is error!');
define(STR_VALIDIMGCODE,'Captcha is error!');

define(STR_SEARCHACCOUNTPASSWORD,'Without this '.STR_ACCOUNT.'&'.STR_PASSWORD.'!');

define(STR_UPLOAD,'upload file');
define(STR_UPLOADSUCCESS,STR_UPLOAD.' success!');
define(STR_UPLOADFAIL,STR_UPLOAD.' fail!');

define(STR_ADD,'Add');
define(STR_ADDSUCCESS,STR_ADD.' success!');
define(STR_ADDFAIL,STR_ADD.' fail!');

define(STR_EDIT,'Edit');
define(STR_EDITSUCCESS,STR_EDIT.' success!');
define(STR_EDITFAIL,STR_EDIT.' fail!');

define(STR_DELETE,'Delete');
define(STR_DELETESUCCESS,STR_DELETE.' success!');
define(STR_DELETEFAIL,STR_DELETE.' fail!');
define(STR_DELETECONFIRM, 'Are you sure to Delete?');

define(STR_LIST,'List');

define(STR_PREVPAGE,'Prev page');
define(STR_NEXTPAGE,'Next page');
define(STR_ATPAGE,'Now At');
define(STR_TOTAL,'Total');
define(STR_PAGE,'Page');

define(STR_ORDER,'Sort');

define(STR_EMAILSENDED,'信件已寄出，我們將儘快與您聯絡！');
define(STR_EMAILSENDFAIL,'信件寄送失敗，請稍後再試！');
define(STR_VALIDCODEERROR,'驗證碼輸入錯誤！');
define(STR_DATAERROR,'資料輸入有誤，請重新輸入！');

define(STR_BACKTOLIST, 'Back to list');
?>