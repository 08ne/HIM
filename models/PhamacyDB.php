<?php
	include_once('dbtool.php');
	class PhamacyDB
	{
		private $tool;          //数据库操作小工具dbtool的一个对象
		private $link;
		private $sql;
		private $result;
		
		public function __construct()
		{
			$this->tool=new dbtool();
			
		}
		
		public function __destruct()
		{
			
		}
		
		public function getStock()
		{
			$this->link=$this->tool->createConncetion();
			$this->sql='select * from phamacy';
			$this->result=$this->tool->executeSql('phamacydb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function addStock($new)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="insert into phamacy values('$new[0]','$new[1]','$new[2]','$new[3]')";
			$this->result=$this->tool->executeSql('phamacydb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function modifyStock($modify)     //$modify是一个包含要修改的药品的id和药品数量（若减少药品则为负）的数组
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select sum from phamacy where id='$modify[0]'";
			$this->result=$this->tool->executeSql('phamacydb',$this->sql,$this->link);
			$tmp=mysql_result($this->result,0,0);
			if($tmp + $modify[1] > 0)
			{
				$tmp+=$modify[1];
				$this->sql="update phamacy set sum='$tmp' where id='$modify[0]'";
			}
			else 
			{
				$this->sql="update phamacy set sum=0 where id='$modify[0]'";
			}
			$this->result=$this->tool->executeSql('phamacydb',$this->sql,$this->link);
			mysql_close($this->link);
		}
	};
?>