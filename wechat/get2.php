<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-22 0022
 * Time: 21:32
 */
$ch=curl_init();
$appid="wxb393bdfde239a685";
$scret="d6377ca00d5ede1979b8a2be5b7aaa45";
$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$scret}";

curl_setopt($ch, CURLOPT_URL, $url);


curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$res= curl_exec($ch);
var_dump($res);
//var_dump(curl_exec($ch));
curl_close($ch);
$info=json_decode($res);
echo $info->access_token;

//echo file_get_contents($url);