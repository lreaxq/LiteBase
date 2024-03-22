<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/LiteBase/LiteBase-1.0.php");
if ($_POST){
    $username = mb_strtolower($_POST['username'], 'UTF-8');
    $password = $_POST['password'];

    $sonuc = litebase_get('users', $username, 0);

    $user_data = explode(' ',$sonuc);
    $real_password = $user_data[1];

    if ($password == $real_password) {
        $_SESSION['username'] = $username;
        unset($_POST);
        header('location: ../index.php?alert=Giriş Başarılı!');
    }else {
        unset($_POST);
        header('location: ../index.php?alert=Giriş Başarısız!');
    }
}
unset($_POST);
?>