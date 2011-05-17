<?php
$dirnow=dirname(__FILE__);
include("{$dirnow}\..\models\AccountDB.php");
include("{$dirnow}\..\models\PatientDB.php");
include("{$dirnow}\..\models\PhamacyDB.php");
include("{$dirnow}\..\models\PreorderDB.php");
include("{$dirnow}\..\models\PrescriptionDB.php");
include("{$dirnow}\..\models\RegisterDB.php");

class adminController
{
	public $accountdb;
	public $patientdb;
	public $phamacydb;
	public $preorderdb;
	public $prescriptiondb;
	public $registerdb;
	
	public function __construct()
	{
		$this->accountdb=new AccountDB();
		$this->patientdb=new PatientDB();
		$this->phamacydb=new PhamacyDB();
		$this->preorderdb=new PreorderDB();
		$this->prescriptiondb=new PrescriptionDB();
		$this->registerdb=new RegisterDB;
	}
	
	public function login($user,$pwd)
	{
		//如果用户名密码正确，返回用户的身份和id，否则返回false
		return $this->accountdb->checkpwd($user,$pwd);
	}
	
	public function getAllAccount()
	{
		return $this->accountdb->getAllAccount();
	}
	
	public function getAccount($id)
	{
		return $this->accountdb->getAccount($id);
	}
	
	public function addAccount($new)
	{
		$this->accountdb->addAccount($new);	
	}	
	
	public function deleteAccount($id)
	{
		$this->accountdb->deleteAccount($id);	
	}

	public function modifyAccount($modified)
	{
		$this->deleteAccount($modified[0]);
		$this->addAccount($modified);	
	}		
};
?>