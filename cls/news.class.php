<?php
class News extends Main{
    
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
		$this->table1 = "tbl_news";
		$this->db = new MyDb();
		$this->uploadPath = BGM_UPLOADPATH.'news/';
		$this->webRoot = WEB_ROOT.'uploads/news/';
		
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
	
	
	function addNews($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$sql = "insert into 
				".$this->table1."
				values
				(
					null
					,'".$name."'
					,'".$post_date."'
					,'".$content."'
				)";
		$this->db->execute($sql);
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
				post_date
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
				'news_id' 			=> 		$rs->news_id
				,'name' 			=> 		$rs->name
				,'post_date' 		=> 		$rs->post_date
				,'content'			=>		$rs->content
			);
		}
		return $ary;
		
	}
	
	function getNews($news_id)
	{
		$news_id = intval($news_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				news_id='".$news_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
		$ary = array(
			'news_id' 			=> 		$rs->news_id
			,'name' 			=> 		$rs->name
			,'post_date' 		=> 		$rs->post_date
			,'content'			=>		$rs->content
		);
		
		return $ary;
		
	}
	
	function updateNews($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$sql = "update ".$this->table1."
			set
			
			name='".$name."'
			,post_date='".$post_date."'
			,content = '".$content."'
			where 
			news_id='".$news_id."'";
		
		$this->db->execute($sql);
	}

	function deleteNews($news_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		$sql = "delete from
				".$this->table1."
				where
				news_id='".$news_id."'";
		$this->db->execute($sql);
	}

	//Front-End // try to the latest three records by myself.

	function getNews_Front($news_id)
	{
		$news_id = intval($news_id);
		$sql = "select * 
				from ".$this->table1;
		if($news_id == 0)
			$sql .= " order by post_date desc limit 3";
		else
			$sql .= " where 
					news_id='".$news_id."'";
		$this->db->execute($sql);
		//$rs = $this->db->getNext();

		while($rs = $this->db->getNext()){
		$ary[] = array(
			'news_id' 			=> 		$rs->news_id
			,'name' 			=> 		$rs->name
			,'post_date' 		=> 		$rs->post_date
			,'content'			=>		$rs->content
			);
		}
		return $ary;
	}
	
}
?>