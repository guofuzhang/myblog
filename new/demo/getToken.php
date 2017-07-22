<?php
	//初始化一个 curl请求
	$ch = curl_init();
	//设置传输选项
	$appid = "wx997494ad5935581f";
	$secret = "d4624c36b6795d1d99dcf0547af5443d";
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	//开始执行会话
	$res = curl_exec($ch);
	//关闭会话
	curl_close($ch);
	$info = json_decode($res);
	echo $info->access_token;

?>