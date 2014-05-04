<?php
session_start();
include_once '../../config/config.main.php';
/*permission*/
$cPri = new Pri();
if(!$cPri->checkLogin()){parentGoto(BGM_ROOT);}
unset($cPri);
/*permission*/


$cProduct = new Product();

if($_GET['table_id'] == null || $_GET['products_id'] == null)
    $categories_id = $cProduct->getTop1CategoriesID();
else
    $categories_id = $_GET['table_id'] . '-' . $_GET['products_id'];

$categoriesSelect = $cProduct->getCategoriesSelect($categories_id,true);

$page = $cProduct->getPage($_GET['nowpage'],$categories_id);
$nowpage = $page['nowpage'];
?>