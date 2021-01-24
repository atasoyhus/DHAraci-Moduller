# Doçentlik Hesaplama Aracı - Modüller

Bu depo, [Doçentlik Puanı Hesaplama Aracı](http://www.atasoyweb.net/Docentlik-Puani-Hesaplama-Araci) için gerekli modülleri içermektedir. Hesaplama aracındaki arayüz, bu modüllerde yer alan verilere göre otomatik olarak oluşturulmakta ve hesaplar bu modüllerde yer alan direktiflere göre *DocentlikCekirdek* sınıfı tarafından yapılmaktadır. Modüllerin yazımına veya kurallarda değişiklik meydana geldiğinde güncellenmesine katkı sağlamak isterseniz [Doçentlik Başvuru Şartları](https://www.uak.gov.tr/Sayfalar/docentlik/basvuru-sartlari/2020-ekim-d%C3%B6nemi.aspx)'nın, buradaki "src/" dizini altında yer alan php sınıflarına uyarlanmasına yardımcı olabilirsiniz. (Arayüzün hazırlanması ve işlemlerin yapılmasından sorumlu sınıf olan *DocentlikCekirdek* sınıfı kaynak kodlara dahil değildir.)

## Güncel Modüller
* **T9.php [12/01/2021]:** Tablo 9 - Mühendislik Temel Alanı
* **T8.php [23/01/2021]:** Tablo 8 - Mimarlık, Planlama ve Tasarım Temel Alanı

## Genel Yapı
Modüller, *DocentlikCekirdek* sınıfının üyelerini miras alan birer php sınıfıdır.
* ***meta:*** Modülün yazılma tarihleri ve baz alınan doçentlik kriterleri ile iligli bilgilerin tutulduğu dizi
* ***alanlar:*** Temel alanın kapsadığı bilim alanlarını tutan dizi
* ***baslik:*** Temel alanın başlığı
* ***aciklama:*** Temel alan ile ilgili genel açıklamalar
* ***tanimlar:*** ÜAK tarafından yayınlanan kriterlerde belgelerin sonlarında yer alan kısaltma ve tanımları tutan dizi
* ***faaliyetleriYukle():*** Puanlanacak faaliyet türlerinin, bütün detaylarıyla birlikte tanımlanıp *DocentlikCekirdek* sınıfından miras alınan *faaliyetler* değişkenine yüklendiği fonksiyon

### Faaliyet Tanımları
Faaliyetler çok boyutlu, anahtarlar ve karşılık gelen değerler dizisi olarak tanımlanmalıdır. Her faaliyet maddesi alt maddeleri 'alt' anahtarına bağlı olarak tutmalıdır. 
### İşlemler
Puan veya faaliyet sayıları üzerinde işlem yapar ve sonuçları, işlem adı olarak belirlenen etiketlerde tutar. Sadece alt madde düzeyinde tanımlanmalıdır.

Örneğin aşağıdaki dizi, tanımlı olduğu faaliyet alt maddesine girilen faaliyetlerle ilgili puanları *ilkaltmaddepuan* ve *toplampuan* isimli iki değişken / etiket tanımlayıp içerlerinde toplar. Diğer işlemde ise girilen faaliyet sayıları *yayinsayisi* etiketiyle toplanır.
 ```php
'islemler'=>array(
  array(
    'islemadi'=>'ilkaltmaddepuan,toplampuan',
    'islem'=>'+',
    'deger'=>'puan'
  ),
  array(
    'islemadi'=>'yayinsayisi',
    'islem'=>'+',
    'deger'=>'sayi'
  )
)
 ```
### Limit
Limit tanımları, limite tabi işlem sonuçlarını belli bir üst limit ile sınırlar. Sadece ana madde düzeyinde tanımlanmalıdır.

Örneğin aşağıdaki tanım, *islem1* ve *islem2* işlemlerinin sonuçlarını limiler.
```php
'limit'=>array(
  'tip'=>'puan',
  'deger'=>4,
  'tabiolanlar'=>'islem1,islem2'
)
```
### Koşullar
İşlem adları belirtilen işlemlerin sonuçlarının belirlenen koşula uyup uymadığını kontrol eder. Uymuyorsa kullanıcıya verilecek mesajı da tutar. Dizinin en üst düzeyinde, ana madde düzeyinde ve alt madde düzeyinde tanımlanabilir. *'saglanamazsa'* içerisine yazılan {MNo} ve {AltMNo} ifadeleri, madde veya alt madde içindeyse, içinde tanımlı oldukları madde ve alt madde numaraları ile değiştirilir.

Örneğin aşağıdaki tanım, islem1 işleminin sonucu 4 veya 4'ten büyük olmazsa, *'saglanamazsa'* içerisinde belirtilen ifade kullanıcıya yansıtılır.
```php
'kosullar'=>array(
  array(
    'kosuladi'=>'ornekkosul'
    'islemadi'=>'islem1',
    'kosul'=>'>=',
    'deger'=>4,
    'saglanmazsa'=>'{MNo} maddesindeki en az 4 yayın kriteri sağlanmadı...'
  )
)						
```
### Mantıksal İşlemler
Koşullar arasında mantıksal ve / veya işlemleri gerçekleştirir ve sonucu, işlemin tanımlı olduğu koşulun sonucu olarak belirler. Sadece koşul düzeyinde tanımlanmalıdır.

Örneğin aşağıdaki koşul, kendisi veya *ornekkosul* koşulu sağlanmışsa, sağlanmış sayılır. Her ikisi de sağlanamadığında *'saglanamazsa'* kısmındaki cümle kullanıcıya yansır.
```php
array(
  'islemadi'=>'islem2',
  'kosul'=>'>=',
  'deger'=>10,
  'mantiksal'=>array(
    array(
      'islem'=>'veya',
      'kosuladi'=>'ornekkosul'
    )
  ),
  'saglanmazsa'=>'Falanca kriteri veya filanca kriteri sağlamanız gerekir.'
)
```
### Kullanıcı Arayüzü
Kullanıcı arayüzü, yerleştirilen alt madde tanımlarındaki '*tip*' değişkenindeki içeriğe göre hazırlanır. Bu değişken T, S, B, Z ve K harflerinin herhangi bir kombinasyonu veya *'evethayir'* olabilir. Kullanıcı bir faaliyet eklediğinde, bu harflerden hangileri '*tip*' kısmına girilmişse, sırayla '**T**oplam kaç kişi', 'kaçıncı **S**ıra', '**B**aş yazar', '**Z**amanlama' ve '**K** tane' seçeneklerinin kullanıcıya görünmesini sağlarlar.
*'tip'=>'evethayir'* olarak girildiğinde, kullanıcıya yalnızca Evet ve Hayır seçenekleri sunulur. Hayır seçeneği 0, Evet seçeneği ise *'puan'* değeri kadar puan alır.
