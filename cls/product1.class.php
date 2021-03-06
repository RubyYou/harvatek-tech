<?php
class Product1 extends Main{
    
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
		$this->table1 = "tbl_product1";
		$this->db = new MyDb();
		$this->uploadPath = BGM_UPLOADPATH.'product1/';
		$this->webRoot = WEB_ROOT.'uploads/product1/';
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
	
	function addProduct1($post,$files)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$ext = '';
        $file = $files['file']['name'];
        $tmpfile = $files['file']["tmp_name"];
		$ext = ".".pathinfo($file, PATHINFO_EXTENSION);
		$ext = ($ext == '.')?'':$ext;
		
		$order_num=$this->get_order('',false,$this->table1);
		$sql = "insert into 
				".$this->table1."
				values
				(
					null
					,'".$name."'
					,'".$link."'
					,'".$ext."'
					,'".$order_num."'
				)";
		$this->db->execute($sql);
		$insert_id = $this->db->getInsert_Id();
		if($ext != '')
		{
			$path = $this->uploadPath.$insert_id.$ext;
			if(!move_uploaded_file($tmpfile,$path))
			{
				@unlink($tmpfile);
				die(STR_UPLOADFAIL);
			}
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
				'product1_id'	=> $rs->product1_id
				,'name'			=> $rs->name
				,'link'			=> $rs->link
				,'ext'			=> $rs->ext
				,'order_num'	=> $rs->order_num
			);
		}
		return $ary;
		
	}
	
	function getProduct1($product1_id)
	{
		$product1_id = intval($product1_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				product1_id='".$product1_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
			$ary = array(
				'product1_id' 	=> $rs->product1_id
				,'name' 		=> $rs->name
				,'link' 		=> $rs->link
				,'ext'			=> $rs->ext
				,'order_num' 	=> $rs->order_num
			);
		
		return $ary;
		
	}
	
	function updateProduct1($post,$files)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$ext = '';
        $file = $files['file']['name'];
        $tmpfile = $files['file']["tmp_name"];
		$ext = ".".pathinfo($file, PATHINFO_EXTENSION);
		$ext = ($ext == '.')?'':$ext;
		
		$sql = "update ".$this->table1."
				set
				name='".$name."'
				,link='".$link."'";
		
		if($ext != '')
			$sql .= ",ext = '".$ext."'";
		
		$sql .= " where 
					product1_id='".$product1_id."'";
		$this->db->execute($sql);
		if($ext != '')
		{
			$path = $this->uploadPath.$product1_id.$ext;
			if(!move_uploaded_file($tmpfile,$path))
			{
				@unlink($tmpfile);
				die(STR_UPLOADFAIL);
			}
		}
	}
	
	function deleteProduct1($product1_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		$arr = $this->getProduct1($product1_id);
		$this->reset_order("product1_id",$product1_id,'',$this->table1);
		$product1_id = intval($product1_id);
		$sql = "delete from
				".$this->table1."
				where
				product1_id='".$product1_id."'";
		$this->db->execute($sql);
		@unlink($this->uploadPath.$product1_id.$arr['ext']);

	}

	function getAll()
	{
		$sql = "select *
				from ".$this->table1."
				order by
				order_num
				asc";
		$this->db->execute($sql);
		while($rs = $this->db->getNext())
		{
			$arr[] = array(
				'product1_id' => $rs->product1_id
				,'name' 		=> 		$rs->name
				,'link' 		=> 		$rs->link
				,'ext'			=>		$rs->ext
				,'order_num' 	=> 		$rs->order_num
			);
		}
		
		return $arr;
	}
	
	function getSelect($selected = '',$onchange = false)
	{
		if($onchange)
			$onchange_ = 'onchange="selectChange();"';
		$select = '<select name="product1_id" '.$onchange_.'>';
		$option = '';
		
		$product1Ary = $this->getAll();
		if(count($product1Ary) > 0)
		  foreach ($product1Ary as $key => $val)
		  {
				$selected_ = '';
				if($selected == $product1Ary[$key]['product1_id']) $selected_ = 'selected="selected"';
			  $option .= '<option value="'.$product1Ary[$key]['product1_id'].'" '.$selected_.'>'.$product1Ary[$key]['name'].'</option>';
		  }
		
		$select .= $option.'</select>';
		return $select;
	}


	//Front-End

}
?>