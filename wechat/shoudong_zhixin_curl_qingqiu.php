<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-28 0028
 * Time: 14:27
 */
//$URL="www.baidu.com";
//$ch=curl_init();//初始化curl
//curl_setopt($ch,CURLOPT_URL,$URL);//传递地址//如果是get方式,就不用其他配置
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回的是执行后的字符串,而不是直接输出
//$str=curl_exec($ch);
//curl_close($ch);
//echo $str;

//****************************以上是get方式请求
//post如何传递单挑数据
//$ch=curl_init();
//$url="http://www.fast1.com/0718/wechat/curl_post_data_insert_db.php";
//$data=['name'=>'李白','age'=>12,'email'=>'123@qq.com'];
//curl_setopt($ch,CURLOPT_URL,$url);//确定发送地址
//curl_setopt($ch,CURLOPT_POST,1);//确定是否为post提交
//curl_setopt($ch,CURLOPT_POSTFIELDS,$data );//把data数据发过去
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回字符串的执行结果.
//
//$res=curl_exec($ch);//执行请求
//curl_close($ch);//关闭句柄
//echo $res;

//*********************************
//如何传递多条数据
$ch=curl_init();
$url="http://www.fast1.com/0718/wechat/curl_post_data_insert_db_duotiao.php";
$data=[
    ['name'=>'李白1','age'=>12,'email'=>'123@qq.com'],
    ['name'=>'李白2','age'=>12,'email'=>'123@qq.com'],
    ['name'=>'李白3','age'=>12,'email'=>'123@qq.com']
];
curl_setopt($ch,CURLOPT_URL,$url);//确定发送地址
curl_setopt($ch,CURLOPT_POST,1);//确定是否为post提交
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data) );//把data数据发过去
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回字符串的执行结果.

$res=curl_exec($ch);//执行请求
curl_close($ch);//关闭句柄
echo $res;