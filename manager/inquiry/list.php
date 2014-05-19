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
    <div id="path_wrap">Inquiry > List</div>
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
              <?php echo STR_PAGE;?>
              <span class="nowpage"><?php echo $page['nowpage'];?></span>
              
              <span class="space">/</span>
              <?php echo $page['pageMenu'];?>
          </td>
        </tr>
      </table>
      <table id="data_wrap" class="fancyTable">
          <tr>
			<th width="100">Send-Time</th>
            <th width="380">Name</th>
            <th width="40">Detail</th>
            <th width="40"><?php echo STR_DELETE;?></th>
          </tr>
          <?php
		  if(count($page['data']) > 0)
            foreach($page['data'] as $key => $val)
			{
          ?>
			  <tr>
				<td class="aligncenter">
					<?php echo $page['data'][$key]['send_time'];?>
				</td>
				<td class="aligncenter">
					<?php echo $page['data'][$key]['first_name'].' '.$page['data'][$key]['last_name'];?>
				</td>
				<td class="sysimg">
					<a href="update.php?inquiry_id=<?php echo $page['data'][$key]['inquiry_id']?>&nowpage=<?php echo $nowpage?>"><img src="../images/edit.gif" width="24" height="24" border="0"></a>
				</td>
					<td class="sysimg">
					  <a href="delete.php?inquiry_id=<?php echo $page['data'][$key]['inquiry_id']?>&nowpage=<?php echo $nowpage;?>"><img src="../images/del.gif" width="24" height="24" border="0"></a> 
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