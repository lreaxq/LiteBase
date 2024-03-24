<?php
session_start();

// Oturumu sonlandır
session_destroy();

// Kullanıcıyı anasayfaya yönlendir
header("Location: ../index.php");
exit;
