<?php
session_start();
include_once '../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){goto_(BGM_ROOT);}
unset($cPri);
/*permission*/


/*code*/
$cTree=new Tree(BGM_TITLE,"#","");
$rootid=$cTree->getNowId();

$cTree->add($rootid,'Product Categories 1',"#","");
$id1=$cTree->getNowId();
$cTree->add($id1,STR_ADD,"product1/add.php","mainframe");
$cTree->add($id1,STR_LIST,"product1/list.php","mainframe");

$cTree->add($rootid,"Product Categories 2","#","");
$id1=$cTree->getNowId();
$cTree->add($id1,STR_ADD,"product2/add.php","mainframe");
$cTree->add($id1,STR_LIST,"product2/list.php","mainframe");


$cTree->add($rootid,"Product Categories 3","#","");
$id1=$cTree->getNowId();
$cTree->add($id1,STR_ADD,"product3/add.php","mainframe");
$cTree->add($id1,STR_LIST,"product3/list.php","mainframe");

$cTree->add($rootid,"Product Categories 4","#","");
$id1=$cTree->getNowId();
$cTree->add($id1,STR_ADD,"product4/add.php","mainframe");
$cTree->add($id1,STR_LIST,"product4/list.php","mainframe");

$cTree->add($rootid,"Product","#","");
$id1=$cTree->getNowId();
$cTree->add($id1,STR_ADD,"product/add.php","mainframe");
$cTree->add($id1,STR_LIST,"product/list.php","mainframe");

$cTree->add($rootid,"News","#","");
$id1=$cTree->getNowId();
$cTree->add($id1,STR_ADD,"news/add.php","mainframe");
$cTree->add($id1,STR_LIST,"news/list.php","mainframe");

$cTree->add($rootid,"Inquiry","#","");
$id1=$cTree->getNowId();
$cTree->add($id1,STR_LIST,"inquiry/list.php","mainframe");

/***********************/
switch(BGM_ACCOUNTSETTING)
{
    case 1:
        $cTree->add($rootid,STR_EDIT.' '.STR_PASSWORD,"manager/update1.php","mainframe");
        break;
    case 2:
        $cTree->add($rootid,"Manager","#","");
        $id1=$cTree->getNowId();
        $cTree->add($id1,STR_ADD,"manager/add2.php","mainframe");
        $cTree->add($id1,STR_LIST,"manager/list2.php","mainframe");
        break;
    default:
        break;
}

$cTree->add($rootid,STR_LOGOUT,BGM_ROOT,"_top");
$cTree->add($rootid,DESIGNBYOFFICIAL,OFFICIALWEBSITE,"_blank");
// $cTree->add($rootid,"請用IE9.0以上瀏覽器","#","");
$fSideBar = $cTree->getShowTable();
unset($cTree);
?>