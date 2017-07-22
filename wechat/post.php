<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-22 0022
 * Time: 19:01
 */

$ch=curl_init();//初始化curl的传输选项
$url="http://www.fast.com/0718/mysqlindex.php";
curl_setopt($ch,CURLOPT_URL,$url);//添加传输地址
curl_setopt($ch,CURLOPT_POST,1);//添加传输方式
$data=[
    ['name'=>"tom",'age'=>24,'email'=>'1552@qq.com'],
    ['name'=>"tom1",'age'=>24,'email'=>'1552@qq.com'],
    ['name'=>"tom2",'age'=>24,'email'=>'1552@qq.com'],
    ['name'=>"tom3",'age'=>24,'email'=>'1552@qq.com'],
];
//$data//单个数据///http_query($data);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));//添加传输数据
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//字符串输出
$res=curl_exec($ch);
curl_close($ch);
echo $res;


