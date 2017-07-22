<?php
$url="http://www.tuling123.com/openapi/api?key=d5567df93bfc43739c37cfedbff90483&info=北京天气";
$info=file_get_contents($url);
echo $info;
echo "<br>";
echo json_decode($info)->text;