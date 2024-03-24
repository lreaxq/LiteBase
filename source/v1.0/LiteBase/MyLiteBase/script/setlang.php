<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Seçilen dili al
    $selected_language = $_POST["language"];

    // Dil dosyasını dahil et
    $_SESSION['lang'] = $selected_language;
    header('location: ../index.php');
    // İşlemler devam eder...
}
