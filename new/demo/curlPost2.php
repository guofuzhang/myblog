<?php
//curl的初始化
$ch = curl_init();
//设置curl的传输选项
$url = "http://localhost/weixin/demo/inserDB2.php";
curl_setopt($ch,CURLOPT_URL,$url);
//添加两个传输选项，因此我们现在是post请求了
curl_setopt($ch,CURLOPT_POST,1);//设置请求方式为post
$data = [
	['name'=>'熊大','age'=>12,'email'=>'xiongda@sohu.com'],
	['name'=>'熊二','age'=>12,'email'=>'xionger@sohu.com'],
	['name'=>'光头强','age'=>13,'email'=>'guangtouqiang@sohu.com']
];
//http_build_query函数，可以把一个数组转换成一个字符串，便于post请求中传输。
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));//设置post请求传输的数据
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//执行会话开始请求
$res = curl_exec($ch);
curl_close($ch);
echo $res;
?>