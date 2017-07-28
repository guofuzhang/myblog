<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-28 0028
 * Time: 14:09
 */
require_once "function.php";
$access_token=getToken();
$url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token={$access_token}";
$res=curl_http($url);
echo $res;
