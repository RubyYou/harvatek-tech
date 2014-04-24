<?php include_once 'index.c.php';?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo BGM_TITLE;?></title>
<?php require_once WEB_PATH.'include/head.inc.php';?>
</head>

<body>
<div id="wrapper">
    <div id="header"></div>
    <div id="main">
        <div id="index_wrap">
        <form name="form1" method="post" action="login.php" onSubmit="return checkLogin();">
          <table align="center">
            <tr> 
              <th colspan="2"><?php echo BGM_TITLE;?></th>
            </tr>
            <tr> 
              <td class="title"><?php echo STR_ACCOUNT;?>：</td><td class="data"><input name="acc" type="text" id="acc"><label class="validmsg"><?php echo STR_NULLACCOUNT;?></label></td>
            </tr>
            <tr> 
              <td class="title"><?php echo STR_PASSWORD?>：</td><td class="data"><input name="pwd" type="password" id="pwd"><label class="validmsg"><?php echo STR_NULLPASSWORD;?></label></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="reset" name="Reset" value="<?php echo STR_RESET; ?>">&nbsp;<input type="submit" name="Submit2" value="<?php echo STR_LOGIN;?>">
                </td>
            </tr>
          </table>
        </form>
        </div>
    </div>
    <div id="footer">
        <?php require_once 'includes/copyright.php';?>
    </div>
</div>
</body>
</html>