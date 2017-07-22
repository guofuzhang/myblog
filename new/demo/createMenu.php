<?php
require './function.php';
//获取access_token的值
$access_token = getToken();
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
$data = '{
     "button":[
     {	
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';
$res = curl_http($url,$data);
var_dump($res);//$res;
?>