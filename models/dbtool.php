<?php
	class dbtool
	{
		public function createConncetion()
		{
			$link=mysql_connect('localhost','root','') or die('无法创建数据连接<br><br>'.mysql_error());
			mysql_query('set names utf8');        //将传输的数据格式定为utf8，这一步很重要！
			return $link;
		}
		public function executeSql($db,$sql,$link)
		{
			$db_selected=mysql_select_db($db,$link) or die('打开数据库失败<br><br>'.mysql_error());
			$result=mysql_query($sql,$link);
			return $result;
		}
	};
?>