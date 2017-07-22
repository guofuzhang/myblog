<?php
//初始化一个curl会话，返回一个资源类型
$ch = curl_init();
//设置curl的传输选项
$url = "http://www.baidu.com";
curl_setopt($ch,CURLOPT_URL,$url);//设置请求的地址
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//设置请求成功后，直接返回一个字符串,也就是curl_exec()执行后返回一个字符串。
//执行一个curl会话
$str = curl_exec($ch);//执行请求
//关闭一个curl会话
curl_close($ch);
echo $str;
?>