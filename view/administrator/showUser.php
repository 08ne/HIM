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