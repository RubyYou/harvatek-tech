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
    width: 100px;
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
    <div id="path_wrap">工作日誌 > 新增</div>
  </div>
  <div id="main">
    <div id="add_wrap">
      <form name="form" action="add_.php" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="add_table">
        <tr>
          <td class="title alignright">日期：</td>
          <td>
            <input type="text" name="date" value="" readonly="readonly"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">工作內容：</td>
          <td>
            <table class="content_table">
              <tr>
                <td>內容</td>
                <td>進度</td>
                <td></td>
              </tr>
              <tr class="first">
                <td><input type="text" name="content[]" size="50" value=""/></td>
                <td><input type="text" name="percent[]" size="10" value=""/></td>
                <td><div onclick="addItem();" class="btn"><img src="../images/item_add.png"></div></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
            <td colspan="2"><div align="center"><input type="submit" value="送出"></div></td>
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
      <td><input type="text" name="content[]" size="50" value=""/></td>
      <td><input type="text" name="percent[]" size="10" value=""/></td>
      <td><div onclick="delItem($(this));" class="btn"><img src="../images/item_del.png"></div></td>
    </tr>
  </table>
</div>
</body>
<script type="text/javascript">
  function check() {
    str = '';
    
    if($('input[name=date]').val() == '')
      str += '請選擇日期！\n';
    
    if (str != '') {
      alert(str);
      return false;
    }
    else
      return true;
  }
  
  function addItem() {
    $('.content_table tr:last').after($('.sample tr.item').clone());
  }
  
  function delItem(obj) {
    obj.parent().parent().remove();
  }
  
  $(window).load(function(){
      $('input[name=date]').datepicker({
        dateFormat: 'yy/mm/dd'
        ,changeMonth: true
        ,changeYear: true
        ,monthNamesShort: [ "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12" ]
        ,yearRange: '-100:+0'
      });
      
  });
</script>
</html>