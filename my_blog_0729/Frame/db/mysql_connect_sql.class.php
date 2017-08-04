<?php

/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 16:06
 */
final class connect_sql
{
    private $dbhost;
    private $dbtype;
    private $dbname;
    private $charset;
    private $dbport;
    private $username;
    private $password;
    private static $sql_obj=null;

    private  function __construct($arr)
    {
        $this->dbhost=$arr['dbhost'];
        $this->dbname=$arr['dbname'];
        $this->dbtype=$arr['dbtype'];
        $this->charset=$arr['charset'];
        $this->dbport=$arr['dbport'];
        $this->username=$arr['username'];
        $this->password=$arr['password'];
        $this->db_connect();
        $this->db_select();
        $this->set_charset();
    }

    private function db_connect()
    {
        $res=@mysql_connect($this->dbhost,$this->username,$this->password);
//        var_dump($res);
//        echo "<br>";
    }

    private function db_select()
    {
        $res=@mysql_select_db("my_blog_sql");
//        var_dump($res);
    }

    private function set_charset()
    {   session_start();
        mysql_query("set names {$this->charset}");

    }

    public static function get_sql_obj($arr)
    {
        if(!self::$sql_obj instanceof self){
            self::$sql_obj=new self($arr);
        }
        return self::$sql_obj;
    }

    public function query($sql)
    {
        $sql=strtolower($sql);
        if(substr($sql,0,6)!="select"){
            die("please use function exec");
        }
        return mysql_query($sql);

    }

    public function exec($sql)
    {
        $sql=strtolower($sql);
        if(substr($sql,0,6)=="select"){

            die("please use function query");
        }
            return mysql_query($sql);

    }

    public function fetchAll($sql,$type)
    {
        $res=$this->query($sql);
        if (!empty($res)){
            while ($row=mysql_fetch_array($res,$type)){
            $arr1[]=$row;

        }

        if (!empty($arr1)){return $arr1;}else{
            return "nothing in your table";
        }
            }



    }


    public function fetchOne($sql,$type)
    {
        $res=$this->query($sql);
        if (!empty($res)){
           $arr1=mysql_fetch_array($res,$type);

            if (!empty($arr1)){return $arr1;}else{
                return "nothing in your table";
            }
        }



    }






    public function get_count($sql)
    {
        $res=$this->query($sql);
        return mysql_num_rows($res);
    }

    public function __destruct()
    {
        mysql_close();
    }

}