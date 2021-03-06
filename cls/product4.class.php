<?php
class Product4 extends Main{
    
    public $table1;
	public $table2;
	public $db;
    
	function __construct()
	{
		/*
		 *__construct()
		 *類別同名的函式
		 *同時有兩個建構子，則以  __construct() 為優先，同類別名的函數將不會被執行
		 */
		$this->table1 = "tbl_product4";
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
	
	function addProduct4($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$keyAry['product3_id'] = $product3_id;
		
		$order_num=$this->get_order($keyAry,false,$this->table1);
		$sql = "insert into 
				".$this->table1."
				values
				(
					'".$product3_id."'
					,null
					,'".$name."'
					,'".$link."'
					,'".$order_num."'
				)";
		$this->db->execute($sql);
	}
    
	function getPage($nowpage,$product3_id)
    {
		$nowpage = intval($nowpage);
		$pagesize = 10;
		$MenuSize = 10;
		if($nowpage==0 || $nowpage=='') $nowpage=1;
		
		$sql = "select *
				from ".$this->table1."
				where
				product3_id = '".$product3_id."'
				order by
				order_num
				asc";
		//echo $sql;
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
				'product3_id' 		=> 		$rs->product3_id
				,'product4_id' 		=> 		$rs->product4_id
				,'name' 			=> 		$rs->name
				,'link' 			=> 		$rs->link
				,'order_num' 		=> 		$rs->order_num
			);
		}
		return $ary;
		
	}
	
	function getProduct4($product4_id)
	{
		$product4_id = intval($product4_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				product4_id='".$product4_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
			$ary = array(
				'product3_id' => $rs->product3_id
				,'product4_id' => $rs->product4_id
				,'name' => $rs->name
				,'link' => $rs->link
				,'order_num' => $rs->order_num
			);
		
		return $ary;
		
	}
	
	function updateProduct4($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$arr = $this->getProduct4($product4_id);
		$o_product3_id = $arr['product3_id'];
		$sql = '';
		if($o_product3_id == $product3_id)
		{
			$sql = "update ".$this->table1."
				set
				product3_id = '".$product3_id."'
				,name='".$name."'
				,link='".$link."'
				where 
				product4_id='".$product4_id."'";
		}
		else
		{
			$keyAry['product3_id'] = $o_product3_id;
			$this->reset_order("product4_id",$product4_id,$keyAry,$this->table1);
			$keyAry['product3_id'] = $product3_id;
			$order_num=$this->get_order($keyAry,false,$this->table1);
			$sql = "update ".$this->table1."
				set
				product3_id = '".$product3_id."'
				,name='".$name."'
				,link='".$link."'
				,order_num = '".$order_num."'
				where 
				product4_id='".$product4_id."'";
		}
		
		
		echo $sql;
		$this->db->execute($sql);
	}
	
	function deleteProduct4($product3_id,$product4_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		
		$product3_id = intval($product3_id);
		$product4_id = intval($product4_id);
		$keyAry['product3_id'] = $product3_id;
		
		$this->reset_order("product4_id",$product4_id,$keyAry,$this->table1);
		$sql = "delete from
				".$this->table1."
				where
				product4_id='".$product4_id."'";
		$this->db->execute($sql);

	}
	
	function getAll($product3_id = '')
	{
		$product3_id = intval($product3_id);
		$sqlWhere = '';
		if($product3_id != 0)
			$sqlWhere = " where
							product3_id = '".$product3_id."' ";
		$sql = "select *
				from ".$this->table1;
		$sql .= $sqlWhere;
		$sql .= " order by
					order_num
					asc";
		$this->db->execute($sql);
		while($rs = $this->db->getNext())
		{
			$arr[] = array(
				'product3_id' => $rs->product3_id
				,'product4_id' => $rs->product4_id
				,'name' 		=> 		$rs->name
				,'link' 		=> 		$rs->link
				,'order_num' 	=> 		$rs->order_num
			);
		}
		
		return $arr;
	}

	
	
//	
//	 SELECT 
//p1.name as p1_name
//,p1.link as p1_link
//,p2.name as p2_name
//,p2.link as p2_link
//,p3.name as p3_name
//,p3.link as p3_link
//,p4.name as p4_name
//,p4.link as p4_link
//FROM `tbl_product2` as p2
//right join tbl_product1 as p1
//on p1.product1_id = p2.product1_id
//left join tbl_product3 as p3
//on p3.product2_id = p2.product2_id
//left join tbl_product4 as p4
//on p4.product3_id = p3.product3_id
//order by 
//p1.order_num asc 
//, p2.order_num asc
//, p3.order_num asc
//, p3.order_num asc
	

	//Front-End

}
?>