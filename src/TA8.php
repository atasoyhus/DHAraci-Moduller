<?php

// Huseyin Atasoy
// Ocak 2021

include 'DocentlikCekirdek.php';

class DocentlikHesaplayici extends DocentlikCekirdek
{
	protected $meta=array(
		'tarih'				=>	'23/01/2021',
		'guncellenme'		=>	'24/01/2021',
		'bazAlinanVeriler'	=>	'https://www.uak.gov.tr/Documents/docentlik/2020-ekim-donemi/basvuru-sartlari/TA_Tablo8_2020E_10032020.pdf'
	);

	protected $alanlar=array(
		'803'=>'Endüstri Ürünleri Tasarımı',
		'804'=>'İç Mimarlık',
		'801'=>'Mimarlık',
		'805'=>'Peyzaj Mimarlığı',
		'802'=>'Şehir ve Bölge Planlama'
	);

	protected $baslik='Mimarlık, Planlama ve Tasarım Temel Alanı';
	protected $aciklama='Mimarlık, planlama, tasarım temel alanında başvurulan doçentlik bilim alanı ile ilgili olarak aşağıdaki çalışmalara verilen birim puanlar esas alınmak suretiyle; en az doksan (90) puanının doktora unvanının alınmasından sonra gerçekleştirilen çalışmalardan elde edilmiş olması kaydıyla, asgari yüz (100) puan karşılığı bilimsel etkinlikte bulunmuş olması gerekir. Her çalışma, tabloda <b>sadece bir bölümde kullanılmalıdır</b>. Tek yazarlı makalelerde yazar tam puan alır. İki yazarlı makalelerde başlıca yazar tam puanın 0.8\'ini, ikinci yazar 0.5\'ini alır. Üç ve daha fazla yazarlı makalelerde ise, başlıca yazar toplam puanın yarısını alır, diğer yazarlar ise diğer yarısını eşit paylaşır. Başlıca yazarın belirtilmediği iki veya daha fazla yazarlı makalelerde toplam puan yazarlar arasında eşit olarak bölünür. Diğer yayınlarda (bildiri,kitap) ise toplam puan yazarlar arasında eşit olarak bölünür.';

	protected $tanimlar=array(
		'SCI–Expanded: Science Citation Index-Expanded',
		'SCI: Science Citation Index',
		'SSCI: Social Sciences Citation Index',
		'AHCI: Art and Humanities Index',
		'ULAKBİM: Ulusal Akademik Ağ ve Bilgi Merkezi',
		'AB Çerçeve Programları: AB tarafından, üye ve aday ülkelerin çeşitli alanlardaki ulusal politika ve uygulamalarının birbirine yakınlaştırılması amacıyla oluşturulan Topluluk Programlarından birisidir.',
		'Diğer Uluslararası alan endeksleri: The Avery Index to Architectural Periodicals, DAAI (Design and Applied Arts Index), Art Index (Art Research Database, EBSCO), ICONDA (The International Construction Database), Ergonomics Abstracts (Ergo-Abs)',
		'Başlıca Yazar: Tek yazarlı makalede veya danışmanlığını yaptığı lisansüstü öğrenci(ler) ile birlikte yazılmış makalede (aynı makalede birden fazla öğrenci ve ikinci danışman da yer alabilir) aday, başlıca yazar olarak değerlendirilir.',
		'Ulusal Yayınevi: En az dört yıl ulusal düzeyde düzenli faaliyet yürüten, yayınları Türkiye’deki üniversite kütüphanelerinde kataloglanan ve daha önce aynı alanda farklı yazarlara ait en az 20 kitap yayımlamış yayınevi',
		'Uluslararası Yayınevi: En az dört yıl uluslararası düzeyde düzenli faaliyet yürüten, yayımladığı kitaplar Yükseköğretim Kurulunca tanınan sıralama kuruluşlarınca belirlenen dünyada ilk 500’e giren üniversite kütüphanelerinde kataloglanan ve aynı alanda farklı yazarlara ait en az 20 kitap yayımlamış olan yayınevi',
		'Uluslararası Bilimsel Toplantı: Farklı ülkelerden bilim insanlarının bilim kurulunda bulunduğu ve sunumların bilimsel ön incelemeden geçirilerek kabul edildiği toplantı',
		'Ulusal Bilimsel Toplantı: Ulusal seviyede farklı kurumlardan bilim insanlarının bilim kurulunda bulunduğu ve sunumların bilimsel ön incelemeden geçirilerek kabul edildiği toplantı',
		'Yayımlanmış Makale: Alanında bilime katkı sağlamış olmak şartıyla özgün matbu veya elektronik ortamda yayımlanmış makale',
		'Uluslararası Patent: Uluslararası araştırma ofisleri tarafından (PCT - Patent Cooperation Treaty) buluşun yeni ve buluş basamağı içerdiğine dair araştırma raporu alınmış patent başvurusu',
		'Ulusal Patent: Türk Patent Enstitüsü tarafından buluşun yeni ve buluş basamağı içerdiğine dair araştırma raporu alınmış patent başvurusu'
	);

