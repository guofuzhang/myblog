<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "../../define.php";
require_once FRAME."db".DS."mysql_connect_sql.class.php";
require_once FRAME."smarty/libs/Smarty.class.php";
    $arr1=array(

        "dbhost"=>"127.0.0.1",
        "dbname"=>"my_blog_sql",
        "dbtype"=>"mysql",
        "charset"=>"utf8",
        "dbport"=>"3306",
        "username"=>"root",
        "password"=>"root",
    );
    $mysql_obj=connect_sql::get_sql_obj($arr1);
//var_dump($mysql_obj);
    $smarty=new Smarty();




