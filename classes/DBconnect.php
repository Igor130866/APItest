<?php


class DBconnect {
     private $PDO;

     public function connect_pdo() {
         require_once './bd/bd.php';
         require_once './main/err.php';
        try {
            $this->PDO = new PDO('mysql::host='.DB_HOST.';dbname='.DB_NAME.';charset=UTF8',DB_USERNAME,DB_PASSWORD);
        } catch (PDOException $e) {
            //$_SESSION['err'] = errmessage(11);
            echo 'Подключение не подключилось:  '. $e->getMessage();
        }
        return $this->PDO;
    }
}