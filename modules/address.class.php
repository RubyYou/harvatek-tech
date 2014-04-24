<?php
class Address extends Main{
    
    public $table1;
    
    function Address()
    {
        $this->table1 = "tbl_address";
		$this->db = new MyDb();
    }
    
    function getCity($default = '')
    {
        //$sql = "select city from ".$this->table1." group by city order by city asc";
		$sql = "select city from ".$this->table1." group by city order by convert(city using big5) asc";
        $this->db->execute($sql);
		$arr = array();
		if($default != '')
			$arr[] = $default;
		while($rs = $this->db->getNext())
		{
			$arr[] = $rs->city;
		}
		return $arr;
    }
	
	function getCityJson($default = '')
    {
        //$sql = "select city from ".$this->table1." group by city order by city asc";
		$sql = "select city from ".$this->table1." group by city order by convert(city using big5) asc";
        $this->db->execute($sql);
		$arr = array();
		if($default != '')
			$arr[] = $default;
		while($rs = $this->db->getNext())
		{
			$arr[] = $rs->city;
		}
		return json_encode($arr);
    }
	
	function getCityCustom($default = '')
	{
		if($default != '')
			$arr[] = $default;
		$arr[] = '台北市';
		$arr[] = '新北市';
		$arr[] = '基隆市';
		$arr[] = '桃園縣';
		$arr[] = '新竹市';
		$arr[] = '新竹縣';
		$arr[] = '苗栗縣';
		$arr[] = '台中市';
		$arr[] = '彰化縣';
		$arr[] = '南投縣';
		$arr[] = '雲林縣';
		$arr[] = '嘉義市';
		$arr[] = '嘉義縣';
		$arr[] = '台南市';
		$arr[] = '高雄市';
		$arr[] = '屏東縣';
		$arr[] = '花蓮縣';
		$arr[] = '宜蘭縣';
		$arr[] = '台東縣';
		$arr[] = '澎湖縣';
		$arr[] = '金門縣';
		$arr[] = '連江縣';
		//$arr[] = '南海島';
		//$arr[] = '釣魚台';
		return $arr;
	}
    
    function getArea($city)
    {
		$sql = "select * from (select area,substr(areacode,1,3) as code from ".$this->table1." where city = '".$city."') as a group by a.code order by code asc";
		$this->db->execute($sql);
		$arr = array();
		while($rs = $this->db->getNext())
		{
			$arr[$rs->code] = $rs->area;
		}
		return $arr;
    }
	
	function getAreaJson($city)
    {
		$sql = "select * from (select area,substr(areacode,1,3) as code from ".$this->table1." where city = '".$city."') as a group by a.code order by code asc";
		$this->db->execute($sql);
		$arr = array();
		while($rs = $this->db->getNext())
		{
			$arr[$rs->code] = $rs->area;
		}
		return json_encode($arr);
    }
	
	function close()
	{
		$this->db->closeConnection();
	}
}
?>