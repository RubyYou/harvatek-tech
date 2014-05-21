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
    width:300px;
    /*border: 1px #ccc solid;*/
  }
  #update_wrap table.update_table input{
    width: 100%;
  }
  #update_wrap table.update_table td.title{
    /*border: 1px #ccc solid;*/
    width: 150px;
  }
  .btn{
    cursor: pointer;
  }
  .sample{
    display: none;
  }
  #update_wrap table.submit{
    margin: 0 auto;
    width:300px;
    text-align: center;
  }
  tr.item td,tr.first td{
    text-align: center;
  }
</style>
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="path_wrap">Color > Edit</div>
  </div>
  <div id="main">
    <div id="update_wrap">
      <form name="form" action="update_.php" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="update_table fancyTable">
        <tr>
          <th width="200">Name</th>
          <th width="40"><?php echo STR_EDIT;?></th>
        </tr>
        
        <?php
        if(is_array($arr)){
          foreach($arr as $key => $val){
            $val = htmlspecialchars($val);
            if($key == 0){
                echo <<< EOF
                <tr class="first">
                  <td><input type="text" name="color[]" size="50" value="$val"/></td>
                  <td><div onclick="addItem();" class="btn"><img src="../images/item_add.png"></div></td>
                </tr>
EOF;
            }
            else{
                echo <<< EOF
                <tr class="item">
                  <td><input type="text" name="color[]" size="50" value="$val"/></td>
                  <td><div onclick="delItem($(this));" class="btn"><img src="../images/item_del.png"></div></td>
                </tr>
EOF;
            }
          }
        }
        else{
          echo <<< EOF
                <tr class="first">
                  <td><input type="text" name="color[]" size="50" value=""/></td>
                  <td><div onclick="addItem();" class="btn"><img src="../images/item_add.png"></div></td>
                </tr>
EOF;
        }
        ?>
      </table>
      <table class="submit">
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
  
  function addItem() {
    $('.update_table tr:last').after($('.sample tr.item').clone());
  }
  
  function delItem(obj) {
    obj.parent().parent().remove();
  }
</script>
</html>