<?php
	include_once('dbtool.php');
	class PrescriptionDB
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
		
		public function getPrescription($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select * from prescription where prescriptionID='$id'";
			$this->result=$this->tool->executeSql('prescriptiondb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function addPrescription($new)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="insert into prescription values('$new[0]','$new[1]','$new[2]','$new[3]',$new[4])";
			$this->result=$this->tool->executeSql('prescriptiondb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function changePaidStatus($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="update prescription set paid='1' where prescriptionID='$id'";
			$this->result=$this->tool->executeSql('prescriptiondb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function changeEffectiveStatus($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="update prescription set effective='0' where prescriptionID='$id'";
			$this->result=$this->tool->executeSql('prescriptiondb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
	};
?>








