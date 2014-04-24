<?php
class Pri {
    
    function Pri()
    {
        //if(session_id() == '')
        //    session_start();

    }
    
    function loginIn()
    {
        $_SESSION['bgLogin'] = true;
    }
    
    function checkLogin()
    {
        if(isset($_SESSION['bgLogin']) && $_SESSION['bgLogin'] == true)
            return true;
        else
            return false;
    }
}
?>