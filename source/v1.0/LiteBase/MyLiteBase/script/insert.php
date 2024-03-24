<?php
include('../../LiteBase-1.0.php');
$table = $_GET['table'];
$data = $_GET['data'];

$sonuc = litebase_insert($table, $data);

header('location: ../index.php?insert_msg=İşlem başarılı!');
