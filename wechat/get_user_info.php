<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-28 0028
 * Time: 14:23
 */
require_once "function.php";
$code=getToken();
$openid="oUKcewouXsVFU2KtOTDyXGprHWWU";
$url="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$code}&openid={$openid}&lang=zh_CN ";
$res=curl_http($url);
$res=json_decode($res);
echo "<img src='{$res->headimgurl}' width='200'>";
echo $res->headimgurl;
//print_r($res);
