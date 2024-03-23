# LiteBase: Basit Bir PHP Tabanlı Veritabanı Sistemi

LiteBase, PHP tabanlı basit bir veritabanı sistemidir. Dosya tabanlı bir yaklaşım kullanarak verileri saklar ve temel veritabanı işlevlerini sağlar.

## Özellikler

- Basit veritabanı işlevleri: LiteBase, veri saklama, alma, güncelleme ve silme gibi temel veritabanı işlevlerini sağlar.
- Dosya tabanlı veri saklama: Veriler, dosya tabanlı bir yaklaşımla saklanır, bu da kurulumun ve kullanımın kolay olmasını sağlar.
- Hata yönetimi: LiteBase, hata durumlarını ele alarak kullanıcıya geri bildirim sağlar.

## Kurulum

1. LiteBase dosyalarını indirin.
2. Dosyaları sunucunuza yükleyin.
3. `litebase/data/` dizinini oluşturun ve yazma izinlerini (`chmod 0777`) ayarlayın.

## Kullanım

LiteBase, aşağıdaki temel işlevlerle kullanılabilir:

- `litebase_get`: Belirli bir tablodan veri almak için kullanılır.
- `litebase_insert`: Veritabanına yeni veri eklemek için kullanılır.
- `litebase_delete`: Veritabanından veri silmek için kullanılır.
- `litebase_getLine`: Belirli bir satırı almak için kullanılır.
- `litebase_dump`: Veritabanı tablosunun tamamını döndürmek için kullanılır.

## Örnek Kullanım

```php
<?php
// LiteBase örnek kullanım

// LiteBase kütüphanelerini dahil etme
include 'litebase.php';

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
