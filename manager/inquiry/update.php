<?php include_once 'update.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php
require_once WEB_PATH.'include/head.inc.php';
?>
<script src="<?php echo WEB_ROOT.'libraries/js/';?>ckeditor.js"></script>
<style>
  #update_wrap table.update_table{
    width:800px;
    /*border: 1px #ccc solid;*/
  }
  #update_wrap table.update_table td.title{
    /*border: 1px #ccc solid;*/
    width: 150px;
  }
  
  #update_wrap table.update_table td.cart table{
    width: 100%;
  }
  #update_wrap table.update_table td.cart table,
  #update_wrap table.update_table td.cart table tr,
  #update_wrap table.update_table td.cart table td,
  #update_wrap table.update_table td.cart table th{
    border-collapse: collapse;
    border: 1px #ccc solid;
    text-align: center;
  }
</style>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">Inquiry > detail</div>
  </div>
  <div id="main">
    <div id="update_wrap">
      <form name="form" action="update_.php?contact_id=<?php echo $arr['contact_id'];?>" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="update_table">
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <?php echo htmlspecialchars($arr['first_name'].' '.$arr['last_name']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Country:</td>
          <td>
            <?php echo htmlspecialchars($arr['country']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Email:</td>
          <td>
            <?php echo htmlspecialchars($arr['email']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Phone:</td>
          <td>
            <?php echo htmlspecialchars($arr['phone']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Address:</td>
          <td>
            <?php echo htmlspecialchars($arr['address']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Address Option:</td>
          <td>
            <?php echo htmlspecialchars($arr['address_option']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Zip Code:</td>
          <td>
            <?php echo htmlspecialchars($arr['postcode']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">AdditionalInfo:</td>
          <td>
            <?php echo nl2br(htmlspecialchars($arr['additionalInfo']));?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Inquiry Item:</td>
          <td class="cart">
              <table>
                <tr>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Other Info</th>
                </tr>
                <?php
				if(count($item_arr))
				{
					foreach($item_arr as $key => $val)
					{
				?>
							<tr>
								<td><?php echo $item_arr[$key]['product_name'];?></td>
								<td><?php echo $item_arr[$key]['quantity'];?></td>
								<td>
                                    <?php
                                    $otherInfo = json_decode($item_arr[$key]['other_info']);
                                    ?>
									<?php echo ($otherInfo->color == '') ? '' : '<p> Color:'.$otherInfo->color.'</p>';?>
									<?php echo ($otherInfo->cri == '') ? '' : '<p> Cri:'.$otherInfo->cri.'</p>';?>
								</td>
							</tr>
				<?php
					}
				}
				?>
              </table>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Send-Time:</td>
          <td>
            <?php echo htmlspecialchars($arr['send_time']);?>
          </td>
        </tr>
        <!--
        <tr>
            <td colspan="2"><div align="center"><input type="submit" value="<?php echo STR_SUBMIT;?>"></div></td>
        </tr>
        -->
      </table>
      </form>
    </div>
  </div>
  <div id="footer">
    <?php require_once '../includes/copyright.php';?>
  </div>
</div>
</body>
<script type="text/javascript">
  function check() {
    str = '';
    
    if($('input[name=name]').val() == '')
      str += 'Please fill in name.\n';
    
    if (str != '') {
      alert(str);
      return false;
    }
    else
      return true;
  }
</script>
</html>