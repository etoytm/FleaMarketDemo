<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-07-26
 * Time: 11:08
 */

//header("content-type:text/html;charset=utf-8");
// 数据库连接类
class DB
{
    //私有的属性
    private $host;
    private $port;
    private $user;
    private $pass;
    private $db;
    private $charset;
    private $link;

    //私有的构造方法
    public function __construct()
    {
        $this->host = '47.102.215.91';
//        $this->host =  'localhost';
        $this->port = '3306';
        $this->user = 'ygx';
        $this->pass = '1234567mysql';
        $this->db = 'ts';
        $this->charset = 'utf8';
        //连接数据库
        $this->db_connect();
        //选择数据库
        $this->db_usedb();
        //设置字符集
        $this->db_charset();
    }

    //连接数据库
    private function db_connect()
    {
        $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->db, $this->port);
        if (!$this->link) {
            die(mysqli_errno($this->link));
            echo "数据库连接失败<br>";
            echo "错误编码" . mysqli_errno($this->link) . "<br>";
            echo "错误信息" . mysqli_error($this->link) . "<br>";
            exit;
        }
    }

    //设置字符集
    private function db_charset()
    {
        mysqli_query($this->link, "set names {$this->charset}");
    }

    //选择数据库
    private function db_usedb()
    {
        mysqli_query($this->link, "use {$this->db}");
    }

    /**
     * 执行sql语句
     * @param string $sql sql语句
     * @return bool|mysqli_result For successful SELECT, SHOW, DESCRIBE or EXPLAIN queries, mysqli_query() will return a mysqli_result object. For other successful queries mysqli_query() will return TRUE. Returns FALSE on failure.
     */
    public function query($sql)
    {
        $res = mysqli_query($this->link, $sql);
        if (!$res) {
            echo "sql语句执行失败<br>";
            echo "错误编码是" . mysqli_errno($this->link) . "<br>";
            echo "错误信息是" . mysqli_error($this->link) . "<br>";
        }
        return $res;
    }
}