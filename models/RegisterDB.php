<?php
	include_once('dbtool.php');
	class RegisterDB
	{
		private $tool;          //数据库操作小工具dbtool的一个对象
		private $link;
		private $sql;
		public $result;
		
		public function __construct()
		{
			$this->tool=new dbtool();
			
		}
		
		public function __destruct()
		{
			
		}
		
		public function getRegister()
		{
			$this->link=$this->tool->createConncetion();
			$this->sql='select * from register';
			$this->result=$this->tool->executeSql('registerdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function addRegister($new)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="insert into register values('$new[0]','$new[1]','$new[2]')";
			$this->result=$this->tool->executeSql('registerdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function deleteRegister($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="delete from register where id = '$id' ";
			$this->result=$this->tool->executeSql('registertdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
	};
?>