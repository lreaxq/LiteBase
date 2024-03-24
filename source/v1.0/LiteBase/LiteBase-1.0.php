<?php
//LiteBase
session_start();
$litebase_debug = true;
$showErrors = true;
$liteBase_dataDirectory = $_SERVER['DOCUMENT_ROOT'] . "/litebase/data/";
error_reporting(0);
if (!file_exists($liteBase_dataDirectory)) {
    mkdir($liteBase_dataDirectory, 0777, true);
}

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'tr';
}

if ($_SESSION['lang'] == 'tr') {
    include('lang/tr.php');
}
if ($_SESSION['lang'] == 'en') {
    include('lang/en.php');
}
if ($_SESSION['lang'] == 'nl') {
    include('lang/nl.php');
}
if ($_SESSION['lang'] == 'ru') {
    include('lang/ru.php');
}




//Commands

function litebase_get($table = '', $word = '', $col = '')
{
    global $showErrors, $liteBase_dataDirectory, $err001, $litebase_error;
    try {
        if ($table == '' or $word == '' or $col == '') {
            throw new Exception($err001);
        }
        $sonuc = xlitebase_fun_get($table, $word, $col);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo $litebase_error . $e->getMessage();
        }
        return null;
    }
}
function litebase_insert($table = '', $data = '')
{
    global $showErrors, $liteBase_dataDirectory, $err001, $litebase_error;
    try {
        if ($table == '' or $data == '') {
            throw new Exception($err001);
        }
        $sonuc = xlitebase_fun_insert($table, $data);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo $litebase_error . $e->getMessage();
        }
        return false;
    }
}
function litebase_delete($table = '', $word = '', $col = '')
{
    global $liteBase_dataDirectory, $showErrors, $err001, $litebase_error;
    try {
        if ($table == '' or $word == '' or $col == '') {
            throw new Exception($err001);
        }
        $sonuc = xlitebase_fun_delete($table, $word, $col);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo $litebase_error . $e->getMessage();
        }
        return null;
    }
}
function litebase_getLine($table = '', $row = '')
{
    global $showErrors, $liteBase_dataDirectory, $err001, $litebase_error;
    try {
        if ($table == '' or $row == '') {
            throw new Exception($err001);
        }
        $sonuc = xlitebase_fun_getLine($table, $row);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo $litebase_error . $e->getMessage();
        }
        return null;
    }
}

function litebase_dump($table = '')
{
    global $showErrors, $liteBase_dataDirectory, $err001, $litebase_error;
    try {
        if ($table == '') {
            throw new Exception($err001);
        }
        $sonuc = xlitebase_fun_dump($table);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo $litebase_error . $e->getMessage();
        }
        return null;
    }
}

function litebase_dump_bases()
{
    global $showErrors, $liteBase_dataDirectory, $err001, $litebase_error;
    $sonuc = xlitebase_fun_getbases();
    return $sonuc;
}











function xlitebase_fun_getbases()
{
    global $showErrors, $liteBase_dataDirectory;

    $files = scandir($liteBase_dataDirectory);
    $bases = array();
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'lb') {
            array_push($bases, $file);
        }
    }
    return $bases;
}
















//Functions
function xlitebase_fun_get($file, $word, $col)
{
    global $litebase_debug, $liteBase_dataDirectory;
    $adet = 0;
    $dosya = fopen($liteBase_dataDirectory . '/' . $file . ".lb", "r") or throw new Exception("Dosya açılamadı!");
    while (!feof($dosya)) {
        $satir = fgets($dosya);
        $kolonlar = explode(" ", $satir);
        $arananKolon = trim($kolonlar[$col]);
        if (strpos($arananKolon, $word) !== false) {
            $adet++;
            return $satir;
        }
    }
    fclose($dosya);
    if ($adet == 0) {
        return false;
    }
}

function xlitebase_fun_insert($file, $data)
{
    global $litebase_debug, $liteBase_dataDirectory;
    if ($litebase_debug) {
        echo $file . ' --> ' . $data;
    }
    $dosya = fopen($liteBase_dataDirectory . '/' . $file . ".lb", "a") or throw new Exception("Dosya açılamadı!");
    $metin = $data . "\n";
    fwrite($dosya, $metin);
    fclose($dosya);
    return true;
}

function xlitebase_fun_delete($file, $word, $col = 0)
{
    global $liteBase_dataDirectory;
    $adet = 0;
    $dosya_yolu = $liteBase_dataDirectory . '/' . $file . ".lb";
    $gecici_dosya = tempnam(sys_get_temp_dir(), 'temp');

    $dosya = fopen($dosya_yolu, "r") or die("Dosya açılamadı!");

    $gecici_dosya_ac = fopen($gecici_dosya, "w") or die("Geçici dosya oluşturulamadı!");

    while (!feof($dosya)) {
        $satir = fgets($dosya);
        $kolonlar = explode(" ", $satir);
        $arananKolon = trim($kolonlar[$col]);
        if ($arananKolon != $word) {
            $adet++;
        } else {
            continue;
        }

        fwrite($gecici_dosya_ac, $satir);
    }

    fclose($dosya);
    fclose($gecici_dosya_ac);

    rename($gecici_dosya, $dosya_yolu);

    return true;
}

function xlitebase_fun_getLine($file, $lineNumber)
{
    global $liteBase_dataDirectory;
    $file = $liteBase_dataDirectory . '/' . $file . ".lb";
    $lines = file($file);
    if ($lineNumber <= 0 || $lineNumber > count($lines)) {
        return false;
    }
    $lineIndex = $lineNumber - 1;
    return $lines[$lineIndex];
}


function xlitebase_fun_dump($table = null)
{
    if ($table == null) {
        return null;
    }
    $i = 1;
    $sonuc = 'asd';
    $dump = array();
    while ($sonuc !== false) { // $sonuc null değilse döngü devam etmeli
        $sonuc = litebase_getLine($table, $i);
        if ($sonuc !== false) { // $sonuc false değilse ekrana yazdır
            array_push($dump, $sonuc);
        }
        $i++; // İleri satır numarasına geç

    }
    return $dump;
}
