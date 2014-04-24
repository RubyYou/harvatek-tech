<?php
class String {
    
    function utf8_str_split($str, $split_len = 1, $endstr = '...')
    {
		if (!preg_match('/^[0-9]+$/', $split_len) || $split_len < 1)
			return FALSE;
		
		$len = mb_strlen($str, 'UTF-8');
		if ($len <= $split_len)
			return $str;
		 
		preg_match_all('/.{'.$split_len.'}|[^\x00]{1,'.$split_len.'}$/us', $str, $arr);
		 
		return $arr[0][0].$endstr;
    }
	
	function moneyFormat($money,$locale='zh_TW')
	{
		$money = intval($money);
		setlocale(LC_MONETARY, "zh_TW");
		return money_format('%.0n',$money);
	}
	
	function intToThousandSymbol($number)
	{
		$number = intval($number);
		return number_format($number);
	}
	
	function getFileExtension($filename)
	{
		if(pathinfo($filename, PATHINFO_EXTENSION) == '')
			return '';
		else
			return '.'.strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	}
	
	//產生編號
    //$orderNo：編號
    //$c：補足位數
    //$fillStr：要補足的字元
    function getOrderNumber($orderNo = 1,$c = 5,$fillStr = "0")
    {
        $orderNo = date("Ymd").str_pad($orderNo,$c,$fillStr,STR_PAD_LEFT);
        return $orderNo;
    }
	
	function dateFormat($date,$formatIn='Y-m-d',$formatOut='Y/m/d')
	{
		$date = date_create_from_format($formatIn,$date);
		$date = date_format($date,$formatOut);
		return $date;
	}
}


?>