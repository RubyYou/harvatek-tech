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

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">工作日誌 > 列表</div>
  </div>
  <div id="main">
    <div id="list_wrap">
      <table id="select_wrap">
        <tr> 
          <td id="page">
              <?php echo STR_TOTAL;?>
              <span class="pagecount"><?php echo $page['pagecount'];?></span>
              <?php echo STR_PAGE;?>
              <span class="space">/</span>
              <?php echo STR_ATPAGE;?>
              <span class="nowpage"><?php echo $page['nowpage'];?></span>
              <?php echo STR_PAGE;?>
              <span class="space">/</span>
              <?php echo $page['pageMenu'];?>
          </td>
        </tr>
      </table>
      <table id="data_wrap" class="fancyTable">
          <tr> 
            <th width="480">日期</th>
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
					<?php echo $page['data'][$key]['daily_date_format'];?>
				</td>
				<td class="sysimg">
					<a href="update.php?id=<?php echo $page['data'][$key]['daily_id'];?>&nowpage=<?php echo $nowpage?>"><img src="../images/edit.gif" width="24" height="24" border="0"></a>
				</td>
					<td class="sysimg">
					  <a href="delete.php?id=<?php echo $page['data'][$key]['daily_id'];?>&nowpage=<?php echo $nowpage;?>"><img src="../images/del.gif" width="24" height="24" border="0"></a> 
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