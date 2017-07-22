<?php
error_reporting(0);
require './function.php';
$access_token = getToken();
$type = 'image';
$url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$access_token}&type={$type}";
//因为是post请求，因此我们还有封装传递的数据
$data['media']= '@'.dirname(__FILE__).'/5.jpg';//图片的路径要使用绝对路径
$res =  curl_http($url,$data);
echo $res;
?>