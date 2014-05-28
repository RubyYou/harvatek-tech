<?php

class Mail{
   var $BODY;
   var $subject;
   var $from;
   var $to;
   var $bcc;
   var $ary;
   function Mail($subject,$from,$to,$file=""){
        $this->subject=$subject;
		$this->from=$from;
		$this->to=$to;
		if($file!=""){
			$this->BODY=$this->getTable($file);
		}
   }

	function setSubject($subject){
		$this->subject=$subject;
	}
   function getTable($file){
		$fd = fopen("$file","r");
		$BODY = fread($fd,filesize("$file"));
		fclose($fd);
		return $BODY;
   }

   function replace($replaceAll2Space = false){
   		if(is_array($this->ary)){
			foreach($this->ary as $key => $value){
				$this->BODY = str_replace("==".$key."==",$value,$this->BODY);
			}
			
			if($replaceAll2Space){
			   $this->BODY = preg_replace('/==[\w\W]+==/','',$this->BODY);
			}
		}
   }
   
   function assign($key,$value){
   		$this->ary[$key]=$value;
   }
   
   function getBody(){
    	return $this->BODY;
   }
  
   function setBody($body){
   		$this->BODY=$body;
   }
   
   
   function send(){
		$header = "Content-Type:text/html;charset=\"utf-8\" \n ";
		$header.= "Content-Transfer-Encoding: 8bit \n";
		$header.= "X-mailer: php \n ";
		$header.= "phpversion() \n";
		$this->subject="=?utf-8?B?" . base64_encode($this->subject) . "?=";
		$pos=strpos($this->from,"<");
		if($pos){
			$from1=substr($this->from,0,$pos);
			$from2=substr($this->from,$pos);
			$this->from="=?utf-8?B?" . base64_encode($from1) . "?=".$from2;
		}else{
			$this->from="=?utf-8?B?" . base64_encode($this->from) . "?=";	
		}

		if($this->bcc!=''){
				$result = mail($this->to,$this->subject,$this->BODY,"From: ".$this->from." \r\nCc: ".$this->bcc." \n".$header);
		}else{
				$result = mail($this->to,$this->subject,$this->BODY,"From:".$this->from." \n".$header);		
		}
		return $result;
	}
	
   function send2(){
		$header = "Content-Type:text/html;charset=\"big 5 \" \n ";
		$header.= "Content-Transfer-Encoding: 8bit \n";
		$header.= "X-mailer: php \n ";
		$header.= "phpversion() \n";
		$this->subject="=?BIG-5?B?" . base64_encode($this->subject) . "?=";
		$pos=strpos($this->from,"<");
		if($pos){
			$from1=substr($this->from,0,$pos);
			$from2=substr($this->from,$pos);
			$this->from="=?BIG-5?B?" . base64_encode($from1) . "?=".$from2;
		}else{
			$this->from="=?BIG-5?B?" . base64_encode($this->from) . "?=";	
		}

		if($this->bcc!=''){
				$result = mail($this->to,$this->subject,$this->BODY,"From: ".$this->from." \r\nCc: ".$this->bcc." \n".$header);
		}else{
				$result = mail($this->to,$this->subject,$this->BODY,"From:".$this->from." \n".$header);		
		}
		return $result;
	}
	
	
	function sendSocket(){
		$tmp=explode(',',$this->to);
		$flag=true;
		$tmpnum=0;
		$xx=0;
		while($flag){
			$jj=0;
			$socket = socket_create (AF_INET, SOCK_STREAM, 0);
			$result = socket_connect ($socket,'targets',25);		
			if(result){
					$say="HELO ".$_SERVER['SERVER_NAME']."\r\n";
					socket_write ($socket, $say, strlen ($say)); 
					$say="MAIL FROM:".$this->from."\r\n"; 
					socket_write ($socket, $say, strlen ($say)); 
					for($ii=$tmpnum;$ii<count($tmp);$ii++){
						$say="RCPT TO:".$tmp[$ii]."\r\n"; 
						socket_write ($socket, $say, strlen ($say)); 						
						if($jj>=50){
							$tmpnum=$ii;
							 break;//one time send 100
						}
						if($ii>=(count($tmp)-1)){
						    $tmpnum=$ii;
							$flag=false;
							$break;
						}
						if($xx>=(count($tmp)-1)){
						    $tmpnum=$ii;
							$flag=false;
							$break;							
						}
						$jj++;
						$xx++;
					}
					$say="DATA\r\n"; 
					socket_write ($socket, $say, strlen ($say)); 
			
					$say="Content-Type:text/html;charset=utf-8 \r\n";
					socket_write ($socket, $say, strlen ($say)); 
					$say="Content-Transfer-Encoding: 8bit \r\n";
					socket_write ($socket, $say, strlen ($say));
					$say="From:".$this->from." \r\n";
					socket_write ($socket, $say, strlen ($say));
					$say="Subject:".$this->subject." \r\n";
					socket_write ($socket, $say, strlen ($say)); 
					$say=$this->BODY." \r\n.\r\n"; 
					socket_write ($socket, $say, strlen ($say)); 
					$say="RSET \r\n";
					socket_write ($socket, $say, strlen ($say)); 
					$say="QUIT\r\n"; 
					socket_write ($socket, $say, strlen ($say)); 
					socket_close ($socket);
					if(!$flag){
					   break;					 
					}
			}
		}
	}
	
	function setBcc($bcc){
		$this->bcc=$bcc;
	
	}
	
	function setTo($to){
		$this->to=$to;
	}
}
?>