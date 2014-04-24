<?php include_once 'add.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php
require_once WEB_PATH.'include/head.inc.php';
?>
<style>
  #add_wrap table.add_table{
    width:600px;
    /*border: 1px #ccc solid;*/
  }
  #add_wrap table.add_table td.title{
    /*border: 1px #ccc solid;*/
    width: 100px;
  }
</style>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">Product Categories > Add</div>
  </div>
  <div id="main">
    <div id="add_wrap">
      <form name="form" action="add_.php" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="add_table">
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <input type="text" name="name" />
          </td>
        </tr>
        <tr>
          <td class="title alignright">Link:</td>
          <td>
            <input type="text" name="link" class="width250"/>
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