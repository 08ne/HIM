<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <script src="utility.js" type="text/javascript"></script>    
    <script type="text/javascript">
      var XHR = null; 
      
	  function showUser()
      {
		XHR = createXMLHttpRequest();
        XHR.open("GET", "administrator/showuser.php?id=<?php echo "{$_GET["id"]}";?>", true);
        XHR.onreadystatechange = handleStateChange;          
        XHR.send(null);
      }
	   
      function addUser()
      {
		XHR = createXMLHttpRequest();
        XHR.open("GET", "administrator/adduser.php?id=<?php echo "{$_GET["id"]}";?>", true);
        XHR.onreadystatechange = handleStateChange;          
        XHR.send(null);
      }
      
	  function deleteUser()
      {
        XHR = createXMLHttpRequest();
        XHR.open("GET", "administrator/deleteuser.php?id=<?php echo "{$_GET["id"]}";?>", true);
        XHR.onreadystatechange = handleStateChange;          
        XHR.send(null);
      }
	  
	  function modifyUser()
      {
        XHR = createXMLHttpRequest();
        XHR.open("GET", "administrator/modifyUser.php?id=<?php echo "{$_GET["id"]}";?>", true);
        XHR.onreadystatechange = handleStateChange;          
        XHR.send(null);
      }
	  
      function handleStateChange()
      {
        if (XHR.readyState == 4)
        {
          if (XHR.status == 200)
            document.getElementById("show").innerHTML = XHR.responseText;
          else
            window.alert("文件打开错误!");
        }
      }
    </script>
</HEAD>

<?php
include("person.php");
include("..\controller\adminController.php");
class administrator extends person
{
	private $adminCon;
	protected $id;
	public function __construct()
	{
		$this->adminCon=new adminController();
		$this->id=$_GET["id"];
		$record = $this->adminCon->getAccount($this->id);
		mysql_data_seek($record, 0);
		$row=mysql_fetch_row($record);
		$this->id=$row[0];
		$this->name=$row[1];
		$this->sex=$row[2];
		$this->birthday=$row[3];
		$this->telephone=$row[4];
		$this->address=$row[5];
		$this->email=$row[6];
		$this->identity=$row[7];
	}
	public function addUserHandler()
	{
		$new[0]=-1;//设置为-1的意思是载入数据库是按数据库的默认值，即为最大ID+1
		$new[1]=$_POST["name"];
		$new[2]=$_POST["sex"];
		$new[3]=$_POST["birthday"];
		$new[4]=$_POST["telephone"];
		$new[5]=$_POST["address"];
		$new[6]=$_POST["email"];
		$new[7]=$_POST["identity"];
		$new[8]=$_POST["profession"];
		$new[9]=$_POST["jobtitle"];
		$new[10]=$_POST["description"];
		$new[11]=-1; //设置为-1的意思是载入数据库是按数据库的默认值，即为88888888
		$this->adminCon->addAccount($new);
	}
	
	public function deleteUserHandler()
	{
		$userid=$_POST["userid"];
		$this->adminCon->deleteAccount($userid);
	}
	
	public function modifyUserHandler()
	{
		$new[0]=$_POST["userid"];
		$new[1]=$_POST["name"];
		$new[2]=$_POST["sex"];
		$new[3]=$_POST["birthday"];
		$new[4]=$_POST["telephone"];
		$new[5]=$_POST["address"];
		$new[6]=$_POST["email"];
		$new[7]=$_POST["identity"];
		$new[8]=$_POST["profession"];
		$new[9]=$_POST["jobtitle"];
		$new[10]=$_POST["description"];
		$new[11]=$_POST["password"];
		$this->adminCon->modifyAccount($new);
	}
};
$admin=new administrator();
?>

<?php if((isset($_GET["handler"]))&&($_GET["handler"]=="modifyUserHandler")&&(!isset($_GET["modified"]))) {?>
        <script type="text/javascript">
        XHR = createXMLHttpRequest();
        XHR.open("GET", "administrator/modifyUser.php?id=<?php echo "{$_GET["id"]}&userid={$_POST["userid"]}";?>", true);
        XHR.onreadystatechange = handleStateChange;          
        XHR.send(null);
		</script>
<?php } 
else if(isset($_GET["handler"]))
{
	$handler=$_GET["handler"];
	$admin->$handler();
}
?>


<BODY>
  <div align="center">
    <table width="950" border="0">
      <tr>
        <td colspan="2"><div align="center">医院信息管理系统</div></td>
      </tr>
      <tr>
        <td width="173" height="23"><div align="left">
          <input id="button4" type="BUTTON" value="显示用户列表" onClick="showUser()" />
        </div></td>
        <td width="767" rowspan="5" id="show">&nbsp;</td>
      </tr>
      <tr>
        <td height="21"><input id="button1" type="BUTTON" value="添加新用户" onClick="addUser()" /></td>
      </tr>
      <tr>
        <td height="23"><input id="button2" type="BUTTON" value="删除用户" onClick="deleteUser()" /></td>
      </tr>
      <tr>
        <td height="21"><input id="button3" type="BUTTON" value="修改用户信息" onClick="modifyUser()" /></td>
      </tr>
      <tr>
        <td height="92">&nbsp;</td>
      </tr>
    </table>
</div>
  <p>&nbsp;</p>
</BODY>
</HTML>