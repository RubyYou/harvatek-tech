<?php
class Cri extends Main{
    
    public $table1;
	public $table2;
	public $uploadPath;
	public $db;
	public $quantityOption;
    
	function __construct()
	{
		/*
		 *__construct()
		 *類別同名的函式
		 *同時有兩個建構子，則以  __construct() 為優先，同類別名的函數將不會被執行
		 */
		$this->table1 = "tbl_cri";
		$this->db = new MyDb();
	}
	
	function __destruct(){
		/*
		 *解構子會在
		 *1.程式執行到結尾
		 *2.程式exit
		 *3.物件被unset
		 *後被執行
		 *
		 *子類別要執行父類別的建解構子，就要特別叫用，使用 parent::
		 *parent::__construct();
		 *parent::__destruct();
		 */
		$this->close();
		//print_r($this->db);
	}
	
	function close()
	{
		$this->db->closeConnection();
	}
	
	
	function addCri($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		$cri = $this->popNullArray($cri);
		$cri_json = json_encode($cri);
		quoteSlashe($cri_json);
		$sql = "insert into 
				".$this->table1."
				values
				(
					null
					,'".$name."'
					,'".$cri_json."'
				)";
		$this->db->execute($sql);
		echo $sql;
	}
	
	function getPage($nowpage)
    {
		$nowpage = intval($nowpage);
		$pagesize = 10;
		$MenuSize = 10;
		if($nowpage==0 || $nowpage=='') $nowpage=1;
		
		$sql = "select *
				from ".$this->table1."
				order by
				name
				asc";
		$page=new paging($this->db,$sql,$pagesize,$nowpage,$MenuSize);
		$pagecount=$page->getPageCount();
		$nowpage=$page->getNowPage();
		$pageMenu=$page->getPagelink(true);
		$pageMenu=str_replace('[=slink=]','',$pageMenu);
		$ary['pageMenu']=$pageMenu;
		$ary['nowpage']=$nowpage;
		$ary['pagecount']=$pagecount;
		while($rs = $this->db->getNext())
		{
			$ary['data'][] = array(
				'cri_id' 			=> 		$rs->cri_id
				,'name' 			=> 		$rs->name
			);
		}
		return $ary;
		
	}
	
	function getCri($cri_id)
	{
		$cri_id = intval($cri_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				cri_id='".$cri_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
		$ary = array(
			'cri_id' 			=> 		$rs->cri_id
			,'name' 			=> 		$rs->name
			,'sel_option' 			=> 		json_decode($rs->sel_option)
		);
		
		return $ary;
		
	}
	
	function updateCri($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		$cri = $this->popNullArray($cri);
		$cri_json = json_encode($cri);
		quoteSlashe($cri_json);
		
		$sql = "update ".$this->table1."
			set
			name='".$name."'
			,sel_option='".$cri_json."'
			where 
			cri_id='".$cri_id."'";
		
		$this->db->execute($sql);
		echo $sql;
	}

	function deleteCri($cri_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		$sql = "delete from
				".$this->table1."
				where
				cri_id='".$cri_id."'";
		$this->db->execute($sql);
	}
	
	function popNullArray($array)
	{
		if(is_array($array))
		{
			$_array = Array();
			foreach($array as $key => $val)
			{
				if($val != '')
					$_array[] = $val;
			}
			
			return $_array;
		}
		
		return null;
	}
	
	

	//Front-End


	
}
?>