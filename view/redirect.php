<?php
include("..\controller\adminController.php");
$adminCon=new adminController();
$name = $_POST["name"];
$pwd = $_POST["pwd"];
$result=$adminCon->login($name,$pwd);
//将网页重新定向到各自工作页面
if($result=="false") 
header("location:login.php?Error");
else 
header("location:{$result[2]}.php?id={$result[3]}");
?>