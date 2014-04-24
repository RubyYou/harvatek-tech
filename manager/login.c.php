<?php
ob_start();
include_once '../config/config.main.php';
if($_POST['acc']=='' || $_POST['pwd']=='')
{
	callAlert(STR_NULLACCOUNTPASSWORD);
	goback();
}
else
{
	switch(BGM_ACCOUNTSETTING)
	{
		case 1:
			//file
			require_once(BGM_PATH.'config/password.php');
			$flag=false;
			if($_POST['acc']==$user && $_POST['pwd']==$pwd)
				$flag=true;
			if($flag)
			{
				session_start();
				//tiny_mce
				$_SESSION['isLoggedIn'] = true;
				//tiny_mce
				$cPri = new Pri();
				$cPri->loginIn();
				unset($cPri);
				header('Refresh: 1; URL=_index.php');
				header('Content-Type:text/html; charset="'.WEB_CHARSET.'"');
				echo STR_REDIRECTPAGE;
				
			}
			else
			{
				
				callAlert(STR_SEARCHACCOUNTPASSWORD);
				goback();
			}
			break;
		case 2:
			//DB
			$DB = new MyDb();
			$cManager = new Manager();
			$cManager->setDB($DB);
			$count = $cManager->login($_POST);
			unset($cManager);
			if($count[0]['mCount'] == 1)
			{
				session_start();
				//tiny_mce
				$_SESSION['isLoggedIn'] = true;
				//tiny_mce
				$cPri = new Pri();
				$cPri->loginIn();
				unset($cPri);
				header('Refresh: 1; URL=_index.php');
				echo STR_REDIRECTPAGE;
				
			}
			else
			{
				
				callAlert(STR_SEARCHACCOUNTPASSWORD);
				goback();
			}
			break;
		default:
			goback();
			break;
	}
}
ob_end_flush();
?>