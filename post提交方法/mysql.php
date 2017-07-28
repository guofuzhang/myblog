<meta charset="utf-8"><?php
header("content-type:text/html;charset=utf-8");
$db=mysql_connect("0acdbf874755618a.7host.cn","hongzhulei","18215579");
$dbname=mysql_selectdb("hongzhulei");
$a=mysql_query("set names utf8");
$res=mysql_query("select * from user ");
//print_r($res);
print_r($a);
echo "<pre>";
print_r(mysql_fetch_array($res));
//print_r(mysql_num_rows($res));
