<?php
    /*有會員統一開啟Server*/
    session_start();
    
    
    include_once 'config.php';
    /*
     *function
     */
    
    include_once WEB_PATH.'libraries/php/formObject.lib.php';
    include_once WEB_PATH.'libraries/php/js.lib.php';
    include_once WEB_PATH.'libraries/php/validation-1.0.lib.php';
    include_once WEB_PATH.'libraries/php/injection-1.0.lib.php';
    
    include_once WEB_PATH.'modules/Myadodb/adodb.inc.php';
    /*
     *autoload set
     */
    $includePath[] = get_include_path();
    $includePath[] = WEB_PATH.'cls';
    $includePath[] = WEB_PATH.'modules';
    set_include_path(join(PATH_SEPARATOR,$includePath));
    function __autoload($class)
    {
        include_once strtolower($class).'.class.php';
    }
?>