<?php
class Color extends Main{
    
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
		$this->table1 = "tbl_color";
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
	
	
	function addColor($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		array_walk($color,"quoteSlashes");
		
		if(is_array($color))
		{
			$this->deleteColor();
			foreach($color as $key => $val)
			{
				$sql = "insert into 
				".$this->table1."
				values
				(
					'".$val."'
				)";
				$this->db->execute($sql);
			}
		}
		
		//echo $sql;
	}
	
	function getPage()
    {
		$sql = "select *
				from ".$this->table1."
				order by
				name
				asc";
		$this->db->execute($sql);
		while($rs = $this->db->getNext())
		{
			$ary[] = $rs->name;
			
		}
		return $ary;
		
	}

	function deleteColor()
	{
		$sql = "delete from
				".$this->table1;
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
	function getColorOption($color_id)
	{
		$options = '';
		$arr = $this->getColor($color_id);
		$colorOptions = $arr['sel_option'];
		if(is_array($colorOptions))
		{
			foreach($colorOptions as $key => $val)
			{
				$options .= '<option value="'.$val.'">'.$val.'</option>';
			}
		}
		
		return $options;
	}


	
}
?>