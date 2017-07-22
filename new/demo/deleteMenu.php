<?php
require './function.php';
//获取access_token
$access_token = getToken();
$url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token={$access_token}";
//调用请求的函数，完成调用
$res = curl_http($url);
echo $res;
?>