<?php
/*
 * @name Tree
 * @update by Nick
 * @copyright 2013 TARGETS
 * @updated 2013-09-23
 */
class Tree{
	var $child;
	var $id; 
	var $name;
	var $linkage;
	var $root;
	var $target;
	var $command;//用來存跳出視窗的指令
	var $nowpos;
	var $num;
	var $table;
	var $visibleflag;
	var $mHr = 'images/hr.gif';
	var $mHrEnd = 'images/hr_L.gif';
	var $mVertical = 'images/vertical.gif';
	var $mPlus = 'images/plusik.gif';
	var $mPlusEnd = 'images/plusik_L.gif';
	
	
	function tree($name,$linkage,$target,$command=''){
		$this->root=&$this;
		$this->nowpos=&$this;
		$this->name=$name;
		$this->linkage=$linkage;	
		$this->command=$command;	
		$this->child=NULL;
		$this->next_=NULL;
		$this->id=0;
		$this->num=0;
		$this->target=$target;
		$this->visibleflag=false;;
	}
	
	function setHr($param_imglink){
		$this->mHr = $param_imglink;
	}
	function setHrEnd($param_imglink){
		$this->mHrEnd = $param_imglink;
	}
	function setVertical($param_imglink){
		$this->mVertical = $param_imglink;
	}
	function setPlus($param_imglink){
		$this->mPlus = $param_imglink;
	}
	function setPlusEnd($param_imglink){
		$this->mPlusEnd = $param_imglink;
	}
	
	function add($parentid,$name,$linkage,$target,$command=''){		
		$root=&$this->getRoot();
		$obj=&$this->searchId($root,$parentid);
		if($obj->child==NULL){
			$this->addChild($obj,$name,$linkage,$target,$command);
		}else{									
			$tmp=&$obj->child;
			while($tmp->next_!=NULL){
				$tmp=&$tmp->next_;
			}
			$this->addNext($tmp,$name,$linkage,$target,$command);		
		}		
	}
	
	function &searchId($obj,$id){
		if($obj==NULL){					
			return false;	
		}
		if($obj->id==$id){			
			return $obj;	
		}
		if($obj->child!=NULL){
			$tmp=&$this->searchId($obj->child,$id);
			if(is_object($tmp)){
				return $tmp;				
			}			
		}
		if($obj->next_!=NULL){
			$tmp=&$this->searchId($obj->next_,$id);			
			if(is_object($tmp)){
				return $tmp;
			}
		}
		return false;
	}

	function addNext($obj,$name,$linkage,$target,$command){
		$father=&$obj;
		$tmpobj=new tree($name,$linkage,$target,$command);
		$this->num++;
		$tmpobj->id=$this->num;
		$father->next_=&$tmpobj;
		$this->nowpos=&$tmpobj;	
	}
	
	
	function addChild($obj,$name,$linkage,$target,$command){
		$father=&$obj;		
		$tmpobj=new tree($name,$linkage,$target,$command);		
		$this->num++;
		$tmpobj->id=$this->num;
		$father->child=&$tmpobj;	
		$this->nowpos=&$tmpobj;
	}
	
	function getNowId(){
		return $this->nowpos->id;
	}
	
	
	function &getRoot(){
		return $this->root; 
	}
	
	function showTree(){
		$root=&$this->getRoot();
		$this->showTree_($root);		
	}
	
	function &showTree_($obj){	
		if($obj==NULL){					
			return false;	
		}
		if($obj->child!=NULL){
			$tmp=&$this->showTree_($obj->child);
			if(is_object($tmp)){			
				return $tmp;				
			}			
		}
		if($obj->next_!=NULL){
			$tmp=&$this->showTree_($obj->next_);			
			if(is_object($tmp)){
				return $tmp;
			}
		}
		return false;
	}

	function showTable(){		
		$this->table=" <table class=\"tree\">\n";
		$root=&$this->getRoot();		
		$this->showTable_($root);		
		$this->table.="</table>";
		echo $this->table;
	}
	
	function getShowTable()
	{
		$this->table=" <table class=\"tree\">\n";
		$root=&$this->getRoot();		
		$this->showTable_($root);		
		$this->table.="</table>";
		return $this->table;
	}
	
