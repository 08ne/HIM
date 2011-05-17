<HTML>
	<HEAD>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
	</HEAD>	
  <BODY>
    <FORM METHOD="POST" ACTION="redirect.php">
    <?php
	if(isset($_GET["Error"])) echo "<font color='#FF0000'>用户名或密码错误，请重新输入！</font><br>";
	?>
       用户名：<INPUT TYPE="TEXT" NAME="name" SIZE="10">  <BR>
       密&nbsp;&nbsp码：<INPUT TYPE="PASSWORD" NAME="pwd" SIZE="10"><BR>
      <INPUT TYPE="SUBMIT" VALUE="提交">   
      <INPUT TYPE="RESET" VALUE="重新输入">                     
    </FORM>
  </BODY> 
</HTML>