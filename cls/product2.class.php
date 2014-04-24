<?php
class Product2 extends Main{
    
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
		$this->table1 = "tbl_product2";
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
	
	function addProduct2($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$keyAry['product1_id'] = $product1_id;
		
		$order_num=$this->get_order($keyAry,false,$this->table1);
		$sql = "insert into 
				".$this->table1."
				values
				(
					'".$product1_id."'
					,null
					,'".$name."'
					,'".$link."'
					,'".$order_num."'
				)";
		$this->db->execute($sql);
	}
    
	function getPage($nowpage,$product1_id)
    {
		$nowpage = intval($nowpage);
		$pagesize = 10;
		$MenuSize = 10;
		if($nowpage==0 || $nowpage=='') $nowpage=1;
		
		$sql = "select *
				from ".$this->table1."
				where
				product1_id = '".$product1_id."'
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
				'product1_id' 		=> 		$rs->product1_id
				,'product2_id' 		=> 		$rs->product2_id
				,'name' 			=> 		$rs->name
				,'link' 			=> 		$rs->link
				,'order_num' 		=> 		$rs->order_num
			);
		}
		return $ary;
		
	}
	
	function getProduct2($product2_id)
	{
		$product1_id = intval($product2_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				product2_id='".$product2_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
			$ary = array(
				'product1_id' => $rs->product1_id
				,'product2_id' => $rs->product2_id
				,'name' => $rs->name
				,'link' => $rs->link
				,'order_num' => $rs->order_num
			);
		
		return $ary;
		
	}
	
	function updateProduct2($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$arr = $this->getProduct2($product2_id);
		$o_product1_id = $arr['product1_id'];
		$sql = '';
		if($o_product1_id == $product1_id)
		{
			$sql = "update ".$this->table1."
				set
				product1_id = '".$product1_id."'
				,name='".$name."'
				,link='".$link."'
				where 
				product2_id='".$product2_id."'";
		}
		else
		{
			$keyAry['product1_id'] = $o_product1_id;
			$this->reset_order("product2_id",$product2_id,$keyAry,$this->table1);
			$keyAry['product1_id'] = $product1_id;
			$order_num=$this->get_order($keyAry,false,$this->table1);
			$sql = "update ".$this->table1."
				set
				product1_id = '".$product1_id."'
				,name='".$name."'
				,link='".$link."'
				,order_num = '".$order_num."'
				where 
				product2_id='".$product2_id."'";
		}
		
		
		echo $sql;
		$this->db->execute($sql);
	}
	
	function deleteProduct2($product1_id,$product2_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		
		$product1_id = intval($product1_id);
		$product2_id = intval($product2_id);
		$keyAry['product1_id'] = $product1_id;
		
		$this->reset_order("product2_id",$product2_id,$keyAry,$this->table1);
		$sql = "delete from
				".$this->table1."
				where
				product2_id='".$product2_id."'";
		$this->db->execute($sql);

	}




	//Front-End

}
?>