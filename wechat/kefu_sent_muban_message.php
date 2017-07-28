<?php
require './function.php';
$access_token = getToken();
$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token={}";

$data = '{
    "touser":"oUKcewouXsVFU2KtOTDyXGprHWWU",
    "template_id":"YudskcOyJNlcPjCoipQqPcayMf5IU7_H0fChN1pSB9k",
    "url":"www.baobao.com",
    "data":
    {
         "goods_name":{
         "value":"1.02",
         "color":"red",
         }
    }
}';
$res = curl_http($url,$data);
echo $res;
?>