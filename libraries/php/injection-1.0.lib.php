<?php
/*
 * @name injection
 * @version 1.0
 * @author Nick
 * @copyright 2013 TARGETS
 * @updated 2013-11-08
 */

function quoteSlashes(&$value,$key)
{
   if(!is_array($value))
   {
      if(!get_magic_quotes_gpc())
      {
          $value = addslashes($value);
      }
   }
}
function quoteSlashe(&$value)
{
   if(!is_array($value))
   {
      if(!get_magic_quotes_gpc())
      {
          $value = addslashes($value);
      }
   }
}
function trimValues(&$value,$key)
{
   if(!is_array($value))
   {
      $value = trim($value);
   }
}
function htmlChars(&$val,$key)
{
   if(!is_array($val))
   {
      $val = htmlspecialchars($val);
   }
}

function escapeString(&$value,$key)
{
   if(!is_array($value))
   {
      $value = mysql_real_escape_string($value);
   }
}


function my_add_quotes($str)
{
    if(get_magic_quotes_gpc()){
            return $str;
    }else{
            return addslashes($str);
    }
}

//function my_strip_quotes($str)
//{
//    return stripslashes($str);
//}

function unsqlInjection($str)
{
    $str=str_replace('=','',$str);
    $str=str_replace(';','',$str);
    $str=str_replace(',','',$str);
    $str=str_replace('"','',$str);
    $str=str_replace("'",'',$str);
    $str=str_replace("(",'',$str);
    $str=str_replace(")",'',$str);
    return $str;
}
?>