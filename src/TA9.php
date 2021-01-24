<?php

// Huseyin Atasoy
// Ocak 2021

include 'DocentlikCekirdek.php';

class DocentlikHesaplayici extends DocentlikCekirdek
{
	protected $meta=array(
		'tarih'				=>	'12/01/2021',
		'guncellenme'		=>	'24/01/2021',
		'bazAlinanVeriler'	=>	'https://www.uak.gov.tr/Documents/docentlik/2020-ekim-donemi/basvuru-sartlari/TA_Tablo9_2020E_10032020.pdf'
	);

	protected $alanlar=array(
		'901'=>'Atmosfer Bilimleri ve Meteoroloji Mühendisliği',
		'924'=>'Bilgisayar Bilimleri ve Mühendisliği',
		'925'=>'Biyomedikal Mühendisliği',
		'923'=>'Biyomühendislik',
		'903'=>'Çevre Bilimleri ve Mühendisliği',
		'926'=>'Deniz ve Gemi Mühendisliği',
		'905'=>'Elektrik-Elektronik Mühendisliği',
		'927'=>'Elektronik-Haberleşme Mühendisliği',
		'906'=>'Endüstri Mühendisliği',
		'928'=>'Enerji Sistemleri Mühendisliği',
		'908'=>'Gıda Bilimleri ve Mühendisliği',
		'909'=>'Harita Mühendisliği',
		'911'=>'İnşaat Mühendisliği',
		'912'=>'Kimya Mühendisliği',
		'913'=>'Maden Mühendisliği',
		'914'=>'Makine Mühendisliği',
		'915'=>'Malzeme ve Metalurji Mühendisliği',
		'929'=>'Mekatronik Mühendisliği',
		'917'=>'Nükleer Mühendisliği',
		'930'=>'Otomotiv Mühendisliği',
		'918'=>'Petrol Mühendisliği',
		'919'=>'Tekstil Bilimleri ve Mühendisliği',
		'931'=>'Uçak-Havacılık-Uzay Mühendisliği',
		'920'=>'Yer Bilimleri ve Mühendisliği'
	);

	protected $baslik='Mühendislik Temel Alanı';
	protected $aciklama='Mühendislik temel alanında başvurulan doçentlik bilim alanı ile ilgili olarak aşağıdaki çalışmalara verilen birim puanlar esas alınmak suretiyle; en az doksan (90) puanının doktora unvanının alınmasından sonra gerçekleştirilen çalışmalardan elde edilmiş olması kaydıyla, asgari yüz (100) puan karşılığı bilimsel etkinlikte bulunmuş olması gerekir. Her çalışma, tabloda <b>sadece bir bölümde kullanılmalıdır</b>. Tek yazarlı makalelerde yazar tam puan alır. İki yazarlı makalelerde başlıca yazar tam puanın 0.8\'ini, ikinci yazar 0.5\'ini alır. Üç ve daha fazla yazarlı makalelerde ise, başlıca yazar toplam puanın yarısını alır, diğer yazarlar ise diğer yarısını eşit paylaşır. Başlıca yazarın belirtilmediği iki veya daha fazla yazarlı makalelerde toplam puan yazarlar arasında eşit olarak bölünür. Diğer yayınlarda (bildiri,kitap) ise toplam puan yazarlar arasında eşit olarak bölünür.';

