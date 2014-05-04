<?php include_once 'add.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php
require_once WEB_PATH.'include/head.inc.php';
?>
<script src="<?php echo WEB_ROOT.'libraries/js/';?>ckeditor.js"></script>
<style>
  #add_wrap table.add_table{
    width:800px;
    /*border: 1px #ccc solid;*/
  }
  #add_wrap table.add_table td.title{
    /*border: 1px #ccc solid;*/
    width: 150px;
  }
</style>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">News > Add</div>
  </div>
  <div id="main">
    <div id="add_wrap">
      <form name="form" action="add_.php" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="add_table">
        <tr>
          <td class="title alignright">Title:</td>
          <td>
            <input type="text" name="name" class="width300"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Post Date:</td>
          <td>
            <input type="text" name="post_date" readonly="readonly" />
          </td>
        </tr>
        <tr>
          <td class="title alignright">Content:</td>
          <td>
            <textarea class="ckeditor" cols="80" id="content" name="content" rows="10"></textarea>
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
  $(document).ready(function(){
    $('input[name=post_date]').datepicker({dateFormat:'yy-mm-dd'});
  
  });
  function check() {
    str = '';
    
    if($('input[name=name]').val() == '')
      str += 'Please fill in title.\n';
    if($('input[name=post_date]').val() == '')
      str += 'Please choose the date.\n';
    if(CKEDITOR.instances.content.getData() == '')
      str += 'Please fill in content.\n';
    
    
    if (str != '') {
      alert(str);
      return false;
    }
    else
      return true;
  }
</script>
</html>