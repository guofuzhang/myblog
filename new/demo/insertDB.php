<?php
error_reporting(0);//屏蔽错误输出
$conn  = mysql_connect('localhost','root','root');
mysql_query('use php');
mysql_query('set names utf8');
//接收post提交的数据
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
//入库操作
$sql = "insert into it_user values(null,'$name','$age','$email')";
mysql_query($sql);
?>