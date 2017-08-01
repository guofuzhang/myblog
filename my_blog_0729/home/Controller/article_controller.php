<?php

/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";
$id=$_GET['id'];
$sql="select * from article WHERE art_id={$id}";
$arrs=$mysql_obj->fetchAll($sql,3);
//print_r($arrs);
$smarty->assign("arr",$arrs[0]);
$smarty->display("../View/lw-article.html");

