<?php
require './function.php';
$access_token = getToken();
$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token={$access_token}";

$data = '{"expire_seconds": 604800, "action_name": "QR_STR_SCENE", "action_info": {"scene": {"scene_str": "test"}}}';
$res = curl_http($url,$data);
$res=json_decode($res);
$ticket=$res->ticket;
$url="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={$ticket}";
$res=curl_http($url);
file_put_contents("erweima_pic.jpg",$res);
?>