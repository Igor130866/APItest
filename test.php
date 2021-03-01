<?php
require 'bd/bd.php';
require 'classes/DBoperation.php';
require 'main/err.php';
if (session_id()=='') {
    session_start();
}

$perem = new DBoperation();
$arr = [];
//:login,:parol,:role,:date
$arr['login'] = 'g@rr.ru';
$arr['parol'] = md5('parol');
$arr['role'] = 'user';
$arr['date'] = date('Y-m-d H:i:s');

$otvet = $perem->insert($arr);
if ($otvet) {
    print_r($otvet);
} else {
    $_SESSION['err'] = errmessage(6);
    print_r($_SESSION['err']);
}
/*
$perem = new DBoperation();
$otvet = $perem->queryAll();
if ($otvet) {
    print_r($otvet);
} else {
    $_SESSION['err'] = errmessage(8);
    print_r($_SESSION['err']);
}

$perem = new DBoperation();
$arr = [];
$arr['login'] = 'g@gg.ru';
$otvet = $perem->selectlogin($arr);
if ($otvet) {
    print_r($otvet);
} else {
    $_SESSION['err'] = errmessage(17);
    print_r($_SESSION['err']);
}

