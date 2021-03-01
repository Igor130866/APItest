<?php


class DBoperation {
    private $con;
    function __construct(){
        require_once './bd/bd.php';
        require_once 'DBconnect.php';
        $db = new DBconnect();
        $this->con = $db->connect_pdo();
    }
    private function execute($sql) {
        $sth = $this->con->prepare($sql);
        return $sth->execute();
    }
    public function queryAll() {
        $sql = "Select role FROM test_PDO_clients";
        $sth = $this->con->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if($result===false) {
            return [];
        }
        return $result;
    }
    public function selectlogin($arr) {
        $login = $arr['login'];
        //print_r($login);
        $sql = "SELECT * FROM test_PDO_clients WHERE login=:login";
        $sth = $this->con->prepare($sql);
        $sth->execute(['login'=>$login]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result===false) {
            return [];
        }
        return $result;
    }
    public function insert($arr){
        $sql = "INSERT INTO test_PDO_clients (login,parol,role,date) VALUES (:login,:parol,:role,:date)";  // Ваш запрос в БД
        $req = $this->con->prepare($sql); // Подготавливаем запрос
        $req->bindValue(':login', $arr['login'], PDO::PARAM_STR);
        $req->bindValue(':parol', $arr['parol'], PDO::PARAM_STR);
        $req->bindValue(':role', $arr['role'], PDO::PARAM_STR);
        $req->bindValue(':date', $arr['date'], PDO::PARAM_STR);
        $req->execute();
        $result = $this->con->lastInsertId();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}