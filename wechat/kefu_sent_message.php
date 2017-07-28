<?php
require './function.php';
$access_token = getToken();
$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";

$data = '{
    "touser":"oUKcewouXsVFU2KtOTDyXGprHWWU",
    "msgtype":"text",
    "text":
    {
         "content":"Hello World,你好"
    }
}';
$res = curl_http($url,$data);
echo $res;
?>