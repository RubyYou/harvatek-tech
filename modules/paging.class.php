<?php
//*****************************
//Table auto list function
//2004-7-24
//Wilson Liang 
//*****************************
class paging{
	var $tablestyle="style='border-width:1px 0px 0px 1px;border-color:black;border-style:solid;font-size:12px;'";
	var $tdstyle="style='border-width:0px 1px 1px 0px;border-color:black;border-style:solid;font-family:arial'";
	var $linkstyle="style='text-decoration:none;font-family:arial;color:gray'";
	var $db;
	var $ary;
	var $sql;
	var $table;
	var $pagesize;
	var $nowpage;
	var $RecordCount;
	var $pageCount;
	var $linkary;
	var $pagemenu;
	var $MenuSize;
	function paging(&$db,$sql,$pagesize=10,$nowpage,$MenuSize=10){
		$this->db=&$db;
		$this->sql=$sql;
		$this->pagesize=$pagesize;
		$this->table=chr(13).chr(10);
		$this->MenuSize=$MenuSize;
		$pos=strpos($sql,'from');
		if($pos)
		{
			$tmpsql='select count(*)as Count '.substr($sql,$pos);
		}
		else
		{
			$pos = strpos($sql,'FROM');
			if($pos)
			{
				$tmpsql='select count(*)as Count '.substr($sql,$pos);
			}
			//$tmpsql=str_replace("select *","select count(*) as Count",$sql);
		}
		//echo $tmpsql;
		if($this->db->execute($tmpsql)){
			if($rs=$this->db->getNext()){
				$this->recordCount=$rs->{'Count'};
			}else{
				echo 'There are no records in this table';
				exit;
			}		
		}
		$pageCount=(int)($this->recordCount/$this->pagesize);
		$pageMod=($this->recordCount%$this->pagesize);
		$this->pageCount=$pageCount;
		if(($this->recordCount%$this->pagesize)!=0) $this->pageCount++;
		if($this->pageCount==0 && $this->recordCount!=0) $this->pageCount=1;
		if($nowpage>$this->pageCount) $nowpage=$this->pageCount;
		if($nowpage<1 || $nowpage=='') $nowpage=1;
		$this->nowpage=(int)($nowpage);
		$tmpsql=" LIMIT ".($pagesize*($this->nowpage-1))." , ".$pagesize." ";
		//echo $sql.$tmpsql;
		if($this->db->execute($sql.$tmpsql)) return true;
		else return false;
	}
	
	function getPageCount(){ 	
		return $this->pageCount;
	}
	
	function getRecordCount(){
		return $this->recordCount;
	}
	function getNowPage(){
		if($this->nowpage=='' || $this->nowpage==0) $this->nowpage=1;
		return $this->nowpage;
	}
	
	function getPagelink($narrow=false){
		//-----------paging------------//
		$pagemenu='';						
		if($this->nowpage%$this->MenuSize==0){
			$start=(($this->nowpage/$this->MenuSize)-1)*$this->MenuSize+1;
		}else{
			$start=((int)($this->nowpage/($this->MenuSize))*$this->MenuSize);
			$start++;
		}
		
		if($start<$this->MenuSize) $start=1;
		else{
			if($narrow) $pagemenu.='<a class="prevpage" href="'.$_SERVER['PHP_SELF'].'?nowpage='.($start-1).'&[=slink=]">&nbsp;<<&nbsp;</a>&nbsp;';		
		}
		
		$nextflag=true;
		for($ii=0;$ii<$this->MenuSize;$ii++){
			if($start==$this->getNowPage()){
				$pagemenu.='<span class="fastnowpage">&nbsp;['.$start.']&nbsp;</span>&nbsp;';				
			}else{
				$pagemenu.='<a class="fastpage" href="'.$_SERVER['PHP_SELF'].'?nowpage='.$start.'&[=slink=]">'.$start.'</a>&nbsp;';			
			}
			$start++;
			if($start>$this->pageCount){
				$nextflag=false;
				break;
			}
			//$start++;
		}
		if($narrow){
			if($nextflag) $pagemenu.='<a class="nextpage" href="'.$_SERVER['PHP_SELF'].'?nowpage='.($start).'&[=slink=]">&nbsp;>>&nbsp;</a>&nbsp;';		
		}
		//-----------paging------------//
		$this->pagemenu=$pagemenu;
		$this->pagemenu.=" / ";
		$menu="<select class=\"selectpage\" onChange=\"document.location='".$_SERVER['PHP_SELF']."?nowpage='+this.options[this.selectedIndex].value+'&[=slink=]'\">";
		for($ii=1;$ii<=$this->pageCount;$ii++){
			if($ii==$this->getNowPage()){
				$menu.="<option value='$ii' selected>第 ".$ii."頁</option>";
			}else{
				$menu.="<option value='$ii'>第 ".$ii."頁</option>";
			}
		}
		$menu.="</select >";
		return $this->pagemenu.$menu;
	}
	
