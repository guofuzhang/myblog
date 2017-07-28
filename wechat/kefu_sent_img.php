<?php
require './function.php';
$access_token = getToken();
$url = " https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token={$access_token}";

$data = '{
    "touser":"oUKcewouXsVFU2KtOTDyXGprHWWU",
    "msgtype":"image",
    "image":
    {
      "media_id":"7CovoG4lBxJ6UuhN0QDPu0vuSuwJHMyAKh9dF1415SSBmO_4GQ6_YHLo1DjojQjB"
    }
}';
$res = curl_http($url,$data);
echo $res;
?>