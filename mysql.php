<?php



$db=mysql_connect("localhost","hongzhulei","18215579");
if($db){
    echo "db is good";
}else{
    echo "db is bad";
}

$dbname=mysql_selectdb("itcast");
if($dbname){echo "dbname is good";};