<?php
$ch=curl_init();//格式化输出
$url="www.baidu.com";
curl_setopt($ch,CURLOPT_URL,$url);//设置请求的地址
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//请求成功后,返回字符串,exec后的结果
$str=curl_exec($ch);//执行请求
print_r($str) ;