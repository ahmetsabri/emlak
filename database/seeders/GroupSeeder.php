<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            'Cephe' => ['Batı', 'Doğu', 'Güney', 'Kuzey'],
            'İç Özellikler' => [
                'ADSL', 'Ahşap Doğrama', 'Akıllı Ev', 'Alarm (Hırsız)', 'Alarm (Yangın)',
                'Alaturka Tuvalet', 'Alüminyum Doğrama', 'Amerikan Kapı', 'Amerikan Mutfak',
                'Ankastre Fırın', 'Barbekü', 'Beyaz Eşya', 'Boyalı', 'Bulaşık Makinesi',
                'Buzdolabı', 'Çamaşır Kurutma Makinesi', 'Çamaşır Makinesi', 'Çamaşır Odası',
                'Çelik Kapı', 'Duşakabin', 'Duvar Kağıdı', 'Ebeveyn Banyosu', 'Fırın',
                'Fiber İnternet', 'Giyinme Odası', 'Gömme Dolap', 'Görüntülü Diafon',
                'Hilton Banyo', 'Intercom Sistemi', 'Isıcam', 'Jakuzi', 'Kartonpiyer',
                'Kiler', 'Klima', 'Küvet', 'Laminat Zemin', 'Marley', 'Mobilya',
                'Mutfak (Ankastre)', 'Mutfak (Laminat)', 'Mutfak Doğalgazı', 'Panjur/Jaluzi',
                'Parke Zemin', 'PVC Doğrama', 'Seramik Zemin', 'Set Üstü Ocak',
                'Spot Aydınlatma', 'Şofben', 'Şömine', 'Teras', 'Termosifon', 'Vestiyer',
                'Wi-Fi', 'Yüz Tanıma & Parmak İzi',
            ],
            'Dış Özellikler' => [
                'Araç Şarj İstasyonu', '24 Saat Güvenlik', 'Apartman Görevlisi', 'Buhar Odası',
                'Çocuk Oyun Parkı', 'Hamam', 'Hidrofor', 'Isı Yalıtımı', 'Jeneratör',
                'Kablo TV', 'Kamera Sistemi', 'Kreş', 'Müstakil Havuzlu', 'Sauna',
                'Ses Yalıtımı', 'Siding', 'Spor Alanı', 'Su Deposu', 'Tenis Kortu',
                'Uydu', 'Yangın Merdiveni', 'Yüzme Havuzu (Açık)', 'Yüzme Havuzu (Kapalı)',
            ],
            'Muhit' => [
                'Alışveriş Merkezi', 'Belediye', 'Cami', 'Cemevi', 'Denize Sıfır',
                'Eczane', 'Eğlence Merkezi', 'Fuar', 'Göle Sıfır', 'Hastane', 'Havra',
                'İlkokul-Ortaokul', 'İtfaiye', 'Kilise', 'Lise', 'Market', 'Park',
                'Plaj', 'Polis Merkezi', 'Sağlık Ocağı', 'Semt Pazarı', 'Spor Salonu',
                'Şehir Merkezi', 'Üniversite',
            ],
            'Ulaşım' => [
                'Anayol', 'Avrasya Tüneli', 'Boğaz Köprüleri', 'Cadde', 'Deniz Otobüsü',
                'Dolmuş', 'E-5', 'Havaalanı', 'İskele', 'Marmaray', 'Metro', 'Metrobüs',
                'Minibüs', 'Otobüs Durağı', 'Sahil', 'Teleferik', 'TEM', 'Tramvay',
                'Tren İstasyonu', 'Troleybüs',
            ],
            'Manzara' => ['Boğaz', 'Deniz', 'Doğa', 'Göl', 'Havuz', 'Park & Yeşil Alan', 'Şehir'],
            'Konut Tipi' => [
                'Ara Kat', 'Ara Kat Dubleks', 'Bahçe Dubleksi', 'Bahçe Katı', 'Bahçeli',
                'Çatı Dubleksi', 'En Üst Kat', 'Forleks', 'Garaj / Dükkan Üstü', 'Giriş Katı',
                'Kat Dubleksi', 'Loft', 'Müstakil Girişli', 'Ters Dubleks', 'Tripleks',
                'Zemin Kat',
            ],
            'Engelliye ve Yaşlıya Uygun' => [
                'Araç Park Yeri', 'Asansör', 'Banyo', 'Geniş Koridor', 'Giriş / Rampa',
                'Merdiven', 'Mutfak', 'Oda Kapısı', 'Park', 'Priz / Elektrik Anahtarı',
                'Tutamak / Korkuluk', 'Tuvalet', 'Yüzme Havuzu',
            ],
        ];

        foreach ($groups as $group => $features) {
            Group::firstOrCreate(['name' => $group]);
        }
    }
}
