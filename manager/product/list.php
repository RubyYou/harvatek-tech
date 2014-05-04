<?php include_once 'list.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php require_once WEB_PATH.'include/head.inc.php';?>
</head>
<style type="text/css">
  #list_wrap #select_wrap,#list_wrap #data_wrap{
    width: 800px;
  }
  .pic{
	width: 90px;
	height: 90px;
  }
</style>
<script type="text/javascript">
  function selectChange() {
		var table_id = $('select[name=categories_id]').val().split('-')[0];
		var products_id = $('select[name=categories_id]').val().split('-')[1];
		document.location='?table_id='+ table_id + '&products_id=' + products_id;
  }
</script>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">Product > List</div>
  </div>
  <div id="main">
    <div id="list_wrap">
      <table id="select_wrap">
		<tr>
		  <td>
			<?php echo $categoriesSelect;?>
		  </td>
		</tr>
        <tr> 
          <td id="page">
              <?php echo STR_TOTAL;?>
              <span class="pagecount"><?php echo $page['pagecount'];?></span>
              <?php echo STR_PAGE;?>
              <span class="space">/</span>
              <?php echo STR_ATPAGE;?>
              <?php echo STR_PAGE;?>
              <span class="nowpage"><?php echo $page['nowpage'];?></span>
              
              <span class="space">/</span>
              <?php echo $page['pageMenu'];?>
          </td>
        </tr>
      </table>
      <table id="data_wrap" class="fancyTable">
          <tr>
			<th width="100">Picture</th>
            <th width="380">Name</th>
            <th width="40"><?php echo STR_ORDER;?></th>
            <th width="40"><?php echo STR_EDIT;?></th>
            <th width="40"><?php echo STR_DELETE;?></th>
          </tr>
          <?php
		  if(count($page['data']) > 0)
            foreach($page['data'] as $key => $val)
			{
          ?>
			  <tr>
				<td class="aligncenter">
					<img src="<?php echo $cProduct->webRoot.$page['data'][$key]['product_id'].''.$page['data'][$key]['ext'];?>" class="pic" />
				</td>
				<td class="aligncenter">
					<?php echo $page['data'][$key]['name'];?>
				</td>
				<td class="sysimg">
				  <a class="order" href="order.php?nowpage=<?php echo $nowpage;?>&table_id=<?php echo $page['data'][$key]['table_id']?>&products_id=<?php echo $page['data'][$key]['products_id']?>&product_id=<?php echo $page['data'][$key]['product_id'];?>&order=up"><img src="../images/up.gif" width="10" height="11" border="0"></a>
				  <a class="order" href="order.php?nowpage=<?php echo $nowpage;?>&table_id=<?php echo $page['data'][$key]['table_id']?>&products_id=<?php echo $page['data'][$key]['products_id']?>&product_id=<?php echo $page['data'][$key]['product_id'];?>&order=down"><img src="../images/down.gif" width="10" height="11" border="0"></a>
				</td>
				<td class="sysimg">
					<a href="update.php?table_id=<?php echo $page['data'][$key]['table_id']?>&products_id=<?php echo $page['data'][$key]['products_id']?>&product_id=<?php echo $page['data'][$key]['product_id'];?>&nowpage=<?php echo $nowpage?>"><img src="../images/edit.gif" width="24" height="24" border="0"></a>
				</td>
					<td class="sysimg">
					  <a href="delete.php?table_id=<?php echo $page['data'][$key]['table_id']?>&products_id=<?php echo $page['data'][$key]['products_id']?>&product_id=<?php echo $page['data'][$key]['product_id'];?>&nowpage=<?php echo $nowpage;?>"><img src="../images/del.gif" width="24" height="24" border="0"></a> 
					</td>
			  </tr>
          <?php
			}
		  ?>
      </table>
    </div>
  </div>
  <div id="footer">
    <?php require_once '../includes/copyright.php';?>
  </div>
</div>
</body>
</html>