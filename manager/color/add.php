<?php include_once 'add.c.php';?>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php
require_once WEB_PATH.'include/head.inc.php';
?>
<style>
  #add_wrap table.add_table{
    width:800px;
    /*border: 1px #ccc solid;*/
  }
  #add_wrap table.add_table td.title{
    /*border: 1px #ccc solid;*/
    width: 150px;
  }
  .btn{
    cursor: pointer;
  }
  .sample{
    display: none;
  }
  .content_table{
    text-align: center;
  }
</style>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">Color > Add</div>
  </div>
  <div id="main">
    <div id="add_wrap">
      <form name="form" action="add_.php" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="add_table">
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <input type="text" name="name" class="width300"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Option:</td>
          <td>
            <table class="content_table">
              <tr class="first">
                <td><input type="text" name="color[]" size="50" value=""/></td>
                <td><div onclick="addItem();" class="btn"><img src="../images/item_add.png"></div></td>
              </tr>
            </table>
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
<div class="sample">
  <table>
    <tr class="item">
      <td><input type="text" name="color[]" size="50" value=""/></td>
      <td><div onclick="delItem($(this));" class="btn"><img src="../images/item_del.png"></div></td>
    </tr>
  </table>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name=post_date]').datepicker({dateFormat:'yy-mm-dd'});
  
  });
  
  function addItem() {
    $('.content_table tr:last').after($('.sample tr.item').clone());
  }
  
  function delItem(obj) {
    obj.parent().parent().remove();
  }
  
  function check() {
    str = '';
    
    if($('input[name=name]').val() == '')
      str += 'Please fill in name.\n';
    v = '';
    $('.content_table input[name=color\\[\\]]').each(function(){
        v += ''+$(this).val();
    });
    
    if (v == '') {
      str += 'Please fill one option.\n';
    }
    
    if (str != '') {
      alert(str);
      return false;
    }
    else
      return true;
  }
</script>
</html>