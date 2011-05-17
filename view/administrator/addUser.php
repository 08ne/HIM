<HTML>
	<HEAD>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
	</HEAD>	
  <BODY>
    <FORM METHOD="POST" ACTION="administrator.php?id=<?php echo "{$_GET["id"]}";?>&handler=addUserHandler">
       用户名：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="name" SIZE="30">  <BR>
       性&nbsp;&nbsp;别：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="sex" SIZE="30">  <BR>
       生&nbsp;&nbsp;日：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="birthday" SIZE="30">  <BR>
       电话号码：<INPUT TYPE="TEXT" NAME="telephone" SIZE="30">  <BR>
       地&nbsp;&nbsp;址：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="address" SIZE="30">  <BR>
       电子邮件：<INPUT TYPE="TEXT" NAME="email" SIZE="30">  <BR>
       职&nbsp;&nbsp;位：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="identity" SIZE="30">  <BR>
       科&nbsp;&nbsp;目：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="profession" SIZE="30">  <BR>
       职&nbsp;&nbsp;称：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="jobtitle" SIZE="30">  <BR>
       描&nbsp;&nbsp;述：&nbsp;&nbsp;<INPUT TYPE="TEXT" NAME="description" SIZE="30">  <BR>
      <INPUT TYPE="SUBMIT" VALUE="提交">   
      <INPUT TYPE="RESET" VALUE="重新输入">                     
    </FORM>
  </BODY> 
</HTML>