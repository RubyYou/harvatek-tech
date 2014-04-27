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
</style>
<script type="text/javascript">
  function selectChange() {
		document.location='?product3_id='+$('select[name=product3_id]').val();
  }
</script>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">Product Categories 4 > List</div>
  </div>
  <div id="main">
    <div id="list_wrap">
      <table id="select_wrap">
		<tr>
		  <td>
			<?php echo $product3Select;?>
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
            <th width="480">Name</th>
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
					<?php echo $page['data'][$key]['name'];?>
				</td>
        <td class="sysimg">
          <a class="order" href="order.php?nowpage=<?php echo $nowpage;?>&product3_id=<?php echo $page['data'][$key]['product3_id'];?>&product4_id=<?php echo $page['data'][$key]['product4_id'];?>&order=up"><img src="../images/up.gif" width="10" height="11" border="0"></a>
          <a class="order" href="order.php?nowpage=<?php echo $nowpage;?>&product3_id=<?php echo $page['data'][$key]['product3_id'];?>&product4_id=<?php echo $page['data'][$key]['product4_id'];?>&order=down"><img src="../images/down.gif" width="10" height="11" border="0"></a>
        </td>
				<td class="sysimg">
					<a href="update.php?product3_id=<?php echo $page['data'][$key]['product3_id'];?>&product4_id=<?php echo $page['data'][$key]['product4_id'];?>&nowpage=<?php echo $nowpage?>"><img src="../images/edit.gif" width="24" height="24" border="0"></a>
				</td>
					<td class="sysimg">
					  <a href="delete.php?product3_id=<?php echo $page['data'][$key]['product3_id'];?>&product4_id=<?php echo $page['data'][$key]['product4_id'];?>&nowpage=<?php echo $nowpage;?>"><img src="../images/del.gif" width="24" height="24" border="0"></a> 
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