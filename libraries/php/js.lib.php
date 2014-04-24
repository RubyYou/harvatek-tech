<?php
	function callAlert($str)
	{
  	  addHeader();
	  echo "<script language='javascript'>alert('★★★★★★\\n\\n'+'".$str."'+'\\n\\n★★★★★★');</script>";
	}
	
	function confirm($str)
	{
	  echo "<script language='javascript'>
	  		if(!confirm('$str')){
				history.go(-1);
			}
			</script>";		
	
	}
	
	function goto_($location, $waitSec = 0)
	{
		$waitSec = intval($waitSec) * 1000;
		if($waitSec == 0)
			echo "<script language='javascript'>document.location='$location';</script>";
		else
			echo "	<script language='javascript'>
					setTimeout(\"document.location='$location'\",".$waitSec.");
					</script>";
	}
	
	function parentGoto($location)
	{
		echo '	<script type="text/javascript">
				window.top.location.href = "'.$location.'"
				</script>';
	}
	
	function goback()
	{
	  echo "<script language='javascript'>history.go(-1);</script>";
	}
	
	function addHeader()
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=".WEB_CHARSET."'>";
	}
	
	function windowClose()
	{
	  	echo "<script language='javascript'>
			    window.opener=null;
				window.close();
			   </script>";
	}
	
?>