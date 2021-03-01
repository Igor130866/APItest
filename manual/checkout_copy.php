<?php
require 'err.php';
if (session_id()=='') {
    session_start();
}

$_SESSION['err']='';
if (isset($_POST) and !empty($_POST)) {
    if (isset($_POST['email']) and !empty($_POST['email'])) {
        $regmail = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z.]{2,5}$/";
        $postmail = htmlspecialchars(trim($_POST["email"]));
        if (preg_match($regmail,$postmail)) {
        } else {
            $_SESSION['err'] = errmessage(4);
        }
    } else {
        $_SESSION['err'] = errmessage(2);
    }
    if (isset($_POST['parol']) and !empty($_POST['parol'])) {
        $postparol = htmlspecialchars(trim($_POST["parol"]));
        $regparol = '/^[A-ZА-Я]+[0-9a-zа-я.]{7,}$/';
        if (preg_match($regparol,$postparol)) {
            $hash = md5($postparol);
        } else {
            $_SESSION['err'] = errmessage(5);
        }
    } else {
        $_SESSION['err'] = errmessage(3);
    }
} else {
    $_SESSION['err'] = errmessage(1);
}
if ($_SESSION['err']=='') {
    $arr = [];
    
    $arr = ["role"=>'admin',
        "date"=>'date',
            ];
    echo json_encode($arr);
} else {
    echo($_SESSION['err']);
}

