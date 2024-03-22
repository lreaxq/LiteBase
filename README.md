# LiteBase Kullanım Kılavuzu

## LiteBase Nedir?

LiteBase, basit ve hafif bir dosya tabanlı veritabanı sistemidir. PHP projeleri için ideal olan LiteBase, veri depolama ve yönetim ihtiyaçlarını karşılar. LiteBase, hızlı bir şekilde kurulabilir ve kullanılabilir.

## Kurulum

LiteBase'i kurmak için aşağıdaki adımları izleyin:

1. **İndirme**: LiteBase'in en son sürümünü [buradan](https://example.com/litebase/latest) indirin.

2. **Dosyaları Çıkarma**: İndirdiğiniz dosyayı istediğiniz bir klasöre çıkartın.

3. **Kullanıma Başlama**: LiteBase'i kullanmaya başlamak için, PHP projesinin kodlarına LiteBase'i dahil edin ve gerekli fonksiyonları kullanmaya başlayın.

## Kullanım

LiteBase'i kullanmak için aşağıdaki adımları izleyin:

1. **Veritabanı Oluşturma**: `litebase_create` fonksiyonu ile yeni bir veritabanı oluşturun.

2. **Veri Ekleme**: `litebase_insert` fonksiyonu ile veritabanına yeni veri ekleyin.

3. **Veri Alma**: `litebase_get` fonksiyonu ile veritabanından veri alın.

4. **Veri Silme**: `litebase_delete` fonksiyonu ile veritabanından veri silin.

5. **Güncelleme (Opsiyonel)**: Var olan verileri güncellemek için `litebase_update` gibi fonksiyonları kullanabilirsiniz.

## Örnek Kod

```php
// LiteBase'i kullanmak için gerekli dosyayı dahil edin
include('litebase.php');

// Yeni bir veritabanı oluşturun
litebase_create('my_database');

// Veri ekleme
litebase_insert('my_database', 'hello world');

// Veri alma
$data = litebase_get('my_database', 'hello', 0);

// Veri silme
litebase_delete('my_database', 'hello', 0);
