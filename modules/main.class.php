<?php
class Main{
	var $db;
	function Main($db=''){
		if($db!=""){
			$this->db=&$db;
		}
	}

	function unsqlInjection($str){
			$str=str_replace('=','',$str);
			$str=str_replace(';','',$str);
			$str=str_replace(',','',$str);
			$str=str_replace('"','',$str);			
			$str=str_replace("'",'',$str);
			$str=str_replace("(",'',$str);
			$str=str_replace(")",'',$str);
			return $str;
	}
	
	function dbclose(){
		$this->db->closeConnection();
	}
	
	function get_order($keys='',$after=true,$tbl_name="",$order_filed='order_num'){
		if($tbl_name=="") $tbl_name=$this->tbl_name;
		$tmpsql="";
		if(is_array($keys)){
			foreach( $keys as $key => $val){
				if($tmpsql!="") $tmpsql.=" and ";
				$tmpsql.=" ".$key."='".$this->unsqlInjection($val)."' ";							
			}					
		}
		if($tmpsql!="") $tmpsql=" where ".$tmpsql;
		if($after==true){
			$sql="select max(".$order_filed.") as num from ".$tbl_name." ".$tmpsql;
			$rs=$this->db->execNext($sql);
			return ($rs->{'num'}+1);
		}else{
			$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."+1 ".$tmpsql;
			$this->db->execute($sql);
			return 1;
		}
		return 0;
	}
	
	function reset_order($idkey,$idval,$keys='',$tbl_name="",$order_filed='order_num'){
		if($tbl_name=="") $tbl_name=$this->tbl_name;
		$tmpsql="";
		if(is_array($keys)){
			foreach( $keys as $key => $val){
				if($tmpsql!="") $tmpsql.=" and ";
				$tmpsql.=" ".$key."='".$this->unsqlInjection($val)."' ";							
			}					
		}
		if($tmpsql!="") $tmpsql=" where ".$tmpsql;	
		$sql="select ".$order_filed." from ".$tbl_name." where $idkey='".$idval."'";
		if($rs=$this->db->execNext($sql)){
			$order_num=$rs->{$order_filed};
			if($tmpsql!=""){
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."-1 ".$tmpsql." and ".$order_filed.">".$order_num;
			}else{
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."-1 where ".$order_filed.">".$order_num;
			}
			$this->db->execute($sql);
		}
	}
	
	
	function change_order($idkey,$idval,$keys='',$order='',$tbl_name="",$order_filed='order_num'){
		if($tbl_name=="") $tbl_name=$this->tbl_name;
		$tmpsql="";
		if(is_array($keys)){
			foreach( $keys as $key => $val){
				if($tmpsql!="") $tmpsql.=" and ";
				$tmpsql.=" ".$key."='".$this->unsqlInjection($val)."' ";							
			}					
		}
		if($tmpsql!="") $tmpsql=" where ".$tmpsql;
		if($tmpsql==""){
			$sql="select ".$order_filed." from ".$tbl_name." where  ".$idkey."='".$this->unsqlInjection($idval)."'";
		}else{
			$sql="select ".$order_filed." from ".$tbl_name." ".$tmpsql." and ".$idkey."='".$this->unsqlInjection($idval)."'";
		}
		//echo $sql;
		$rs=$this->db->execNext($sql);
		$order_num=$rs->{$order_filed};
		//echo $order_num;
		if($order=="up"){
			if($order_num<=1) return false;
			if($tmpsql==''){
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."+1 where ".$order_filed."=".($order_num-1);;
				$this->db->execute($sql);			
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."-1 where ".$idkey."='".$this->unsqlInjection($idval)."'";
				$this->db->execute($sql);
			}else{			
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."+1 ".$tmpsql." and ".$order_filed."=".($order_num-1);;
				$this->db->execute($sql);
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."-1 ".$tmpsql." and ".$idkey."='".$this->unsqlInjection($idval)."'";
				$this->db->execute($sql);
			}
		}else if($order=="down"){
			$sql="select max(".$order_filed.") as num from ".$tbl_name." ".$tmpsql;
			$rs=$this->db->execNext($sql);
			$max_num=$rs->{'num'};			
			if($order_num>=$max_num) return false;		
			if($tmpsql==''){
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."-1 where ".$order_filed."=".($order_num+1);
				$this->db->execute($sql);
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."+1 where ".$idkey."='".$this->unsqlInjection($idval)."'";;
				$this->db->execute($sql);
			}else{
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."-1 ".$tmpsql." and ".$order_filed."=".($order_num+1);
				$this->db->execute($sql);
				$sql="update ".$tbl_name." set ".$order_filed."=".$order_filed."+1 ".$tmpsql." and ".$idkey."='".$this->unsqlInjection($idval)."'";;
				$this->db->execute($sql);
			}
		}
	}
	
	function getDate($str,$sp='/',$sp2=':'){
		if(strlen($str)==8 || $sp2==''){
			return substr($str,0,4).$sp.substr($str,4,2).$sp.substr($str,6,2);
		}
		if(strlen($str)>=14){
			return substr($str,0,4).$sp.substr($str,4,2).$sp.substr($str,6,2).' '.substr($str,8,2).$sp2.substr($str,10,2).$sp2.substr($str,12,2);
		}
		return '';
	}
	
	function testMain(){
		var_dump($this->db);
	}

}
?>