	function &showTable_($obj){
		if($obj!=NULL){			
			if($obj->child!=NULL){
				if($obj->child->next_!=NULL){
					$this->table.="<tr><th class=\"tree_th1\"> ".$obj->name."</th></tr>\n";		
				}else{
					$this->table.="<tr><th class=\"tree_th2\"> ".$obj->name."</th></tr>\n";		
				}
				$this->table.="<tr><td >".$this->childTable($obj->child)."</td></tr>\n";				
			}
			if($obj->next_!=NULL){
				$this->table.=$this->nextTable($obj->next_);
			}			
		}
	}

	function nextTable($obj){
		if($obj->child!=NULL){
			if($obj->next_!=NULL){
				$table="<tr class=\"tree_parent\"><td><img src='".$this->mPlus."' id='img".$obj->id."' onclick=\"treeHideShow('table".$obj->id."','img".$obj->id."');\" ></td><td class=\"tree_node\" onclick=\"treeHideShow('table".$obj->id."','img".$obj->id."');\" >".$obj->name."</td></tr>\n";		
			}else{
				$table="<tr><td><img src='".$this->mPlusEnd."' id='img".$obj->id."' onclick=\"treeHideShow2('table".$obj->id."','img".$obj->id."');\"></td><td class=\"tree_node\" onclick=\"treeHideShow2('table".$obj->id."','img".$obj->id."');\" >".$obj->name."</td></tr>\n";		
			}		
		}else if($obj->next_!=NULL){
			if($obj->next_!=NULL){
				$table="<tr><td><img src='".$this->mHr."'></td><td>".$this->getLink($obj)."</td></tr>\n";		
			}else{
				$table="<tr><td><img src='".$this->mHrEnd."'></td><td>".$this->getLink($obj)."</td></tr>\n";		
			}				
		}else{
			$table="<tr><td><img src='".$this->mHrEnd."'></td><td>".$this->getLink($obj)."</td></tr>\n";		
		}
		if($obj->child!=NULL){
			if($obj->next_!=NULL){
				$table.="<tr id='table".$obj->id."' style='display:none;'><td class=\"tree_vertical\" background=\"".$this->mVertical."\"></td><td>";
			}else{
				$table.="<tr id='table".$obj->id."' style='display:none;'><td></td><td>";
			}
			$table.=$this->childTable($obj->child);
			$table.="</td></tr>\n";			
		}
		if($obj->next_!=NULL){
			$table.=$this->nextTable($obj->next_);
		}		
		return $table;
	}
	
	function childTable($obj){		
		$table="\n<table class=\"tree\">";
		if($obj->child!=NULL){
			if($obj->next_!=NULL){
				$table.="<tr class=\"tree_parent\"><td><img src='".$this->mPlus."' id='img".$obj->id."'  onclick=\"treeHideShow('table".$obj->id."','img".$obj->id."');\" ></td><td class=\"tree_node\" onclick=\"treeHideShow('table".$obj->id."','img".$obj->id."');\" >".$obj->name."</td></tr>\n";
			}else{
				$table.="<tr><td><img src='".$this->mPlusEnd."' id='img".$obj->id."'onclick=\"treeHideShow2('table".$obj->id."','img".$obj->id."');\" ></td><td class=\"tree_node\" onclick=\"treeHideShow2('table".$obj->id."','img".$obj->id."');\" >".$obj->name."</td></tr>\n";		
			}		
		}else if($obj->next_!=NULL){
			$table.="<tr><td><img src='".$this->mHr."'></td><td>".$this->getLink($obj)."</td></tr>\n";
		}else{
			$table.="<tr><td><img src='".$this->mHrEnd."'></td><td>".$this->getLink($obj)."</td></tr>\n";		
		}	
		if($obj->child!=NULL){
			if($obj->next_!=NULL){
				$table.="<tr id='table".$obj->id."' style='display:none;'><td class=\"tree_vertical\" background=\"".$this->mVertical."\"></td><td>";
			}else{
				$table.="<tr id='table".$obj->id."' style='display:none;'><td></td><td>";
			}	
			$table.=$this->childTable($obj->child);
			$table.="</td></tr>\n";
		}
		if($obj->next_!=NULL){
			$table.=$this->nextTable($obj->next_);
		}
		$table.="</table>\n";
		return $table;
	}	
	
	function getLink($obj){
		if($obj->command!=""){
			$link="<a href=\"#\" onClick=\"window.open('".$obj->linkage."','','".$obj->command."');\">".$obj->name."</a>";		
		}else{
			$link="<a href=\"".$obj->linkage."\" target=\"".$obj->target."\">".$obj->name."</a>";		
		}
		return $link;
	}
	
	
}

/*
 *Sample
 */

