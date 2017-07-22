<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-22 0022
 * Time: 23:11
 */
$appid="wx242d211d5ce134cd";
$secret="08b3774c30218b83e56a3e9e90a2ce51";
$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
//post请求禁止服务器端ssl验证
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

//$ch=curl_init();
//curl_setopt($ch,CURLOPT_POST,1);
//curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$res=curl_exec($ch);
curl_close($ch);
$info=json_decode($res);
echo $info->access_token;