	function getPagelink2($narrow=false,$left_pic='',$right_pic=''){
		$pagemenu='';						
		if($this->nowpage%$this->MenuSize==0){
			$start=(($this->nowpage/$this->MenuSize)-1)*$this->MenuSize+1;
		}else{
			$start=((int)($this->nowpage/($this->MenuSize))*$this->MenuSize);
			$start++;
		}
		if($this->getRecordCount()==0) return "";
		$pagemenu="";

		if($start<$this->MenuSize){
			$start=1;
		}else{
			/*if($narrow){
				if($narrow){
					if($left_pic==""){
						 $pagemenu.="<a href=\"".$_SERVER['PHP_SELF'].'?nowpage='.($start-1)."&[=slink=]';\" [=linkstyle=]> << </a>";
				 	}else{
						 $pagemenu.="<a href=\"".$_SERVER['PHP_SELF'].'?nowpage='.($start-1)."&[=slink=]';\" [=linkstyle=]><img src=\"".$left_pic."\" border=\"0\"></a>";					
					}
				}				 
			}*/
		}
		$pagemenu.="<table align=\"center\"><tr><td><table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"3\" bgcolor=\"#D8D8D8\">
					  <tr> 
						<td bgcolor=\"#FFFFFF\"><table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
							<tr> 
							  <td width=\"35\" bgcolor=\"#FFFFFF\"><a href=\"?nowpage=1\" class=\"icon_12-5\">FIRST</a></td>
							  <td width=\"13\"><img src=\"../images/news_img06.gif\" width=\"13\" height=\"13\"></td>
							  <td width=\"28\" bgcolor=\"#FFFFFF\"><a href=\"?nowpage=".($start-1)."\" class=\"icon_12-5\">PRE</a></td>
							</tr>
						  </table></td>
					  </tr>
					</table></td>";
					
		$nextflag=true;
		for($ii=0;$ii<$this->MenuSize;$ii++){
			if($start==$this->getNowPage()){
//				$pagemenu.="[".$start."]";
				$pagemenu.="<td><table width=\"75%\" border=\"0\" cellpadding=\"0\" cellspacing=\"3\" bgcolor=\"#FF6600\">
  <tr> 
	<td bgcolor=\"#FFFFFF\"><a href=\"#\" class=\"icon_12-5\"><font color=\"#000000\">".$start."</font></a></td>
  </tr>
</table></td>";
			}else{
//				$pagemenu.="<a href=\"".$_SERVER['PHP_SELF'].'?nowpage='.$start."&[=slink=]';\" [=linkstyle=]>".$start."</a>";
				$pagemenu.="<td><table width=\"75%\" border=\"0\" cellpadding=\"0\" cellspacing=\"3\" bgcolor=\"#D8D8D8\">
                          <tr>
                            <td bgcolor=\"#FFFFFF\"><a href=\"?nowpage=".$start."&[=slink=]\" class=\"icon_12-5\">2</a></td>
                          </tr>
                        </table></td>";
			}
			$start++;
			if($start>$this->pageCount){
				$nextflag=false;
				break;
			}
		}
/*		if($narrow){
			if($nextflag){
				if($right_pic==""){
					 $pagemenu.="<a href=\"".$_SERVER['PHP_SELF'].'?nowpage='.($start)."&[=slink=]';\" [=linkstyle=]> >> </a>";
				}else{
					 $pagemenu.="<a href=\"".$_SERVER['PHP_SELF'].'?nowpage='.($start)."&[=slink=]';\" [=linkstyle=]><img src=\"".$right_pic."\"  border=\"0\"></a>";
			 	}
			}			 
		}*/
		$pagemenu.="<td><table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"3\" bgcolor=\"#D8D8D8\">
                          <tr> 
                            <td bgcolor=\"#FFFFFF\"> <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
<tr> 
  <td width=\"35\" bgcolor=\"#FFFFFF\"><a href=\"?nowpage=".($start)."\" class=\"icon_12-5\">NEXT</a></td>
  <td width=\"13\"><img src=\"../images/news_img07.gif\" width=\"13\" height=\"13\"></td>
  <td width=\"28\" bgcolor=\"#FFFFFF\"><a href=\"?nowpage=10000\" class=\"icon_12-5\">LAST</a></td>
</tr>
</table></td></tr></table></td></tr></table>";
		
		$this->pagemenu=$pagemenu;
		return $this->pagemenu;
	}

}		
?>