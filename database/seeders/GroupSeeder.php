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
            [
                'name' => [
                    'tr' => 'Cephe',
                    'ar' => 'الواجهة'
                ],
                'features' => [
                    ['tr' => 'Batı', 'ar' => 'غرب'],
                    ['tr' => 'Doğu', 'ar' => 'شرق'],
                    ['tr' => 'Güney', 'ar' => 'جنوب'],
                    ['tr' => 'Kuzey', 'ar' => 'شمال'],
                ]
            ],
            [
                'name' => [
                    'tr' => 'İç Özellikler',
                    'ar' => 'الميزات'
                ],
                'features' => [
                    ['tr' => 'ADSL', 'ar' => 'ADSL'],
                    ['tr' => 'Ahşap Doğrama', 'ar' => 'نوافذ خشبية'],
                    ['tr' => 'Akıllı Ev', 'ar' => 'منزل ذكي'],
                    ['tr' => 'Alarm (Hırsız)', 'ar' => 'إنذار (لصوص)'],
                    ['tr' => 'Alarm (Yangın)', 'ar' => 'إنذار (حريق)'],
                    ['tr' => 'Alaturka Tuvalet', 'ar' => 'مرحاض تركي'],
                    ['tr' => 'Alüminyum Doğrama', 'ar' => 'نوافذ ألمنيوم'],
                    ['tr' => 'Amerikan Kapı', 'ar' => 'باب أمريكي'],
                    ['tr' => 'Amerikan Mutfak', 'ar' => 'مطبخ أمريكي'],
                    ['tr' => 'Ankastre Fırın', 'ar' => 'فرن مطبخ مدمج'],
                    ['tr' => 'Barbekü', 'ar' => 'شواية'],
                    ['tr' => 'Beyaz Eşya', 'ar' => 'أجهزة منزلية'],
                    ['tr' => 'Boyalı', 'ar' => 'مطلي'],
                    ['tr' => 'Bulaşık Makinesi', 'ar' => 'غسالة صحون'],
                    ['tr' => 'Buzdolabı', 'ar' => 'ثلاجة'],
                    ['tr' => 'Çamaşır Kurutma Makinesi', 'ar' => 'مجفف ملابس'],
                    ['tr' => 'Çamaşır Makinesi', 'ar' => 'غسالة ملابس'],
                    ['tr' => 'Çamaşır Odası', 'ar' => 'غرفة غسيل'],
                    ['tr' => 'Çelik Kapı', 'ar' => 'باب حديد'],
                    ['tr' => 'Duşakabin', 'ar' => 'كابينة دش'],
                    ['tr' => 'Duvar Kağıdı', 'ar' => 'ورق حائط'],
                    ['tr' => 'Ebeveyn Banyosu', 'ar' => 'حمام رئيسي'],
                    ['tr' => 'Fırın', 'ar' => 'فرن'],
                    ['tr' => 'Fiber İnternet', 'ar' => 'إنترنت ليفي'],
                    ['tr' => 'Giyinme Odası', 'ar' => 'غرفة تبديل ملابس'],
                    ['tr' => 'Gömme Dolap', 'ar' => 'خزانة حائط'],
                    ['tr' => 'Görüntülü Diafon', 'ar' => 'اتصال داخلي مرئي'],
                    ['tr' => 'Hilton Banyo', 'ar' => 'حمام فاخر'],
                    ['tr' => 'Intercom Sistemi', 'ar' => 'نظام اتصال داخلي'],
                    ['tr' => 'Isıcam', 'ar' => 'نوافذ مزدوجة'],
                    ['tr' => 'Jakuzi', 'ar' => 'جاكوزي'],
                    ['tr' => 'Kartonpiyer', 'ar' => 'زخارف سقف'],
                    ['tr' => 'Kiler', 'ar' => 'مخزن'],
                    ['tr' => 'Klima', 'ar' => 'مكيف هواء'],
                    ['tr' => 'Küvet', 'ar' => 'حوض استحمام'],
                    ['tr' => 'Laminat Zemin', 'ar' => 'أرضية لامعة'],
                    ['tr' => 'Marley', 'ar' => 'أرضية مرلي'],
                    ['tr' => 'Mobilya', 'ar' => 'أثاث'],
                    ['tr' => 'Mutfak (Ankastre)', 'ar' => 'مطبخ (مدمج)'],
                    ['tr' => 'Mutfak (Laminat)', 'ar' => 'مطبخ (لامع)'],
                    ['tr' => 'Mutfak Doğalgazı', 'ar' => 'غاز المطبخ'],
                    ['tr' => 'Panjur/Jaluzi', 'ar' => 'ستائر خارجية/جلوازي'],
                    ['tr' => 'Parke Zemin', 'ar' => 'أرضية باركيه'],
                    ['tr' => 'PVC Doğrama', 'ar' => 'نوافذ PVC'],
                    ['tr' => 'Seramik Zemin', 'ar' => 'أرضية سيراميك'],
                    ['tr' => 'Set Üstü Ocak', 'ar' => 'موقد علوي'],
                    ['tr' => 'Spot Aydınlatma', 'ar' => 'إضاءة سبوت'],
                    ['tr' => 'Şofben', 'ar' => 'سخان ماء'],
                    ['tr' => 'Şömine', 'ar' => 'مدفأة'],
                    ['tr' => 'Teras', 'ar' => 'شرفة'],
                    ['tr' => 'Termosifon', 'ar' => 'سخان مياه'],
                    ['tr' => 'Vestiyer', 'ar' => 'مكان تعليق الملابس'],
                    ['tr' => 'Wi-Fi', 'ar' => 'واي فاي'],
                    ['tr' => 'Yüz Tanıma & Parmak İzi', 'ar' => 'تعرف على الوجه وبصمة الإصبع'],
                ]
            ],
        ];

        foreach ($groups as $groupData) {
            $group = Group::create([
                'name' => $groupData['name']
            ]);

            foreach ($groupData['features'] as $featureData) {
                $feature = $group->features()->create([
                    'name' => $featureData
                ]);

                // $feature->categories()->sync([1,2]);
            }
        }
    }
}
