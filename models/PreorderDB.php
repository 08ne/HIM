<?php
	include_once('dbtool.php');
	class PreorderDB
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
		
		public function getPreorder()
		{
			$this->link=$this->tool->createConncetion();
			$this->sql='select * from preorder';
			$this->result=$this->tool->executeSql('preorderdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function addPreorder($new)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="insert into preorder values('$new[0]','$new[1]','$new[2]','$new[3]')";
			$this->result=$this->tool->executeSql('preorderdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function deletePreorder($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="delete from preorder where id = '$id' ";
			$this->result=$this->tool->executeSql('preorderdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
	};
?>