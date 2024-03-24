# LiteBase: Basit Bir PHP Tabanlı Veritabanı Sistemi

LiteBase, PHP tabanlı basit bir veritabanı sistemidir. Dosya tabanlı bir yaklaşım kullanarak verileri saklar ve temel veritabanı işlevlerini sağlar.

## Özellikler

- Basit veritabanı işlevleri: LiteBase, veri saklama, alma, güncelleme ve silme gibi temel veritabanı işlevlerini sağlar.
- Dosya tabanlı veri saklama: Veriler, dosya tabanlı bir yaklaşımla saklanır, bu da kurulumun ve kullanımın kolay olmasını sağlar.
- Hata yönetimi: LiteBase, hata durumlarını ele alarak kullanıcıya geri bildirim sağlar.

## Kurulum

1. LiteBase dosyalarını indirin.
2. Dosyaları sunucunuza yükleyin.
3. Harika artık litebase'i sitenizde kullanabilirsiniz.
4. Yönetici paneline girmek için `example.com/mylitebase` adresine gitmeniz yeterli olacaktır. Varsayılan sifre `123`

## Kullanım

LiteBase, aşağıdaki temel işlevlerle kullanılabilir:

- `litebase_get('tablo adı', 'kelime', 'sutun')`: Tablodan belirli kelimeyi belirli sutunda içeren sutunu getirir.
- `litebase_insert('tablo adı', 'veri')`: Girdiğiniz veriyi tabloya ekler.
- `litebase_delete('tablo adı', 'kelime', 'sutun')`: Tablodan belirli kelimeyi belirli sutunda içeren sutunu siler.
- `litebase_getLine('tablo adı', 'satır')`: Belirli bir satırı almak için kullanılır.
- `litebase_dump('tablo adı')`: Veritabanı tablosunun tamamını döndürmek için kullanılır.

## Örnek Kullanım

```php
<?php
// LiteBase örnek kullanım

// LiteBase kütüphanelerini dahil etme
include("/LiteBase/LiteBase-1.0.php");

// Veritabanı dosyası ve tablo adı
$database = 'my_database';
$table = 'my_table';

// Veriyi eklemek için örnek
$data = 'John Doe,30,New York';

// Veriyi ekleyin
$result = litebase_insert($table, $data);

// Sonucu kontrol etme
if ($result) {
    echo "Veri başarıyla eklendi.";
} else {
    echo "Veri eklenirken bir hata oluştu.";
}
?>
