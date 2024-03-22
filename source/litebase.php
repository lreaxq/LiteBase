<?php
//LiteBase
$litebase_debug = true;
$showErrors = true;
$liteBase_dataDirectory = $_SERVER['DOCUMENT_ROOT']."/litebase/data/";
error_reporting(0);

if (!file_exists($liteBase_dataDirectory)) {
    mkdir($liteBase_dataDirectory, 0777, true);
}

function litebase_get($table, $word, $col){
    global $showErrors, $liteBase_dataDirectory;
    try {
        $sonuc = litebase_fun_get($table, $word, $col);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo "Hata oluştu: " . $e->getMessage();
        }
        return null;
    }
}

function litebase_insert($table, $data){
    global $showErrors, $liteBase_dataDirectory;
    try {
        $sonuc = litebase_fun_insert($table, $data);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo "Hata oluştu: " . $e->getMessage();
        }
        return false;
    }
}

function litebase_delete($table, $word, $col){
    global $liteBase_dataDirectory, $showErrors;
    try {
        $sonuc = litebase_fun_delete($table, $word, $col);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo "Hata oluştu: " . $e->getMessage();
        }
        return null;
    }
}

function litebase_create($table){
    global $liteBase_dataDirectory, $showErrors;
    try {
        $sonuc = litebase_fun_create($table);
        return $sonuc;
    } catch (Exception $e) {
        if ($showErrors) {
            echo "Hata oluştu: " . $e->getMessage();
        }
        return null;
    }
}

function litebase_fun_create($file){
    global $litebase_debug, $liteBase_dataDirectory;
    try {
        $dosya = fopen($liteBase_dataDirectory.'/'.$file.".lb", "w") or throw new Exception("Dosya açılamadı!");
        fclose($dosya);
    } catch (Exception $e) {
        throw new Exception("Dosya oluşturulamadı: " . $e->getMessage());
    }
}

function litebase_fun_get($file, $word, $col = 0){
    global $litebase_debug, $liteBase_dataDirectory;
    try {
        $adet = 0;
        $dosya = fopen($liteBase_dataDirectory .'/'. $file . ".lb", "r") or throw new Exception("Dosya açılamadı!");
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
            return null;
        }
    } catch (Exception $e) {
        throw new Exception("Veri getirme hatası: " . $e->getMessage());
    }
}

function litebase_fun_insert($file, $data){
    global $litebase_debug, $liteBase_dataDirectory;
    try {
        if($litebase_debug){
            echo $file.' --> '.$data;
        }
        $dosya = fopen($liteBase_dataDirectory.'/'.$file.".lb", "a") or throw new Exception("Dosya açılamadı!");
        $metin = $data . "\n";
        fwrite($dosya, $metin);
        fclose($dosya);
    } catch (Exception $e) {
        throw new Exception("Veri ekleme hatası: " . $e->getMessage());
    }
}

function litebase_fun_delete($file, $word, $col = 0){
    global $liteBase_dataDirectory;
    try {
        $adet = 0;
        $dosya_yolu = $liteBase_dataDirectory .'/'. $file . ".lb";
        $temp_dosya = tempnam(sys_get_temp_dir(), 'temp');
        $dosya = fopen($dosya_yolu, "r") or throw new Exception("Dosya açılamadı!");
        $yeni_icerik = '';
        while (!feof($dosya)) {
            $satir = fgets($dosya);
            $kolonlar = explode(" ", $satir);
            $arananKolon = trim($kolonlar[$col]);
            if (strpos($arananKolon, $word) !== false) {
                $adet++;
                continue; // Bulunan satırı atla
            }
            $yeni_icerik .= $satir;
        }
        fclose($dosya);
        file_put_contents($temp_dosya, $yeni_icerik);
        rename($temp_dosya, $dosya_yolu); // Geçici dosyayı asıl dosya ile değiştir
        return $adet;
    } catch (Exception $e) {
        throw new Exception("Veri silme hatası: " . $e->getMessage());
    }
}
?>
