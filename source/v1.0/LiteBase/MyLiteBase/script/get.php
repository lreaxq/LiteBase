<?php
include('../../LiteBase-1.0.php');
$table = $_GET['table'];
$word = $_GET['word'];
$col = $_GET['col'];

if ($_GET['find']) {
    $sonuc = litebase_get($table, $word, $col);
} elseif ($_GET['delete']) {
    $sonuc = litebase_delete($table, $word, $col);
}

header('location: ../index.php?get=' . $sonuc);
