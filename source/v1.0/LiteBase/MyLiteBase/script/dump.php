<?php
include('../../LiteBase-1.0.php');
$table = $_GET['table'];
if ($table == null) {
    header("Location: ../index.php?dump=error");
}

$sonuc = litebase_dump($table);

$dump = http_build_query(array('dump' => $sonuc));
header("Location: ../index.php?" . $dump);
