<?php
include_once 'config/config.main.front.php';
if(count($_POST) <= 0)
{
	header('Location:contact.php');
	exit;
}

$cContact = new Contact();
$res = $cContact->addContact($_POST);
if($res == 1)
{
	callAlert('Thank you !');
	goto_('index.php');
}
else
{
	callAlert('Something wrong.\nPlease try again.');
	goto_('contact.php');
}
?>