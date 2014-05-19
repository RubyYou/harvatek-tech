<?php
class Inquiry extends Main{
    
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
		$this->table1 = "tbl_inquiry";
		$this->table2 = "tbl_inquiry_item";
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
	
	function addInquiry($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		$cSystem = new System();
		$sql = "insert into 
				".$this->table1."
				values
				(
					null
					,'".$country."'
					,'".$first_name."'
					,'".$last_name."'
					,'".$email."'
					,'".$phone."'
					,'".$address."'
					,'".$address_option."'
					,'".$postcode."'
					,'".$additionalInfo."'
					,'".date('Y-m-d H:i:s')."'
					,'".$cSystem->getClientIP1()."'
				)";
		if($this->db->execute($sql))
		{
			$inquriy_id = $this->db->getInsert_Id();
			if(is_array($cart)){
				$cProduct = new Product();
				$sql = "insert into
						".$this->table2."
						values ";
				$sqlContent = '';
				foreach($cart as $key => $val)
				{
					$product = $cProduct->getProduct($cart[$key]['id']);
					quoteSlashe($product['name']);
					$other = json_encode(array(
							'color'		=>		$cart[$key]['color'],
							'cri'		=>		$cart[$key]['cri']
					));
					$sqlContent .= ",(
										'".$inquriy_id."',
										'".$product['name']."',
										'".$cProduct->quantityOption[$cart[$key]['quantity']]."',
										'".$other."'
									)";
				}
				$sqlContent = preg_replace('/,/','',$sqlContent,1);
				$sql = $sql.$sqlContent;
				if($this->db->execute($sql)){
					return $inquriy_id;
				}
				else{
					return -3;
				}
			}
			else{
				return -2;
			}
			
		}
		else{
			return -1;
		}
	}
    
	function getPage($nowpage)
    {
		$nowpage = intval($nowpage);
		$pagesize = 10;
		$MenuSize = 10;
		if($nowpage==0 || $nowpage=='') $nowpage=1;
		
		$sql = "select * from "
			.$this->table1
			." order by
			send_time
			desc";
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
				'inquiry_id'					=> $rs->inquiry_id
				,'country'						=> $rs->country
				,'first_name'					=> $rs->first_name
				,'last_name'					=> $rs->last_name
				,'email'						=> $rs->email
				,'phone'						=> $rs->phone
				,'address'						=> $rs->address
				,'address_option'				=> $rs->address_option
				,'postcode'						=> $rs->postcode
				,'additionalInfo'				=> $rs->additionalInfo
				,'send_time'					=> $rs->send_time
				,'ip'							=> $rs->ip
			);
		}
		return $ary;
		
	}
	
	function getInquiry($inquiry_id)
	{
		$inquiry_id = intval($inquiry_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				inquiry_id='".$inquiry_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
			$ary = array(
				'inquiry_id'					=> $rs->inquiry_id
				,'country'						=> $rs->country
				,'first_name'					=> $rs->first_name
				,'last_name'					=> $rs->last_name
				,'email'						=> $rs->email
				,'phone'						=> $rs->phone
				,'address'						=> $rs->address
				,'address_option'				=> $rs->address_option
				,'postcode'						=> $rs->postcode
				,'additionalInfo'				=> $rs->additionalInfo
				,'send_time'					=> $rs->send_time
				,'ip'							=> $rs->ip
			);
		
		return $ary;
		
	}
	
	function getInquiryItem($inquiry_id)
	{
		$inquiry_id = intval($inquiry_id);
		$sql = "select * 
				from ".$this->table2."
				where 
				inquiry_id='".$inquiry_id."'";
		$this->db->execute($sql);
		while($rs = $this->db->getNext())
		{
			$arr[] = array(
				'inquiry_id'					=> $rs->inquiry_id
				,'product_name'					=> $rs->product_name
				,'quantity'						=> $rs->quantity
				,'other_info'					=> $rs->other_info
			);
		}
		
		return $arr;
	}
	
	function deleteInquiry($inquiry_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		$inquiry_id = intval($inquiry_id);
		$sql = "delete from
				".$this->table1."
				where
				inquiry_id='".$inquiry_id."'";
		$this->db->execute($sql);
		$sql = "delete from
				".$this->table2."
				where
				inquiry_id='".$inquiry_id."'";
		$this->db->execute($sql);
	}


	//Front-End

}
?>