	protected $tanimlar=array(
		'SCI–Expanded: Science Citation Index-Expanded',
		'SCI: Science Citation Index',
		'SSCI: Social Sciences Citation Index',
		'AHCI: Art and Humanities Index',
		'ULAKBİM: Ulusal Akademik Ağ ve Bilgi Merkezi',
		'AB Çerçeve Programları: AB tarafından, üye ve aday ülkelerin çeşitli alanlardaki ulusal politika ve uygulamalarının birbirine yakınlaştırılması amacıyla oluşturulan Topluluk Programlarından birisidir.',
		'Başlıca Yazar: Tek yazarlı makalede veya danışmanlığını yaptığı lisansüstü öğrenci(ler) ile birlikte yazılmış makalede (aynı makalede birden fazla öğrenci ve ikinci danışman da yer alabilir) aday, başlıca yazar olarak değerlendirilir.',
		'Ulusal Yayınevi: En az dört yıl ulusal düzeyde düzenli faaliyet yürüten, yayınları Türkiye’deki üniversite kütüphanelerinde kataloglanan ve daha önce aynı alanda farklı yazarlara ait en az 20 kitap yayımlamış yayınevi.',
		'Uluslararası Yayınevi: En az dört yıl uluslararası düzeyde düzenli faaliyet yürüten, yayımladığı kitaplar Yükseköğretim Kurulunca tanınan sıralama kuruluşlarınca belirlenen dünyada ilk 500’e giren üniversite kütüphanelerinde kataloglanan ve aynı alanda farklı yazarlara ait en az 20 kitap yayımlamış olan yayınevi.',
		'Uluslararası Bilimsel Toplantı: Farklı ülkelerden bilim insanlarının bilim kurulunda bulunduğu ve sunumların bilimsel ön incelemeden geçirilerek kabul edildiği toplantı.',
		'Ulusal Bilimsel Toplantı: Ulusal seviyede farklı kurumlardan bilim insanlarının bilim kurulunda bulunduğu ve sunumların bilimsel ön incelemeden geçirilerek kabul edildiği toplantı.',
		'Yayımlanmış Makale: Alanında bilime katkı sağlamış olmak şartıyla özgün matbu veya elektronik ortamda yayımlanmış makale.',
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
							'aciklama'=>'Yabancı uyrukluyum veya yurtdışı doçentlik denkliği başvurusu yaptım:',
							'puan'=>1,
							'tip'=>'evethayir',
							'islemler'=>array(
								array(
									'islemadi'=>'yabanciuyruklup',
									'islem'=>'+',
									'deger'=>'puan'
								)
							),
							'kosullar'=>array(
								array(
									'kosuladi'=>'yabanciuyrukluysa',
									'islemadi'=>'yabanciuyruklup',
									'kosul'=>'=',
									'deger'=>'1'
								)
							)
						),
						array(
							'aciklama'=>'SCI, SCI-Expanded, SSCI veya AHCI kapsamındaki dergilerde yayımlanmış makale',
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
									'islemadi'=>'1scitoplamp,1toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							),
							'kosullar'=>array(
								array(
									'islemadi'=>'1basclicayazars',
									'kosul'=>'>=',
									'deger'=>1,
									'saglanmazsa'=>'{MNo}{AltMNo} maddesinde en az bir yayında başlıca yazar olmanız gerekir.'
								),
								array(
									'islemadi'=>'1scitoplamp',
									'kosul'=>'>=',
									'deger'=>40,
									'mantiksal'=>array(
										array(
											'islem'=>'veya',
											'kosuladi'=>'yabanciuyrukluysa'
										)
									),
									'saglanmazsa'=>'{MNo}{AltMNo} maddesinden en az 40 puan almanız gerekir.'
								),
								array(
									'islemadi'=>'1scitoplamp',
									'kosul'=>'>=',
									'deger'=>48,
									'mantiksal'=>array(
										array(
											'islem'=>'veya',
											'kosuladi'=>'!yabanciuyrukluysa'
										)
									),
									'saglanmazsa'=>'{MNo}{AltMNo} maddesinden en az 48 puan almanız gerekir.'
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
								)
							)
						),
						array(
							'aciklama'=>'ULAKBİM tarafından taranan ulusal hakemli dergilerde yayımlanmış makale',
							'puan'=>8,
							'tip'=>'TBZK',
							'islemler'=>array(
								array(
									'islemadi'=>'1ulakbimtoplamp,1toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							),
							'kosullar'=>array(
								array(
									'islemadi'=>'1ulakbimtoplamp',
									'kosul'=>'>=',
									'deger'=>8,
									'mantiksal'=>array(
										array(
											'islem'=>'veya',
											'kosuladi'=>'yabanciuyrukluysa'
										)
									),
									'saglanmazsa'=>'{MNo}{AltMNo} maddesinden en az 8 puan almanız gerekir.'
								)
							)
						)
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
							'aciklama'=>'SCI, SCI-Expanded, SSCI veya AHCI kapsamındaki dergilerde yayımlanmış makale',
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
					'baslik'=>'Patent',
					'aciklama'=>'Başvurulan doçentlik bilim alanı ile ilgili olmalıdır.',
					'alt'=>array(
						array(
							'aciklama'=>'Uluslararası patent',
							'puan'=>20,
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
							'aciklama'=>'Ulusal patent',
							'puan'=>10,
							'tip'=>'TZK',
							'islemler'=>array(
								array(
									'islemadi'=>'4toplamp,toplamp',
									'islem'=>'+',
									'deger'=>'puan'
								)
							)
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