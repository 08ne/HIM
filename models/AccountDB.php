<?php
	include_once('dbtool.php');
	class AccountDB
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
		
		public function getAllAccount()
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select * from account";
			$this->result=$this->tool->executeSql('accountdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function getAccount($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select * from account where id='$id'";
			$this->result=$this->tool->executeSql('accountdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function addAccount($new)
		{
			if($new[0]==-1)$new[0]=$this->getmaxid()+1; //ID号自动加1
			if($new[11]==-1)$new[11]="88888888";         //初始密码为88888888
			$this->link=$this->tool->createConncetion();
			$this->sql="insert into account values('$new[0]','$new[1]','$new[2]','$new[3]','$new[4]',
			'$new[5]','$new[6]','$new[7]','$new[8]','$new[9]','$new[10]','$new[11]')";
			$this->result=$this->tool->executeSql('accountdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function deleteAccount($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="delete from account where id = '$id' ";
			$this->result=$this->tool->executeSql('accountdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function checkpwd($name,$pwd)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select name,pwd,identity,id from account where name = '$name' ";
			$this->result=$this->tool->executeSql('accountdb',$this->sql,$this->link);
			mysql_close($this->link);
			//不存在此用户名，直接返回错误
			if(mysql_num_rows($this->result)==0) return "false";
			// 定位到第一条记录
            mysql_data_seek($this->result, 0);
            // 循环取出记录
            while ($row=mysql_fetch_row($this->result))
			{
				if($row[1]==$pwd) return $row;
			} 
			//密码不对，返回错误
			return "false";
		}
		
		public function getmaxid()
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select max(id) from account";
			$this->result=$this->tool->executeSql('accountdb',$this->sql,$this->link);
			mysql_close($this->link);
			mysql_data_seek($this->result, 0);
			$row=mysql_fetch_row($this->result);
			return $row[0];
		}
	};
?>