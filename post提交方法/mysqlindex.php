<?php



error_reporting("0");
mysql_connect("127.0.0.1","root","root");
mysql_selectdb("wechat");
mysql_query("set names utf8");

//一维数组
//$name=$_POST['name'];
//echo "<hr>";
//$age=$_POST['age'];
//$email=$_POST['email'];
//$sql="INSERT  into user_table values(NULL ,'$name','$age','$email')";
//echo $sql;
//$res=mysql_query($sql);
//echo $res;
//print_r($res);

//二维数组
foreach ($_POST as $v){
    $name=$v['name'];
    $age=$v['age'];
    $email=$v['email'];
    $sql="INSERT  into user_table values(NULL ,'$name','$age','$email')";
    mysql_query($sql);
}