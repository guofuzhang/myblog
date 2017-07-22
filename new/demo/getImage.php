<?php
require './function.php';
$access_token = getToken();
$media_id = 'NyvgHjRQYmNOQ5O15QiZyb_7B24WRfjsXNhLsfT-Cycg9wmnOuD3lUrulQj7MaVe';
$url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token={$access_token}&media_id={$media_id}";
$res = curl_http($url);
file_put_contents('./hello2.jpg',$res);
?>