	protected function faaliyetleriYukle()
	{
		$this->faaliyetler=array(
			'kosullar'=>array(
				array(
					'islemadi'=>'toplamp_drs_l',
					'kosul'=>'>=',
					'deger'=>90,
					'saglanmazsa'=>'Doktora sonrası yaptığınız çalışmalardan toplam en az 90 puan almanız gerekir.'
				),
				array(
					'islemadi'=>'toplamp_l',
					'kosul'=>'>=',
					'deger'=>100,
					'saglanmazsa'=>'Yaptığınız çalışmalardan toplam en az 100 puan almanız gerekir.'
				)
			),
			'maddeler'=>array(
				array(
					'baslik'=>'Makaleler',
					'aciklama'=>'Başvurulan bilim alanı ile ilgili ve adayın hazırladığı lisansüstü tezlerden üretilmemiş olmak kaydıyla (editöre mektup, özet, derleme, teknik not ve kitap kritiği hariç) tam araştırma makaleleri',
					'alt'=>array(
						array(
							'aciklama'=>'SCI, SCI-Expanded, SSCI ,AHCI veya alan indeksleri kapsamındaki dergilerde yayımlanmış makale',
							'puan'=>20,
							'tip'=>'TBZK',
							'islemler'=>array(
								array(
									'islemadi'=>'1basclicayazars',
									'islem'=>'+',
									'kosul'=>'*BaslicaYazar',
									'deger'=>'sayi'
								),
								array(
									'islemadi'=>'1toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								),
								array(
									'islemadi'=>'patentyoksas',
									'islem'=>'+',
									'deger'=>'sayi'
								)
							)
						),
						array(
							'aciklama'=>'Diğer uluslararası hakemli dergilerde yayımlanmış makale',
							'puan'=>8,
							'tip'=>'TBZK',
							'islemler'=>array(
								array(
									'islemadi'=>'1toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								),
								array(
									'islemadi'=>'patentyoksas,1digerikisindeyayins',
									'islem'=>'+',
									'deger'=>'sayi'
								)
							)
						),
						array(
							'aciklama'=>'ULAKBİM tarafından taranan ulusal hakemli dergilerde yayımlanmış makale',
							'puan'=>8,
							'tip'=>'TBZK',
							'islemler'=>array(
								array(
									'islemadi'=>'1toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								),
								array(
									'islemadi'=>'1digerikisindeyayins',
									'islem'=>'+',
									'deger'=>'sayi'
								)
							)
						)
					),
					'kosullar'=>array(
						array(
							'kosuladi'=>'1basclicayazarsk',
							'islemadi'=>'1basclicayazars',
							'kosul'=>'>=',
							'deger'=>1
						),
						array(
							'islemadi'=>'1digerikisindeyayins',
							'kosul'=>'>=',
							'deger'=>4,
							'mantiksal'=>array(
								array(
									'islem'=>'veya',
									'kosuladi'=>'1basclicayazarsk'
								)
							),
							'saglanmazsa'=>'1.1 maddesinde en az bir yayında başlıca yazar olmanız veya 1.1 ve 1.2 alt maddeleri kapsamında toplam en az 4 yayın yapmış olmanız gerekir.'
						),
						array(
							'kosuladi'=>'patentyoksask',
							'islemadi'=>'patentyoksas',
							'kosul'=>'>=',
							'deger'=>1
						),
					)
				),
				array(
					'baslik'=>'Lisansüstü Tezlerden Üretilmiş Yayın',
					'aciklama'=>'Adayın hazırladığı lisansüstü tezleriyle ilgili olmalıdır.',
					'limit'=>array(
						'tip'=>'puan',
						'deger'=>10,
						'tabiolanlar'=>'2toplamp'
					),
					'kosullar'=>array(
						array(
							'islemadi'=>'2lisansustus',
							'kosul'=>'>=',
							'deger'=>1,
							'saglanmazsa'=>'{MNo} maddesinde en az 1 yayın yapmış olmanız gerekir.'
						)
					),
					'alt'=>array(
						array(
							'aciklama'=>'SCI, SCI-Expanded, SSCI , AHCI veya alan indeksleri kapsamındaki dergilerde yayımlanmış makale veya uluslararası yayınevleri tarafından yayımlanmış kitap ya da kitap bölümü',
							'puan'=>10,
							'tip'=>'TBZK',
							'islemler'=>array(
								array(
									'islemadi'=>'2toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								),
								array(
									'islemadi'=>'2lisansustus',
									'islem'=>'+',
									'deger'=>'sayi'
								)
							)
						),
						array(
							'aciklama'=>'Diğer uluslararası ve ulusal hakemli dergilerde yayımlanmış makale',
							'puan'=>5,
							'tip'=>'TBZK',
							'islemler'=>array(
								array(
									'islemadi'=>'2toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								),
								array(
									'islemadi'=>'2lisansustus',
									'islem'=>'+',
									'deger'=>'sayi'
								)
							)
						),
						array(
							'aciklama'=>'Uluslararası sempozyumda/kongrede sunulmuş ve tam metni basılmış alanında bilime katkı sağlayan sözlü bildiri',
							'puan'=>5,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'2toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								),
								array(
									'islemadi'=>'2lisansustus',
									'islem'=>'+',
									'deger'=>'sayi'
								)
							)
						),
						array(
							'aciklama'=>'Ulusal sempozyumda/kongrede sunulmuş ve tam metni basılmış alanında bilime katkı sağlayan sözlü bildiri',
							'puan'=>3,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'2toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								),
								array(
									'islemadi'=>'2lisansustus',
									'islem'=>'+',
									'deger'=>'sayi'
								)
							)
						)
					)
				),
				array(
					'baslik'=>'Kitap',
					'aciklama'=>'Adayın hazırladığı lisansüstü tezlerinden üretilmemiş olmalı ve başvurulan doçentlik bilim alanı ile ilgili olmalıdır. <b>Aynı kitaptan en fazla iki bölüm</b> girilmelidir.',
					'limit'=>array(
						'tip'=>'puan',
						'deger'=>20,
						'tabiolanlar'=>'3toplamp'
					),
					'alt'=>array(
						array(
							'aciklama'=>'Uluslararası yayınevleri tarafından yayımlanmış kitap',
							'puan'=>20,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'3toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Uluslararası yayınevleri tarafından yayımlanmış kitap editörlüğü veya bölüm yazarlığı',
							'puan'=>10,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'3toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Ulusal yayınevleri tarafından yayımlanmış kitap',
							'puan'=>15,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'3toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Ulusal yayınevleri tarafından yayımlanmış kitap editörlüğü veya bölüm yazarlığı',
							'puan'=>8,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'3toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						)
					)
				),
				array(
					'baslik'=>'Yarışma, Uygulama, Yazılım ve Patent',
					'aciklama'=>'Başvurulan doçentlik bilim alanı ile ilgili olmalıdır.',
					'alt'=>array(
						array(
							'aciklama'=>'Geçerli yasa, yönetmelik ve esaslar çerçevesinde, ilgili kuruluşlar (Meslek Odaları, Yerel Yönetimler, Bakanlıklar, Uluslararası Kuruluşlar) tarafından düzenlenen, planlama, mimarlık, kentsel tasarım, peyzaj tasarımı, iç mimari tasarım, endüstri ürünleri tasarımı ve mimarlık temel alanındaki diğer yarışmalarda derece veya mansiyon',
							'puan'=>15,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'4toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Geçerli yasa, yönetmelik ve esaslar çerçevesinde; Döner Sermaye veya üniversiteye bağlı kuruluşlar aracılığı ile veya Üniversite dışında bulunduğu sürede ürettiği bir uygulama projesi hakkında kendisi veya başkası tarafından makale, kitap bölümü veya kitap',
							'puan'=>15,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'4toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Proje ve yapım yönetimi, tasarımı, planlama alanlarında yazılım üreticisi veya patent sahibi olmak',
							'puan'=>15,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'4toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						)
					),
					'kosullar'=>array(
						array(
							'islemadi'=>'4toplamp',
							'kosul'=>'>=',
							'deger'=>15,
							'mantiksal'=>array(
								array(
									'islem'=>'veya',
									'kosuladi'=>'patentyoksask'
								)
							),
							'saglanmazsa'=>'{MNo} maddesinden en az 15 puan almanız veya 1 maddesinde ilk iki alt madde kapsamında en az bir yayın yapmış olmanız gerekir.'
						)
					)
				),
				array(
					'baslik'=>'Atıflar',
					'aciklama'=>'',
					'limit'=>array(
						'tip'=>'puan',
						'deger'=>20,
						'tabiolanlar'=>'5toplamp'
					),
					'kosullar'=>array(
						array(
							'islemadi'=>'5toplamp',
							'kosul'=>'>=',
							'deger'=>4,
							'saglanmazsa'=>'{MNo} maddesinden en az 4 puan almanız gerekir.'
						)
					),
					'alt'=>array(
						array(
							'aciklama'=>'SCI, SCI-Expanded, SSCI ve AHCI tarafından taranan dergilerde; uluslararası yayınevleri tarafından yayımlanmış kitaplarda yayımlanan ve adayın yazar olarak yer almadığı yayınlardan her birinde, metin içindeki atıf sayısına bakılmaksızın adayın atıf yapılan eser sayısı',
							'puan'=>3,
							'tip'=>'ZK',
							'islemler'=>array(
								array(
									'islemadi'=>'5toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'SCI, SCI-Expanded, SSCI ve AHCI dışındaki endeksler tarafından taranan dergilerde; Uluslararası yayınevleri tarafından yayımlanmış kitaplarda bölüm yazarı olarak yayımlanan ve adayın yazar olarak yer almadığı yayınlardan her birinde, metin içindeki atıf sayısına bakılmaksızın adayın atıf yapılan eser sayısı',
							'puan'=>2,
							'tip'=>'ZK',
							'islemler'=>array(
								array(
									'islemadi'=>'5toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Ulusal hakemli dergilerde; Ulusal yayınevleri tarafından yayımlanmış kitaplarda yayımlanan ve adayın yazar olarak yer almadığı yayınlardan her birinde, metin içindeki atıf sayısına bakılmaksızın adayın atıf yapılan eser sayısı',
							'puan'=>1,
							'tip'=>'ZK',
							'islemler'=>array(
								array(
									'islemadi'=>'5toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						)
					)
				),
				array(
					'baslik'=>'Lisansüstü Tez Danışmanlığı',
					'aciklama'=>'Adayın danışmanlığını yürüttüğü tamamlanan lisansüstü tezler',
					'limit'=>array(
						'tip'=>'puan',
						'deger'=>10,
						'tabiolanlar'=>'6toplamp'
					),
					'alt'=>array(
						array(
							'aciklama'=>'Doktora',
							'puan'=>4,
							'tip'=>'sayi',
							'islemler'=>array(
								array(
									'islemadi'=>'6toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Yüksek Lisans',
							'puan'=>2,
							'tip'=>'sayi',
							'islemler'=>array(
								array(
									'islemadi'=>'6toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Doktora (eş danışmanlık)',
							'puan'=>2,
							'tip'=>'sayi',
							'islemler'=>array(
								array(
									'islemadi'=>'6toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Yüksek Lisans (eş danışmanlık)',
							'puan'=>1,
							'tip'=>'sayi',
							'islemler'=>array(
								array(
									'islemadi'=>'6toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						)
					)
				),
				array(
					'baslik'=>'Bilimsel Araştırma Projesi',
					'aciklama'=>'',
					'limit'=>array(
						'tip'=>'puan',
						'deger'=>20,
						'tabiolanlar'=>'7toplamp'
					),
					'alt'=>array(
						array(
							'aciklama'=>'Devam eden veya başarı ile tamamlanmış AB Çerçeve programı bilimsel araştırma projesinde koordinatör/baş araştırmacı olmak',
							'puan'=>15,
							'tip'=>'ZK',
							'islemler'=>array(
								array(
									'islemadi'=>'7toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Devam eden veya başarı ile tamamlanmış AB Çerçeve programı bilimsel araştırma projesinde ortak araştırmacı olmak',
							'puan'=>10,
							'tip'=>'ZK',
							'islemler'=>array(
								array(
									'islemadi'=>'7toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Devam eden veya başarı ile tamamlanmış yukarıdaki iki bent dışındaki uluslararası destekli bilimsel araştırma projelerinde (derleme ve rapor hazırlama çalışmaları hariç) görev almak',
							'puan'=>6,
							'tip'=>'ZK',
							'islemler'=>array(
								array(
									'islemadi'=>'7toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Üniversite dışındaki kamu kurumlarıyla yapılan başarıyla tamamlanmış veya devam eden bilimsel araştırma projelerinde görev almak',
							'puan'=>4,
							'tip'=>'ZK',
							'islemler'=>array(
								array(
									'islemadi'=>'7toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						)
					)
				),
				array(
					'baslik'=>'Bilimsel Toplantı Faaliyeti',
					'aciklama'=>'Başvurulan bilim alanı ile ilgili olmalı ve adayın hazırladığı lisansüstü tezlerden üretilmemiş olmalıdır. <b>Aynı toplantıda sunulan en fazla bir bildiri</b> girilmelidir.',
					'limit'=>array(
						'tip'=>'puan',
						'deger'=>10,
						'tabiolanlar'=>'8toplamp'
					),
					'kosullar'=>array(
						array(
							'islemadi'=>'8toplamp',
							'kosul'=>'>=',
							'deger'=>5,
							'saglanmazsa'=>'{MNo}{AltMNo} maddesinden en az 5 puan almanız gerekir.'
						)
					),
					'alt'=>array(
						array(
							'aciklama'=>'Uluslararası bilimsel toplantılarda sunulan (poster hariç), tam metni veya özeti matbu veya elektronik olarak bildiri kitapçığında yayımlanmış çalışmalar',
							'puan'=>3,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'8toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Ulusal bilimsel toplantılarda sunulan (poster hariç), tam metni veya özeti matbu veya elektronik olarak bildiri kitapçığında yayımlanmış çalışmalar',
							'puan'=>2,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'8toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						)
					)
				),
				array(
					'baslik'=>'Eğitim-Öğretim Faaliyeti',
					'aciklama'=>'Doktora eğitimini tamamladıktan sonra, açık, uzaktan veya yüz yüze ortamlarda verilmiş dersler',
					'limit'=>array(
						'tip'=>'puan',
						'deger'=>4,
						'tabiolanlar'=>'9toplamp'
					),
					'kosullar'=>array(
						array(
							'islemadi'=>'9toplamp',
							'kosul'=>'>=',
							'deger'=>2,
							'saglanmazsa'=>'{MNo}{AltMNo} maddesinden en az 2 puan almanız gerekir.'
						)
					),
					'alt'=>array(
						array(
							'aciklama'=>'Bir dönem yüksek lisans veya doktora dersi',
							'puan'=>3,
							'tip'=>'sayi',
							'islemler'=>array(
								array(
									'islemadi'=>'9toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Bir dönem önlisans veya lisans dersi',
							'puan'=>2,
							'tip'=>'sayi',
							'islemler'=>array(
								array(
									'islemadi'=>'9toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						),
						array(
							'aciklama'=>'Yurtiçi veya YÖK tarafından tanınan yurtdışı yükseköğretim kurumlarında en az 2 yıl eğitim ve öğretim faaliyetinde bulundum:',
							'puan'=>2,
							'tip'=>'evethayir',
							'islemler'=>array(
								array(
									'islemadi'=>'9toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
						)
					)
				)
			)
		);
	}
}
?>