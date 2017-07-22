<?php
require './function.php';
$access_token = getToken();
$openid = 'oRgpmv1pymwtlRvIupdxMmVvvN3Y';
$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang=zh_CN";

$res = curl_http($url);
$info = json_decode($res);
echo '名称是',$info->nickname,'城市是',$info->city;
echo "<img src='{$info->headimgurl}' width='200'/>";
echo '<hr>';
echo '<pre>';
print_r($info);
e
?>