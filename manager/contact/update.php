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
    <div id="path_wrap">Contact > detail</div>
  </div>
  <div id="main">
    <div id="update_wrap">
      <form name="form" action="update_.php?contact_id=<?php echo $arr['contact_id'];?>" method="POST" enctype="multipart/form-data" onsubmit="return check();">
      <table class="update_table">
        <tr>
          <td class="title alignright">Name:</td>
          <td>
            <?php echo htmlspecialchars($arr['name']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Company:</td>
          <td>
            <?php echo htmlspecialchars($arr['company']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Email:</td>
          <td>
            <?php echo htmlspecialchars($arr['email']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Position:</td>
          <td>
            <?php echo htmlspecialchars($arr['position']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Phone:</td>
          <td>
            <?php echo htmlspecialchars($arr['phone']);?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Other Feedback:</td>
          <td>
            <?php echo nl2br(htmlspecialchars($arr['other_feedback']));?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Inquiry Topic:</td>
          <td>
            <?php
               if(is_array($arr['inquiry_topic']))
               {
                  $str = '';
                  foreach($arr['inquiry_topic'] as $key => $val)
                  {
                      $str .= ','.$val;
                  }
                  $str = ltrim($str,',');
                  echo $str;
               }
            ?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Application Assistant:</td>
          <td>
            <?php echo nl2br(htmlspecialchars($arr['application_assistant']));?>
          </td>
        </tr>
        <tr>
          <td class="title alignright">Add-Time:</td>
          <td>
            <?php echo htmlspecialchars($arr['add_time']);?>
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