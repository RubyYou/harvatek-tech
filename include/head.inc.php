<?php include_once '../config/config.main.php';?>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo WEB_CHARSET;?>"/>
<meta name="keywords" content="<?php echo WEB_KEYWORD;?>">
<meta name="description" content="<?php echo WEB_DESCRIPTION;?>">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>libraries/css/ui-lightness/jquery-ui-1.10.4.custom.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>libraries/css/main.css"/>
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>libraries/css/main-ie7.css"/>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>libraries/css/fancyTable.css"/>
<script type="text/javascript" src="<?php echo WEB_ROOT;?>libraries/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT;?>libraries/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT;?>libraries/js/main.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT;?>libraries/js/validation-1.0.js"></script>
<script type="text/javascript">
function checkLogin()
{
    str = '';
    if($('#acc').val()=="")
    {
        str += '<?php echo STR_NULLACCOUNT;?>\n';
        
    }
    
    if($('#pwd').val()=="")
    {
        str += '<?php echo STR_NULLPASSWORD;?>\n';
        
    }
    
    if (str == '') {
        return true;
    }
    else
    {
        callalert(str);
        return false;
    }
}

function checkEditPassword()
{
    str = '';
    if($('#o_acc').val()=='' || $('#o_pwd').val()=='' || $('#n_acc').val()=='' || $('#n_pwd1').val()=='' || $('#n_pwd2').val()=='')
    {
        str += '<?php echo STR_NULLACCOUNTPASSWORD;?>\n';
    }
    else
    {
        if($('#n_pwd1').val() != $('#n_pwd2').val())
        {
            str += '<?php echo STR_VALIDNEWPASSWORD;?>\n';
            
        }
    }
    
    if (str == '') {
        return true;
    }
    else
    {
        callalert(str);
        return false;
    }
    
    
}
</script>