<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-28 0028
 * Time: 14:23
 */
require_once "function.php";
$code=getToken();
$type="image";
//echo __FILE__;//当前文件路径名
//echo dirname(__FILE__);//当前文件目录
$data['media']='@'.dirname(__FILE__)."/01.jpeg";
//echo $data['media'];
$url="https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$code}&type={$type}";
$res=curl_http($url,$data);
$res=json_decode($res);
print_r($res);
