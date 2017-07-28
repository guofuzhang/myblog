<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-28 0028
 * Time: 14:23
 */
require_once "function.php";
$code=getToken();
$mediaid="7CovoG4lBxJ6UuhN0QDPu0vuSuwJHMyAKh9dF1415SSBmO_4GQ6_YHLo1DjojQjB";
//echo __FILE__;//当前文件路径名
//echo dirname(__FILE__);//当前文件目录
//echo $data['media'];
$url="https://api.weixin.qq.com/cgi-bin/media/get?access_token={$code}&media_id={$mediaid}";
$res=curl_http($url);
//$res=json_decode($res);
//print_r($res);
file_put_contents("./d_01.jpg",$res);