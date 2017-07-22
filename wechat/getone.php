<?php
require './function.php';
echo get_token();
/*//调用curl_http获取access_token值
$appid = "wx997494ad5935581f";
$secret = "d4624c36b6795d1d99dcf0547af5443d";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
$res = curl_http($url);
$info = json_decode($res);
echo $info->access_token;*/
?>