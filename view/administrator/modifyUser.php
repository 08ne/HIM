<HTML>
	<HEAD>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
	</HEAD>	
  <BODY>
 <?php
 //打印用户列表
include("..\..\controller\adminController.php");
$adminCon=new adminController();
$result=$adminCon->getAllAccount();
    // 获取查询结果
    $row=mysql_fetch_row($result);
    
    echo '<font face="verdana">';
    echo '<table border="2" cellpadding="2" cellspacing="0">';

    // 显示字段名称
    echo "\n<tr>\n";
    for ($i=0; $i<mysql_num_fields($result); $i++)
    {
      echo "<td><b><font size='1'>".
      mysql_field_name($result, $i);
      echo "</font></b></td>\n";
    }
    echo "</tr>\n";
    // 定位到第一条记录
    mysql_data_seek($result, 0);
    // 循环取出记录
    while ($row=mysql_fetch_row($result))
    {
      echo "<tr>\n";
      for ($i=0; $i<mysql_num_fields($result); $i++ )
      {
        echo "<td><font size='1'>";
        echo "$row[$i]";
        echo '</font></td>';
      }
      echo "</tr>\n";
    }
    
    echo "</table>\n";
    echo "</font><br><br>";
?>
    <FORM METHOD="POST" ACTION="administrator.php?id=<?php echo "{$_GET["id"]}";?>&handler=modifyUserHandler">
       请输入要修改用户的ID：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="userid" SIZE="30">  <BR>
      <INPUT TYPE="SUBMIT" VALUE="提交">   
      <INPUT TYPE="RESET" VALUE="重新输入"> 
    </FORM>
      <?php if(isset($_GET["userid"])) { ?>
      <?php
	    $record = $adminCon->getAccount($_GET["userid"]);
		mysql_data_seek($record, 0);
		$row=mysql_fetch_row($record);
		echo $_GET["userid"];
	  ?>
      <FORM METHOD="POST" ACTION="administrator.php?id=<?php echo "{$_GET["id"]}";?>&handler=modifyUserHandler&modified">
       用户ID：&nbsp;&nbsp;<INPUT NAME="userid" TYPE="TEXT" value="<?php echo $row[0];?>" SIZE="30" readonly="readonly">  <BR>
       用户名：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[1];?>" NAME="name" SIZE="30">  <BR>
       性&nbsp;&nbsp;别：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[2];?>" NAME="sex" SIZE="30">  <BR>
       生&nbsp;&nbsp;日：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[3];?>" NAME="birthday" SIZE="30">  <BR>
       电话号码：<INPUT TYPE="TEXT" value="<?php echo $row[4];?>" NAME="telephone" SIZE="30">  <BR>
       地&nbsp;&nbsp;址：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[5];?>" NAME="address" SIZE="30">  <BR>
       电子邮件：<INPUT TYPE="TEXT" value="<?php echo $row[6];?>" NAME="email" SIZE="30">  <BR>
       职&nbsp;&nbsp;位：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[7];?>" NAME="identity" SIZE="30">  <BR>
       科&nbsp;&nbsp;目：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[8];?>" NAME="profession" SIZE="30">  <BR>
       职&nbsp;&nbsp;称：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[9];?>" NAME="jobtitle" SIZE="30">  <BR>
       描&nbsp;&nbsp;述：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[10];?>" NAME="description" SIZE="30">  <BR>
       密&nbsp;&nbsp;码：&nbsp;&nbsp;<INPUT TYPE="TEXT" value="<?php echo $row[11];?>" NAME="password" SIZE="30">  <BR>
      <INPUT TYPE="SUBMIT" VALUE="提交">   
      <INPUT TYPE="RESET" VALUE="重新输入">
      </FORM>  
      <?php } ?>                    
</BODY> 
</HTML>