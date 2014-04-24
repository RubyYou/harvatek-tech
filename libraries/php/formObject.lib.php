<?php
	function getSelectMenu($db,$name,$key,$item1,$script='',$items='',$size=''){
	    //$result mysql資料庫查詢的結果
		//$name 下拉物件的名稱
		//$key 選單的鍵值
		//$item1 第一個選項的值 通常是請選擇
		//$script 下拉選單的javascript
		//$items 選單要秀出的值 
		//$size 複選式選單可以一次秀出的大小 
		$multiple='';
		if($script=='' && $item1!=''){
			$str="<select name=\"$name\" id=\"$name\" size='".$size."'>".chr(13)."  <option value=''>$item1</option>".chr(13);
		}else{
			if($size!=''){
				$multiple='multiple';
			}
			if($item1!=''){
				$item1=chr(13)."  <option value=''>$item1</option>".chr(13);
			}
			$str="<select name=\"$name\" id=\"$name\" $script size='".$size."' $multiple>".$item1;
		}
		while($rs=$db->getNext()){
			if($rs->{($items)}=='') continue;
			$str.="	<option value='".$rs->{($key)}."'>".$rs->{($items)}."</option>".chr(13);
		}

		$str.="</select>";
		return $str;
	} 
	
	function progressMenu($name){
		echo ("
				<select name='".$name."' id='".$name."'>
				  <option selected>::SELECT::</option>
				  <option value='0'>0%</option>
				  <option value='5'>5%</option>
				  <option value='10'>10%</option>
				  <option value='15'>15%</option>
				  <option value='20'>20%</option>
				  <option value='25'>25%</option>
				  <option value='30'>30%</option>
				  <option value='35'>35%</option>
				  <option value='40'>40%</option>
				  <option value='45'>45%</option>
				  <option value='50'>50%</option>
				  <option value='55'>55%</option>
				  <option value='60'>60%</option>
				  <option value='65'>65%</option>
				  <option value='70'>70%</option>
				  <option value='75'>75%</option>
				  <option value='80'>80%</option>
				  <option value='85'>85%</option>
				  <option value='90'>90%</option>
				  <option value='95'>95%</option>
				  <option value='100'>100%</option>
				</select>
		");
	}
	
	
	function getCombineSelectMenu($result,$name,$key,$item1,$script='',$items='',$size='',$result2='',$key2='',$items2=''){
		// if you need combine two result to one select menu you should use this
	    //$result mysql資料庫查詢的結果
		//$name 下拉物件的名稱
		//$key 選單的鍵值
		//$item1 第一個選項的值 通常是請選擇
		//$script 下拉選單的javascript
		//$items 選單要秀出的值 
		//$size 複選式選單可以一次秀出的大小 
		if($script=='' && $item1!=''){
			$str="<select name=\"$name\" id=\"$name\" size='".$size."'>".chr(13)."  <option value=''>$item1</option>".chr(13);
		}else{
			$str="<select name=\"$name\" id=\"$name\" $script size='".$size."' multiple>".chr(13);
		}
		while($rs=@mysql_fetch_object($result)){
			$str.="	<option value='".$rs->$key."'>".$rs->$items."</option>".chr(13);
		}
		while($rs=@mysql_fetch_object($result2)){
			$str.="	<option value='".$rs->$key2."'>".$rs->$items2."</option>".chr(13);
		}		
		$str.="</select>";
		return $str;
	} 
	
	function delForm($ary,$message,$post=''){
		$str='';
		if(is_array($ary)){
			foreach($ary as $key => $value){
				$str.='&'.my_strip_quotes($key).'='.my_strip_quotes($value);
			}		
		}
		$postvalue='';
		if(is_array($post)){
			foreach($post as $key => $value){
				if(gettype($value)=='array'){
					for($ii=0;$ii<count($value);$ii++){
						$postvalue.='<input type="hidden" name="'.$key.'[]" value="'.$value[$ii].'">'.chr(13).chr(10);
					}
				}else{
					$postvalue.='<input type="hidden" name="'.my_strip_quotes($key).'" value="'.my_strip_quotes($value).'">';
				}
			}
		}
		echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'><form method=\"post\" action=\"".$_SERVER['PHP_SELF'].'?del=true'.$str."\">".$postvalue."<div align='center' style='font-size:12px;color:red;font-family:arial;'>".$message."<br/><input type='submit' value='".STR_SUBMIT."'><input type='button' value='".STR_BACKTOLIST."' onclick='history.go(-1);'></div> </form></head></html>";
	}

	function updateForm($ary,$post,$file,$path,$message){
		$str='';
		if(is_array($ary)){		
			foreach($ary as $key => $value){
				$str.='&'.my_strip_quotes($key).'='.my_strip_quotes($value);
			}
		}
		$postvalue='';
		if(is_array($post)){
			foreach($post as $key => $value){
				if(is_array($value)){				
					for($ii=0;$ii<count($value);$ii++){
						$postvalue.='<textarea style="display:none;" name="'.my_strip_quotes($key).'[]">'.my_strip_quotes($value[$ii]).'</textarea>';
					}
				}else{
					$postvalue.='<textarea style="display:none;" name="'.my_strip_quotes($key).'">'.my_strip_quotes($value).'</textarea>';
				}
			}
		}
		if(is_array($file)){
			$up=new upLoad();			
			foreach($file as $key => $value){
				if($file[$key]['size']>0){
					$filekey=str_replace("file","",$key);
					$up->up($file,$key,$path,'TMP'.$filekey);
					$postvalue.='<input type="hidden" name="'.my_strip_quotes($key).'" value="'.my_strip_quotes(getFileType($file[$key]['name'])).'">';
				}
				
			}
		}
		unset($up);
		echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'><form method=\"post\" action=\"".$_SERVER['PHP_SELF'].'?update=true'.$str."\">".$postvalue."<div align='center' style='font-size:12px;color:red;font-family:arial;'>".$message."<br/><input type='submit' value='確定'><input type='button' value='回上頁' onclick='history.go(-1);'></div> </form></head></html>";
	}	

	function my_strip_quotes($str){
		if(get_magic_quotes_gpc()){
			return stripslashes($str);
		}else{
			return $str;
		}
	}
	
?>