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
$url="https://api.weixin.qq.com/cgi-bin/user/get?access_token={$code}";
$res=curl_http($url);
$res=json_decode($res);
print_r($res->data->openid);