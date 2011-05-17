<?php
	include_once('dbtool.php');
	class PatientDB
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
		
		public function getPatientRecord($id)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select * from patient where id='$id'";
			$this->result=$this->tool->executeSql('patientdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function addPatientRecord($new)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="insert into patient values('$new[0]','$new[1]','$new[2]','$new[3]','$new[4]',
				'$new[5]','$new[6]')";
			$this->result=$this->tool->executeSql('patientdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function modifyPatientRecord($modify)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select * from patient where id='$modify[0]'";
			$this->result=$this->tool->executeSql('patientdb',$this->sql,$this->link);
			if(mysql_num_rows($this->result)==0)
			{
				mysql_close($this->link);
				$this->addPatientRecord($modify);
			}
			else
			{
				$this->sql="update patient set name='$modify[1]',sex='$modify[2]',birthday='$modify[3]',
					telephone='$modify[4]',address='$modify[5]',email='$modify[6]' where id='$modify[0]'";
				$this->result=$this->tool->executeSql('patientdb',$this->sql,$this->link);
				mysql_close($this->link);
				return $this->result;
			}
		}
		
		public function getMedicalHistory($patientID)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="select * from history where patientID='$patientID'";
			$this->result=$this->tool->executeSql('patientdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
		
		public function addMedicalHistory($new)
		{
			$this->link=$this->tool->createConncetion();
			$this->sql="insert into history values('$new[0]','$new[1]','$new[2]','$new[3]','$new[4]')";
			$this->result=$this->tool->executeSql('patientdb',$this->sql,$this->link);
			mysql_close($this->link);
			return $this->result;
		}
	};
?>







