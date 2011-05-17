<?php
include("..\models\PatientDB.php");
include("..\models\PhamacyDB.php");
include("..\models\PreorderDB.php");
include("..\models\PrescriptionDB.php");
include("..\models\RegisterDB.php");
include("..\view\person.php");

class patientController extends person
{
	public $patientdb;
	public $phamacydb;
	public $preorderdb;
	public $prescriptiondb;
	public $registerdb;
	
	public function __construct($id)
	{
		$this->patientdb=new PatientDB();
		$this->phamacydb=new PhamacyDB();
		$this->preorderdb=new PreorderDB();
		$this->prescriptiondb=new PrescriptionDB();
		$this->registerdb=new RegisterDB();
		$record=$this->patientdb->getPatientRecord($id);
		mysql_data_seek($record, 0);
		$row=mysql_fetch_row($record);
		$this->id=$row[0];
		$this->name=$row[1];
		$this->sex=$row[2];
		$this->birthday=$row[3];
		$this->telephone=$row[4];
		$this->address=$row[5];
		$this->email=$row[6];
		$this->identity="patient";
	}
	
	public function checkPresc($prescId)
	{
		//返回某张药单的具体内容
		return $this->prescriptiondb->getPrescription($prescId);
	}
	
	public function checkHistory()
	{
		//返回就诊记录以及药单ID
		return $this->patientdb->getMedicalHistory($this->id);
	}
}
?>