// $cTree=new Tree(BGM_TITLE."管理介面","#","");
//$rootid=$cTree->getNowId();
//
//$cTree->add($rootid,"會員資料","#","");
//$id1=$cTree->getNowId();
//$cTree->add($id1,"會員資料列表","member/list.php","mainframe");
//
//$cTree->add($rootid,"年度盛會","#","");
//$id1=$cTree->getNowId();
////$cTree->add($id1,"年度盛會列表","years/list.php","mainframe");
////$cTree->add($id1,"年度盛會新增","years/add.php","mainframe");
//$cTree->add($id1,"年度盛會列表","photo2/list.php","mainframe");
//$cTree->add($id1,"年度盛會新增","photo2/add.php","mainframe");
//
//$cTree->add($rootid,"依德天地","#","");
//$id1=$cTree->getNowId();
//$cTree->add($id1,"最新消息列表","news/list.php","mainframe");
//$cTree->add($id1,"最新消息新增","news/add.php","mainframe");
//$cTree->add($id1,"廠內活動列表","act/list.php","mainframe");
//$cTree->add($id1,"廠內活動新增","act/add.php","mainframe");
//$cTree->add($id1,"車主交流道列表","act2/list.php","mainframe");
//$cTree->add($id1,"車主交流道新增","act2/add.php","mainframe");
//
//
//$cTree->add($rootid,"聯絡我們","#","");
//$id1=$cTree->getNowId();
//
//$cTree->add($id1,"客戶意見>意見回覆範例","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"列表","contact_reply/list.php","mainframe");
//$cTree->add($id2,"新增","contact_reply/add.php","mainframe");
//
//
//$cTree->add($id1,"客戶意見>產品/購車/業務銷售","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"未結案列表","contact1/list.php","mainframe");
//$cTree->add($id2,"已回覆待審核訊息列表","contact1/list2.php","mainframe");
//$cTree->add($id2,"已結案列表","contact1/list3.php","mainframe");
//
//
//$cTree->add($id1,"客戶意見>技術/維修服務/品質","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"未結案列表","contact2/list.php","mainframe");
//$cTree->add($id2,"已回覆待審核訊息列表","contact2/list2.php","mainframe");
//$cTree->add($id2,"已結案列表","contact2/list3.php","mainframe");
//
//
//$cTree->add($id1,"客戶意見>網站內容/諮詢/其它","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"未結案列表","contact3/list.php","mainframe");
//$cTree->add($id2,"已回覆待審核訊息列表","contact3/list2.php","mainframe");
//$cTree->add($id2,"已結案列表","contact3/list3.php","mainframe");
//
//
////$cTree->add($rootid,"員工園地","#","");
////$id1=$cTree->getNowId();
////$cTree->add($id1,"員工資料","#","");
//
//
//$cTree->add($rootid,"車主導航","#","");
//$id1=$cTree->getNowId();
//$cTree->add($id1,"FAQ","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"列表","qa/list.php","mainframe");
//$cTree->add($rootid,"員工園地","#","");
//$id1=$cTree->getNowId();
//$cTree->add($id1,"員工資料","#","");
//
//$id2=$cTree->getNowId();
//$cTree->add($id2,"員工資料列表","member2/list.php","mainframe");
//
//$cTree->add($id1,"最新公告","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"最新公告列表","news2/list.php","mainframe");
//$cTree->add($id2,"最新公告新增","news2/add.php","mainframe");
//
//$cTree->add($id1,"相簿","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"相簿列表","photo/list.php","mainframe");
//$cTree->add($id2,"相簿新增","photo/add.php","mainframe");
//$cTree->add($id1,"影片","#","");
//$id2=$cTree->getNowId();
//$cTree->add($id2,"影片列表","movie/list.php","mainframe");
//$cTree->add($id2,"影片新增","movie/add.php","mainframe");
//
//
//$cTree->add($rootid,"管理者","#","");
//$id1=$cTree->getNowId();
//$cTree->add($id1,"列表","manager/pr_manager_list.php","mainframe");
//$cTree->add($id1,"新增","manager/pr_manager_add.php","mainframe");
//
///***********************/
////$cTree->add($rootid,"管理者帳號更改","chpwd.php","_blank",'width=340,height=290,scrollbars=no');
//$cTree->add($rootid,"登出","logout.php","_top");
//$cTree->add($rootid,"網頁設計:達格互動媒體有限公司","http://www.targets.com.tw","_blank");
//$cTree->add($rootid,"請用IE6.0以上瀏覽器","#","");
//$fSideBar = $cTree->getShowTable();
//unset($cTree);

?>