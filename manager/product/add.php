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
    <div id="path_wrap">Product > Add</div>
  </div>
  <div id="main">
    <div id="add_wrap">
      <form name="form" action="add_.php" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="add_table">
        <tr>
          <td class="title alignright">Product Categories:</td>
          <td>
              <?php echo $categoriesSelect;?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <input type="text" name="name" />
          </td>
        </tr>
        <tr>
          <td class="title alignright">Dimension:</td>
          <td>
            <input type="text" name="dimension" />
          </td>
        </tr>
        <tr>
          <td class="title alignright">Datasheet Link:</td>
          <td>
            <input type="text" name="datasheet" />
          </td>
        </tr>
        <tr>
          <td class="title alignright">Picture:</td>
          <td>
            <input type="file" name="file"/>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Quantity Select visible:</td>
          <td><input type="checkbox" name="quantity_visible" value="1"></td>
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
                  echo '<option value="'.$colorSelect[$key]['color_id'].'">'.$colorSelect[$key]['name'].'</option>';
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
                  echo '<option value="'.$criSelect[$key]['cri_id'].'">'.$criSelect[$key]['name'].'</option>';
                }
              }
              ?>
            </select>
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
  function check() {
    str = '';
    
    if($('input[name=name]').val() == '')
      str += 'Please fill in name.\n';
    if($('input[name=file]').val() == '')
      str += 'Please choose the file.\n';
    
    
    if (str != '') {
      alert(str);
      return false;
    }
    else
      return true;
  }
</script>
</html>