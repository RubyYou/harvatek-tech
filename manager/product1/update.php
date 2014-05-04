<?php include_once 'update.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php
require_once WEB_PATH.'include/head.inc.php';
?>
<style>
  #update_wrap table.update_table{
    width:600px;
    /*border: 1px #ccc solid;*/
  }
  #update_wrap table.update_table td.title{
    /*border: 1px #ccc solid;*/
    width: 100px;
  }
</style>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">Product Categories 1 > Edit</div>
  </div>
  <div id="main">
    <div id="update_wrap">
      <form name="form" action="update_.php?product1_id=<?php echo $arr['product1_id'];?>" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="update_table">
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <input type="text" name="name" value="<?php echo $arr['name'];?>"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">logo:</td>
          <td>
            <input type="file" name="file"/>
            <a href="<?php echo $cProduct->webRoot.$arr['product1_id'].$arr['ext'];?>" target="_blank">preview</a>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Link:</td>
          <td>
            <input type="text" name="link" value="<?php echo $arr["link"];?>" class="width250"/>
          </td>
        </tr>
        <tr>
            <td colspan="2"><div align="center"><input type="submit" value="<?php echo STR_SUBMIT;?>"></div></td>
        </tr>
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