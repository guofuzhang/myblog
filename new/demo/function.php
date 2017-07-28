<?php
//封装一些函数，
//封装一个curl请求的函数，
//思考：函数的参数，函数的返回值
//函数的参数1:请求的url,参数2:post请求时传输的数据
//函数的返回值，就是直接请求的结果




function curl_http($url,$data=null){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	//关闭上传文件安全验证功能,在PHP.5.6以前，该项就是关闭的，可以不用设置。
	curl_setopt($ch,CURLOPT_SAFE_UPLOAD,false);
	//如下是在执行post的https请求时，服务器端要禁止ssl验证。
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	//判断是post请求，还是get请求，
	if(!empty($data)){
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	}
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$res = curl_exec($ch);
	curl_close($ch);
	return $res;
}

//定义一个获取access_token的函数
function getToken(){
	$appid = "wx997494ad5935581f";
	$secret = "d4624c36b6795d1d99dcf0547af5443d";
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
	$res = curl_http($url);
	$info = json_decode($res);
	return $info->access_token;
}
?>