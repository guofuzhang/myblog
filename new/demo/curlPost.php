<?php
//curl的初始化
$ch = curl_init();
//设置curl的传输选项
$url = "http://localhost/weixin/demo/insertDB.php";
curl_setopt($ch,CURLOPT_URL,$url);
//添加两个传输选项，因此我们现在是post请求了
curl_setopt($ch,CURLOPT_POST,1);//设置请求方式为post
$data = ['name'=>'派大星','age'=>22,'email'=>'xiaopai@sohu.com'];
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//设置post请求传输的数据
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//执行会话开始请求
$res = curl_exec($ch);
curl_close($ch);
echo $res;
?>