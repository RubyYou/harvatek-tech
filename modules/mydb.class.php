<?php
class MyDb{
	var $conn=NULL;
	var $connection1=NULL;
	var $connection2=NULL;
	var $connection3=NULL;
	var $connection4=NULL;
	var $rs=NULL;
	var $recordset1=NULL;
	var $recordset2=NULL;
	var $recordset3=NULL;
	var $recordset4=NULL;
	var $db=NULL;
		
	function MyDb(){
		$this->setConnectGroup(1);
		$this->getConnection();	
	}
	
	function setConnectGroup($group){
		$this->conn=&$this->{'connection'.$group};
		$this->rs=&$this->{'recordset'.$group};
		if($this->conn==NULL) $this->getConnection();
	}
	
	
	function getConnection($dbdriver="mysql"){
		include(DBCONFIG);
		$this->conn = &ADONewConnection($dbdriver); 
		$this->conn->Connect($server, $user, $password, $database);
	}
	
	function getInsert_Id(){
		return $this->conn->Insert_ID();
	}
	
	function getMax_Id($table, $id){
		return $this->conn->PO_Insert_ID($table,$id);
	}
	
	function execute($sql){
		$this->conn->execute("SET NAMES 'utf8'"); 
		$this->conn->execute("SET CHARACTER_SET_CLIENT=utf8"); 
		$this->conn->execute("SET CHARACTER_SET_RESULTS=utf8"); 
		$this->rs=$this->conn->Execute($sql);
		if(!$this->rs){
			return false;
		}else{
			return true;
		}		
	}
	
	
	function paging($sql){
		$pager = new ADODB_Pager($this->conn,$sql);
		$pager->Render(5);
	}
	
	
	function getcount(){
		return  $this->rs->RecordCount();
	}
	
	
	function getNext(){
		if($this->rs){
			return $this->rs->FetchNextObj();
		}else{
			return false;
		}
	}
	
	function execNext($sql){
		if($this->execute($sql)){
			if($rs=$this->getNext()){
				return $rs;
			}
		}
		return false;
	}
	
	function MoveFirst(){
		$this->rs->MoveFirst();
	}
	
	
	function closeConnection(){
		for($ii=1;$ii<=4;$ii++){
			$this->conn=&$this->{'connection'.$ii};
			if($this->conn!=NULL) $this->conn->close();
		}
	}	
	
	
	function StartTrans(){
		 $this->conn->StartTrans();
		 $this->conn->execute('begin');
	}
	
	
	function FailTrans(){
		 $this->conn->FailTrans();
	}
	
	
	function HasFailedTrans(){
		return $this->conn->HasFailedTrans();
	}
	
	
	function CompleteTrans($flag){
		 if(!$flag){
		 	 $this->conn->execute('rollback'); 
			  $this->conn->CommitTrans();
			 return true;
		 }else{	 
			 $this->conn->execute('commit');
			  $this->conn->CommitTrans();
			 return false;
		 }
		
	}
	
	
	function RollbackTrans(){
		$this->conn->RollbackTrans();
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
	
	function alterAddColumn($tbl_name,$show_name,$col_type="text",$length=150,$is_null='N',$notes=''){
		$sql="select count(id) as num from tbl_data where tb_name ='".$this->unsqlInjection($tbl_name)."'";
		if($this->execute($sql)){
			if($rs=$this->getNext()){
				$num=$rs->{'num'}+1;
				if($num>0){
					$col_name=$tbl_name.$num;
					$sql="insert into tbl_data values(null,'$tbl_name','$col_name','$show_name','$col_type','$is_null','$notes');";
					if($this->execute($sql)){
						if($length>150){
							$sql="alter table ".$this->unsqlInjection($tbl_name)." add ".$col_name." text;";
						}else{
							$sql="alter table ".$this->unsqlInjection($tbl_name)." add ".$col_name." varchar($length);";
						}
						if($this->execute($sql)){
							return true;
						}
					}
				}
			}
			
		}
		return false;
	}
	

	function alterDropColumn($id){
		$sql="select * from tbl_data where id=".$this->unsqlInjection($id);
		if($rs=$this->execNext($sql)){
			$tbl_name=$rs->{'tb_name'};
			$col_name=$rs->{'col_name'};
			$sql="delete from tbl_data where id=".$this->unsqlInjection($id);
			if($this->execute($sql)){
				$sql="delete from tbl_data_opt where did=".$this->unsqlInjection($id);
				if($this->execute($sql)){
					$sql="alter table ".$this->unsqlInjection($tbl_name)." drop ".$this->unsqlInjection($col_name);
					$this->execute($sql);
					return true;
				}
			}
		}
		return false;	
	}
}
?>