<?php include_once 'update1.c.php'?>

<html>
<head>
<title></title>
<?php require_once WEB_PATH.'include/head.inc.php';?>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="path_wrap">
                <?php echo STR_EDIT.' '.STR_PASSWORD;?>
            </div>
        </div>
        <div id="main">
            <div id="update_wrap">
                <form name="form" action="update1_.php" method="POST" onsubmit="return checkEditPassword();">
                    <table class="update_table">
                    <tr>
                        <th colspan="2">Manager <?php echo STR_ACCOUNT.'&'.STR_PASSWORD.' '.STR_EDIT;?></th>
                    </tr>
                    <tr>
                        <td width="30%" class="alignright">Original <?php echo STR_ACCOUNT;?>：</td>
                        <td width="70%"><input name="o_acc" type="text" id="o_acc"></td>
                    </tr>
                    <tr>
                        <td class="alignright">Original <?php echo STR_PASSWORD;?>：</td>
                        <td><input name="o_pwd" type="password" id="o_pwd"></td>
                    </tr>
                    <tr>
                        <td class="alignright">New <?php echo STR_ACCOUNT;?>：</td>
                        <td><input name="n_acc" type="text" id="n_acc"></td>
                    </tr>
                    <tr>
                        <td class="alignright">New <?php echo STR_PASSWORD;?>：</td>
                        <td><input name="n_pwd1" type="password" id="n_pwd1"></td>
                    </tr>
                    <tr>
                        <td class="alignright">Confirm New <?php echo STR_PASSWORD;?>：</td>
                        <td><input name="n_pwd2" type="password" id="n_pwd2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div align="center"><input type="reset" value="<?php echo STR_RESET;?>"><input type="submit" value="<?php echo STR_SUBMIT?>"></div></td>
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
</html>