<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";
//var_dump($mysql_obj);
    $sql="select * from blog_admin_user";
    $arrs= $mysql_obj->fetchAll($sql,1);
    $smarty->display("../View/ArticleAdd.html");
    if (!empty($_POST)){
        print_r($_POST);
    }




