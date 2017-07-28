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
error_reporting(0);//屏蔽错误输出
$conn=mysql_connect("localhost","root","root");
mysql_select_db("wechat");
//var_dump($_POST);
foreach ($_POST as $value){
    $name=$value['name'];
    $age=$value['age'];
    $email=$value['email'];
    $sql="insert into user_table VALUES (null,'$name','$age','$email')";
    $res=mysql_query($sql);

    var_dump($res);
}


//
