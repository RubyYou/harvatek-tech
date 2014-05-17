<?php
class Product extends Main{
    
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
		$this->table1 = "tbl_product";
		$this->db = new MyDb();
		$this->uploadPath = BGM_UPLOADPATH.'products/';
		$this->webRoot = WEB_ROOT.'uploads/products/';
		$this->quantityOption = array(
			'1'		=>		'0~10k'
			,'2'	=>		'10k~100k'
			,'3'	=>		'100k~1kk'
			,'4'	=>		'1kk and above'
		);
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
	
	
	function addProduct($post,$files)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		$ext = '';
        $file = $files['file']['name'];
        $tmpfile = $files['file']["tmp_name"];
		$ext = ".".pathinfo($file, PATHINFO_EXTENSION);
		$ext = ($ext == '.')?'':$ext;
		
		
		$quantity_visible_ = ($quantity_visible == 1)?1:0;
		$categories = explode('-',$categories_id);
		$table_id = $categories[0];
		$products_id = $categories[1];
		
		$keyAry['table_id'] = $table_id;
		$keyAry['products_id'] = $products_id;
		
		
		$order_num=$this->get_order($keyAry,false,$this->table1);
		$sql = "insert into 
				".$this->table1."
				values
				(
					null
					,'".$table_id."'
					,'".$products_id."'
					,'".$name."'
					,'".$ext."'
					,'".$quantity_visible_."'
					,'".$color_options."'
					,'".$cri_options."'
					,'".$content."'
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
	
	function getCategoriesSelect($selected = '',$onchange = false)
	{
		$cProduct1 = new Product1();
		$cProduct2 = new Product2();
		$cProduct3 = new Product3();
		$cProduct4 = new Product4();
		
		if($onchange)
			$onchange_ = 'onchange="selectChange();"';
		$categoriesSelect = '<select name="categories_id" '.$onchange_.'>';
		
		$p1_arr = $cProduct1->getAll();
		foreach($p1_arr as $key1 => $val1)
		{
			$p2_arr = $cProduct2->getAll($p1_arr[$key1]['product1_id']);
			if(count($p2_arr) > 0)
			{
				$categoriesSelect .= '<optgroup label="'.$p1_arr[$key1]['name'].'">';
				foreach($p2_arr as $key2 => $val2)
				{
					$p3_arr = $cProduct3->getAll($p2_arr[$key2]['product2_id']);
					if(count($p3_arr) > 0)
					{
						$categoriesSelect .= '<optgroup label="&nbsp;&nbsp;'.$p2_arr[$key2]['name'].'">';
						foreach($p3_arr as $key3 => $val3)
						{
							$p4_arr = $cProduct4->getAll($p3_arr[$key3]['product3_id']);
							if(count($p4_arr) > 0)
							{
								$categoriesSelect .= '<optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;'.$p3_arr[$key3]['name'].'">';
								foreach($p4_arr as $key4 => $val4)
								{
									$selected_ = '';
									if($selected == '4-'.$p4_arr[$key4]['product4_id']) $selected_ = 'selected="selected"';
									$categoriesSelect .= '<option value="4-'.$p4_arr[$key4]['product4_id'].'" '.$selected_.'>&nbsp;&nbsp;&nbsp;&nbsp;'.$p4_arr[$key4]['name'].'</option>';
								}
								$categoriesSelect .= '</optgroup>';
							}
							else
							{
								$selected_ = '';
								if($selected == '3-'.$p3_arr[$key3]['product3_id']) $selected_ = 'selected="selected"';
								$categoriesSelect .= '<option value="3-'.$p3_arr[$key3]['product3_id'].'" '.$selected_.'>&nbsp;&nbsp;&nbsp;&nbsp;'.$p3_arr[$key3]['name'].'</option>';
							}
						}
						$categoriesSelect .= '</optgroup>';
					}
					else
					{
						$selected_ = '';
						if($selected == '2-'.$p2_arr[$key2]['product2_id']) $selected_ = 'selected="selected"';
						$categoriesSelect .= '<option value="2-'.$p2_arr[$key2]['product2_id'].'" '.$selected_.'>'.$p2_arr[$key2]['name'].'</option>';
					}
					
				}
				$categoriesSelect .= '</optgroup>';
			}
			else
			{
				$selected_ = '';
				if($selected == '1-'.$p1_arr[$key1]['product1_id']) $selected_ = 'selected="selected"';
				$categoriesSelect .= '<option value="1-'.$p1_arr[$key1]['product1_id'].'" '.$selected_.'>'.$p1_arr[$key1]['name'].'</option>';
			}
			
			
		}
		
		//echo '<pre>'.var_dump($p1_arr).'</pre>';
		//echo '<pre>'.var_dump($p2_arr).'</pre>';
		//echo '<pre>'.var_dump($p3_arr).'</pre>';
		//echo '<pre>'.var_dump($p4_arr).'</pre>';
		
		$categoriesSelect .= '</select>';
		return $categoriesSelect;
		
	}
	
	function getQuantitySelect($default ='' ,$selected = '')
	{
		
		$select = '<select name="quantity">';
		$option = '';
		
		if($default != '')
			$option .= '<option value="">'.$default.'</option>';
		foreach($this->quantityOption as $key => $val)
		{
			$selected_ = '';
			if($selected == $key) $selected_ = 'selected="selected"';
			$option .= '<option value="'.$key.'" '.$selected_.'>'.$val.'</option>';
		}
		$select .= $option.'</select>';
		return $select;
		
	}
	
	function getTop1CategoriesID()
	{
		$categories_id = '';
		$sql = "select
				p1.name as p1_name
				,p1.link as p1_link
				,p1.product1_id
				,p2.name as p2_name
				,p2.link as p2_link
				,p2.product2_id
				,p3.name as p3_name
				,p3.link as p3_link
				,p3.product3_id
				,p4.name as p4_name
				,p4.link as p4_link
				,p4.product4_id
				from tbl_product2 as p2
				right join tbl_product1 as p1
				on p1.product1_id = p2.product1_id
				left join tbl_product3 as p3
				on p3.product2_id = p2.product2_id
				left join tbl_product4 as p4
				on p4.product3_id = p3.product3_id
				order by 
				p1.order_num asc 
				, p2.order_num asc
				, p3.order_num asc
				, p4.order_num asc
				limit 0,1";
				
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		if($rs->product4_id == null)
		{
			if($rs->product3_id == null)
			{
				if($rs->product2_id == null)
				{
					if($rs->product1_id == null)
					{
						$categories_id = '';
					}
					else
						$categories_id = '1-'.$rs->product4_id;
				}
				else
					$categories_id = '2-'.$rs->product4_id;
			}
			else
				$categories_id = '3-'.$rs->product4_id;
		}
		else
			$categories_id = '4-'.$rs->product4_id;
		return $categories_id;
		
	}
    
	function getPage($nowpage,$categories_id)
    {
		$nowpage = intval($nowpage);
		$pagesize = 10;
		$MenuSize = 10;
		if($nowpage==0 || $nowpage=='') $nowpage=1;
		
		$categories = explode('-',$categories_id);
		$table_id = $categories[0];
		$products_id = $categories[1];
		
		$sql = "select *
				from ".$this->table1."
				where
				table_id = '".$table_id."'
				and
				products_id = '".$products_id."'
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
				'product_id' 		=> 		$rs->product_id
				,'table_id' 		=> 		$rs->table_id
				,'products_id'		=>		$rs->products_id
				,'name' 			=> 		$rs->name
				,'ext' 				=> 		$rs->ext
				,'quantity_visible'	=>		$rs->quantity_visible
				,'color_options'	=>		$rs->color_options
				,'cri_options'		=>		$rs->cri_options
				,'content'			=>		$rs->content
				,'order_num' 		=> 		$rs->order_num
			);
		}
		return $ary;
		
	}
	
	function getProduct($product_id)
	{
		$product_id = intval($product_id);
		$sql = "select * 
				from ".$this->table1."
				where 
				product_id='".$product_id."'";
		$this->db->execute($sql);
		$rs = $this->db->getNext();
		
			$ary = array(
				'product_id' 		=> 		$rs->product_id
				,'table_id' 		=> 		$rs->table_id
				,'products_id'		=>		$rs->products_id
				,'name' 			=> 		$rs->name
				,'ext' 				=> 		$rs->ext
				,'quantity_visible'	=>		$rs->quantity_visible
				,'color_options'	=>		$rs->color_options
				,'cri_options'		=>		$rs->cri_options
				,'content'			=>		$rs->content
				,'order_num' 		=> 		$rs->order_num
			);
		
		return $ary;
		
	}
	
	function updateProduct($post,$files)
	{
		array_walk($post,"quoteSlashes");
		extract($post);
		
		
		$ext = '';
        $file = $files['file']['name'];
        $tmpfile = $files['file']["tmp_name"];
		$ext = ".".pathinfo($file, PATHINFO_EXTENSION);
		$ext = ($ext == '.')?'':$ext;
		
		$quantity_visible_ = ($quantity_visible == 1)?1:0;
		$categories = explode('-',$categories_id);
		$table_id = $categories[0];
		$products_id = $categories[1];
		
		$arr = $this->getProduct($product_id);
		$o_products_id = $arr['products_id'];
		$o_table_id = $arr['table_id'];
		$sql = '';
		if($o_products_id == $products_id && $o_table_id == $table_id)
		{
			$sql = "update ".$this->table1."
				set
				table_id = '".$table_id."'
				,products_id = '".$products_id."'
				,name='".$name."'
				,quantity_visible = '".$quantity_visible_."'
				,color_options = '".$color_options."'
				,cri_options = '".$cri_options."'
				,content = '".$content."'";
			
			if($ext != '')
				$sql .= " ,ext = '".$ext."'";
				
			$sql .= " where 
					product_id='".$product_id."'";
				
		}
		else
		{
			$keyAry['products_id'] = $o_products_id;
			$keyAry['table_id'] = $o_table_id;
			$this->reset_order("product_id",$product_id,$keyAry,$this->table1);
			$keyAry['products_id'] = $products_id;
			$keyAry['table_id'] = $table_id;
			$order_num=$this->get_order($keyAry,false,$this->table1);
			
			$sql = "update ".$this->table1."
				set
				table_id = '".$table_id."'
				,products_id = '".$products_id."'
				,name='".$name."'
				,quantity_visible = '".$quantity_visible_."'
				,color_options = '".$color_options_."'
				,content = '".$content."'
				,order_num = '".$order_num."'";
			if($ext != '')
				$sql .= " ,ext = '".$ext."'";
				
			$sql .= " where 
					product_id='".$product_id."'";
		}
		
		$this->db->execute($sql);
		if($ext != '')
		{
			$path = $this->uploadPath.$product_id.$ext;
			if(!move_uploaded_file($tmpfile,$path))
			{
				@unlink($tmpfile);
				die(STR_UPLOADFAIL);
			}
		}
	}

	function deleteProduct($product_id)
	{
		if($_GET['del']!='true')
		{
			delForm($_GET,STR_DELETECONFIRM,$_POST);
			exit;
		}
		
		$arr = $this->getProduct($product_id);
		$products_id = $arr['products_id'];
		$table_id = $arr['table_id'];
		$keyAry['products_id'] = $products_id;
		$keyAry['table_id'] = $table_id;
		$this->reset_order("product_id",$product_id,$keyAry,$this->table1);
		$sql = "delete from
				".$this->table1."
				where
				product_id='".$product_id."'";
		$this->db->execute($sql);
		@unlink($this->uploadPath.$product_id.$arr['ext']);

	}

	
	
	
	function getCategoriesMenu($selected = '')
	{
		$cProduct1 = new Product1();
		$cProduct2 = new Product2();
		$cProduct3 = new Product3();
		$cProduct4 = new Product4();

		$categoriesSelect = '
		<ul class="accordion">
		';
		
		$p1_arr = $cProduct1->getAll();
		foreach($p1_arr as $key1 => $val1)
		{
			$p2_arr = $cProduct2->getAll($p1_arr[$key1]['product1_id']);
			if(count($p2_arr) > 0)
			{
				$href1 = str_replace(' ','-',$p1_arr[$key1]['name']);
				$categoriesSelect .= '
				<li>
					<a class="toggle"><img src="'.$cProduct1->webRoot.$p1_arr[$key1]["product1_id"].$p1_arr[$key1]["ext"].'" alt=""/>'.$p1_arr[$key1]['name'].'</a>
				';
				
				
				$categoriesSelect .= '
						<ul>
				';
				foreach($p2_arr as $key2 => $val2)
				{
					$p3_arr = $cProduct3->getAll($p2_arr[$key2]['product2_id']);
					$href2 = str_replace(' ','-',$p2_arr[$key2]['name']);
					if(count($p3_arr) > 0)
					{
						$categoriesSelect .= '
						
							<li>
								<a href="#'.$href1.'-'.$href2.'" class="toggle">'.$p2_arr[$key2]['name'].'</a>
							
											';
											
						$categoriesSelect .= '
								<ul>
						';
						foreach($p3_arr as $key3 => $val3)
						{
							$p4_arr = $cProduct4->getAll($p3_arr[$key3]['product3_id']);
							if(count($p4_arr) > 0)
							{
								$categoriesSelect .= '
									<li>
										<a href="#'.$href1.'-'.$href2.'-'.str_replace(' ','-',$p3_arr[$key3]['name']).'" class="toggle">'.$p3_arr[$key3]['name'].'</a>
									
								';
								
								
								$tmpCategories = '';
								foreach($p4_arr as $key4 => $val4)
								{
									$selected_ = '';
									$tmpCategories .= '
											<li>
												<a href="#">'.$p4_arr[$key4]['name'].'</a>
											</li>
									';
								}
								$categoriesSelect .= '
										<ul>
										'.$tmpCategories.'
										</ul>
									</li>';
								
							}
							else
							{
								$selected_ = '';
								$categoriesSelect .= '
									<li>
										<a href="#">'.$p3_arr[$key3]['name'].'</a>
									</li>
								';
							}
							
							
						}
						
						$categoriesSelect .= '
								</ul>
						';
						
						
						$categoriesSelect .= '
							</li>
						';
					}
					else
					{
						$selected_ = '';
						$categoriesSelect .= '
								<li>
									<a href="#">'.$p2_arr[$key2]['name'].'</a>
								</li>
								';
					}
					
				}
				
				
				
				
				
				$categoriesSelect .= '
						</ul>
				</li>
				';
			}
			else
			{
				$selected_ = '';
				$categoriesSelect .= '
				<li>
					<a href="#"><img src="'.$cProduct1->webRoot.$p1_arr[$key1]["product1_id"].$p1_arr[$key1]["ext"].'" alt=""/>'.$p1_arr[$key1]['name'].'</a>
				</li>
				';
			}
			
		}
				
		$categoriesSelect .= '
		</ul>
		';
		return $categoriesSelect;
		
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