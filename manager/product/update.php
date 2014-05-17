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
    <div id="path_wrap">Product > Edit</div>
  </div>
  <div id="main">
    <div id="update_wrap">
      <form name="form" action="update_.php?product_id=<?php echo $arr['product_id'];?>" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="update_table">
        <tr>
          <td class="title alignright">Product Categories:</td>
          <td>
              <?php echo $categoriesSelect;?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <input type="text" name="name" value="<?php echo htmlspecialchars($arr['name']);?>"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Dimension:</td>
          <td>
            <input type="text" name="dimension" value="<?php echo htmlspecialchars($arr['dimension']);?>"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Datasheet Link:</td>
          <td>
            <input type="text" name="datasheet" value="<?php echo $arr['datasheet'];?>"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Picture:</td>
          <td>
            <input type="file" name="file"/>
            <a href="<?php echo $cProduct->webRoot.$arr['product_id'].$arr['ext'];?>" target="_blank">preview</a>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Quantity visible:</td>
          <td><input type="checkbox" name="quantity_visible" value="1" <?php echo ($arr['quantity_visible'] == 1)?'checked="checked"':'';?>></td>
        </tr>
        <tr>
          <td class="title alignright">Color Options</td>
          <td>
            <select name="color_options">
              <option value="-1">None</option>
              <?php
              if(count($colorSelect) > 0)
              {
                foreach($colorSelect as $key => $val)
                {
                  $selected = '';
                  if($arr['color_options'] == $colorSelect[$key]['color_id'])
                    $selected = 'selected="selected"';
                  echo '<option value="'.$colorSelect[$key]['color_id'].'" '.$selected.' >'.$colorSelect[$key]['name'].'</option>';
                }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Cri Options</td>
          <td>
            <select name="cri_options">
              <option value="-1">None</option>
              <?php
              if(count($criSelect) > 0)
              {
                foreach($criSelect as $key => $val)
                {
                  $selected = '';
                  if($arr['cri_options'] == $criSelect[$key]['cri_id'])
                    $selected = 'selected="selected"';
                  echo '<option value="'.$criSelect[$key]['cri_id'].'" '.$selected.'>'.$criSelect[$key]['name'].'</option>';
                }
              }
              ?>
            </select>
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