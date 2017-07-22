<?php
$key = "170c1efcecae888e2c20348750584714";
$keyword = "北京天气";
$url = "http://www.tuling123.com/openapi/api?key={$key}&info={$keyword}";
//请求该url,可以使用file_get_contents()来get请求。
$info =  file_get_contents($url);//返回的数据是json格式，
//可以使用函数，把一个 json格式转换成对象
$res = json_decode($info);
echo '<pre>';
print_r($res);
echo '<hr>';
echo $res->text;
?>