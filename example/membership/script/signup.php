<?php
include($_SERVER['DOCUMENT_ROOT'] . "/LiteBase/LiteBase-1.0.php");
if ($_POST){
    $username = mb_strtolower($_POST['username'], 'UTF-8');
    $password = $_POST['password'];
    $email = mb_strtolower($_POST['email'], 'UTF-8');

    $user = litebase_get('users', $username, '0');
    $mail = litebase_get('users', $email, '2');

    

    if ($user != null or $mail != null) {
        header('location: ../signup.php?alert=Bu Kullanıcı Adı Veya Email Zaten Kayıtlı');
        die();
    }else{
        litebase_insert('users', $username.' '.$password.' '.$email);
    }

    

}
unset($_POST);
header('location: ../index.php?alert=Hesabınız oluşturuldu! giriş yapın.');
?>