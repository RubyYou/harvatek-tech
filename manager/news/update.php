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
</style>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">News > Edit</div>
  </div>
  <div id="main">
    <div id="update_wrap">
      <form name="form" action="update_.php?news_id=<?php echo $arr['news_id'];?>" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="update_table">
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <input type="text" name="name" value="<?php echo $arr['name'];?>"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Post Date:</td>
          <td>
            <input type="text" name="post_date" readonly="readonly" value="<?php echo $arr['post_date'];?>"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Content:</td>
          <td>
            <textarea class="ckeditor" cols="80" id="content" name="content" rows="10">
              <?php echo $arr['content'];?>
            </textarea>
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