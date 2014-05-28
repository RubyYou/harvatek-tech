<?php
class Contact extends Main{
    
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
		$this->table1 = "tbl_contact";
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
	
	function addContact($post)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$sql = "insert into 
				".$this->table1."
				values
				(
					null
					,'".$name."'
					,'".$company."'
					,'".$email."'
					,'".$position."'
					,'".$phone."'
					,'".$feedback."'
					,'".json_encode($inquiryProduct)."'
					,'".$Application_Assist."'
					,'".date('Y-m-d H:i:s')."'
				)";
		if($this->db->execute($sql))
		{
			$style = 'color:#d9534f;';
			$cMail=new Mail(FWEB_SERVICEMAILTITLE,FWEB_WEBSITEMAIL,FWEB_SERVICEMAIL1,WEB_PATH."contactMail.html");
			$cMail->assign("webroot",WEB_ROOT);
			$cMail->assign("name",htmlspecialchars($name));
			$cMail->assign("company",htmlspecialchars($company));
			$cMail->assign("email",htmlspecialchars($email));
			$cMail->assign("position",htmlspecialchars($position));
			$cMail->assign("phone",htmlspecialchars($phone));
			$cMail->assign("feedback",nl2br(htmlspecialchars(stripcslashes($feedback))));
			$cMail->assign("Application_Assist",nl2br(htmlspecialchars(stripcslashes($Application_Assist))));
			foreach($inquiryProduct as $key => $val){
				$cMail->assign($val,$style);
			}
			$cMail->assign("addtime",date("Y-m-d H:i:s"));
			$cMail->replace(true);
			$cMail->send();
			return 1;
		}
		else
		{
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
			add_time
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
				'contact_id'					=> $rs->contact_id
				,'name'							=> $rs->name
				,'company'						=> $rs->company
				,'email'						=> $rs->email
				,'position'						=> $rs->position
				,'phone'						=> $rs->phone
				,'other_feedback'				=> $rs->other_feedback
				,'inquiry_topic'				=> $rs->inquiry_topic
				,'application_assistant'		=> $rs->application_assistant
				,'add_time'						=> $rs->add_time
			);
		}
		return $ary;
		
	}
	
	function getContact($contact_id)
	{
		$contact_id = intval($contact_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				contact_id='".$contact_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
			$ary = array(
				'contact_id'					=> $rs->contact_id
				,'name'							=> $rs->name
				,'company'						=> $rs->company
				,'email'						=> $rs->email
				,'position'						=> $rs->position
				,'phone'						=> $rs->phone
				,'other_feedback'				=> $rs->other_feedback
				,'inquiry_topic'				=> json_decode($rs->inquiry_topic)
				,'application_assistant'		=> $rs->application_assistant
				,'add_time'						=> $rs->add_time
			);
		
		return $ary;
		
	}
	
	function deleteContact($contact_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		$contact_id = intval($contact_id);
		$sql = "delete from
				".$this->table1."
				where
				contact_id='".$contact_id."'";
		$this->db->execute($sql);
	}


	//Front-End

}
?>