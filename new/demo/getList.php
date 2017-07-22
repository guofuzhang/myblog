<?php
require './function.php';
$access_token = getToken();
$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token={$access_token}";

$res = curl_http($url);
$info = json_decode($res);
echo '<pre>';
print_r($info->data->openid);
?>