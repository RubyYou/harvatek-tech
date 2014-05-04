<?php
class Product3 extends Main{
    
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
		$this->table1 = "tbl_product3";
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
	
	function addProduct3($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$keyAry['product2_id'] = $product2_id;
		
		$order_num=$this->get_order($keyAry,false,$this->table1);
		$sql = "insert into 
				".$this->table1."
				values
				(
					'".$product2_id."'
					,null
					,'".$name."'
					,'".$link."'
					,'".$order_num."'
				)";
		$this->db->execute($sql);
	}
    
	function getPage($nowpage,$product2_id)
    {
		$nowpage = intval($nowpage);
		$pagesize = 10;
		$MenuSize = 10;
		if($nowpage==0 || $nowpage=='') $nowpage=1;
		
		$sql = "select *
				from ".$this->table1."
				where
				product2_id = '".$product2_id."'
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
				'product2_id' 		=> 		$rs->product2_id
				,'product3_id' 		=> 		$rs->product3_id
				,'name' 			=> 		$rs->name
				,'link' 			=> 		$rs->link
				,'order_num' 		=> 		$rs->order_num
			);
		}
		return $ary;
		
	}
	
	function getProduct3($product3_id)
	{
		$product3_id = intval($product3_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				product3_id='".$product3_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
			$ary = array(
				'product2_id' => $rs->product2_id
				,'product3_id' => $rs->product3_id
				,'name' => $rs->name
				,'link' => $rs->link
				,'order_num' => $rs->order_num
			);
		
		return $ary;
		
	}
	
	function updateProduct3($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$arr = $this->getProduct3($product3_id);
		$o_product2_id = $arr['product2_id'];
		$sql = '';
		if($o_product2_id == $product2_id)
		{
			$sql = "update ".$this->table1."
				set
				product2_id = '".$product2_id."'
				,name='".$name."'
				,link='".$link."'
				where 
				product3_id='".$product3_id."'";
		}
		else
		{
			$keyAry['product2_id'] = $o_product2_id;
			$this->reset_order("product3_id",$product3_id,$keyAry,$this->table1);
			$keyAry['product2_id'] = $product2_id;
			$order_num=$this->get_order($keyAry,false,$this->table1);
			$sql = "update ".$this->table1."
				set
				product2_id = '".$product2_id."'
				,name='".$name."'
				,link='".$link."'
				,order_num = '".$order_num."'
				where 
				product3_id='".$product3_id."'";
		}
		
		
		echo $sql;
		$this->db->execute($sql);
	}
	
	function deleteProduct3($product2_id,$product3_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		
		$product2_id = intval($product2_id);
		$product3_id = intval($product3_id);
		$keyAry['product2_id'] = $product2_id;
		
		$this->reset_order("product3_id",$product3_id,$keyAry,$this->table1);
		$sql = "delete from
				".$this->table1."
				where
				product3_id='".$product3_id."'";
		$this->db->execute($sql);

	}
	
	
	function getAll($product2_id = '')
	{
		$product2_id = intval($product2_id);
		$sqlWhere = '';
		if($product2_id != 0)
			$sqlWhere = " where
							product2_id = '".$product2_id."' ";
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
				'product2_id' => $rs->product2_id
				,'product3_id' => $rs->product3_id
				,'name' 		=> 		$rs->name
				,'link' 		=> 		$rs->link
				,'order_num' 	=> 		$rs->order_num
			);
		}
		
		return $arr;
	}
	
	
	
	function getSelect($selected = '',$onchange = false)
	{
		$cProduct1 = new Product1();
		$cProduct2 = new Product2();
		
		if($onchange)
			$onchange_ = 'onchange="selectChange();"';
		$select = '<select name="product3_id" '.$onchange_.'>';
		$option = '';
		
		$product1Ary = $cProduct1->getAll();
		if(count($product1Ary) > 0)
		  foreach ($product1Ary as $key1 => $val1)
		  {

				$option .= '<optgroup label="'.$product1Ary[$key1]['name'].'">';
				
				$product2Ary = $cProduct2->getAll($product1Ary[$key1]['product1_id']);
				foreach($product2Ary as $key2 => $val2)
				{
					$option .= '<optgroup label="&nbsp;&nbsp;'.$product2Ary[$key2]['name'].'">';
					
					$product3Ary = $this->getAll($product2Ary[$key2]['product2_id']);
					foreach($product3Ary as $key3 => $val3)
					{
						$selected_ = '';
						if($selected == $product3Ary[$key3]['product3_id']) $selected_ = 'selected="selected"';
						$option .= '<option value="'.$product3Ary[$key3]['product3_id'].'" '.$selected_.'>'.$product3Ary[$key3]['name'].'</option>';
					}
					
					
					$option .= '</optgroup>';
				}
				$option .= '</optgroup>';
				
		  }
		
		$select .= $option.'</select>';
		return $select;
	}


	//Front-End

}
?>