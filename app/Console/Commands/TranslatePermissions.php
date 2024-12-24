<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class TranslatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:translate-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modelTranlations = [
            'AboutUs' => 'Hakkımızda',
            'Category' => 'Kategori',
            'Customer' => 'Müşteri',
            'Document' => 'Belge',
            'Feature' => 'Özellik',
            'Group' => 'Grup',
            'Info' => 'Bilgi',
            'Language' => 'Dil',
            'RealEstate' => 'İlan',
            'Service' => 'Servis',
            'Todo' => 'Görev',
            'User' => 'Ekip üyesi',
        ];

        $actionTranslations = [
            'view-any' => 'görüntüleme',
            'view' => 'görüntüleme',
            'create' => 'oluşturma',
            'update' => 'güncelleme',
            'delete' => 'silme',
            'replicate' => 'kopyalama',
        ];

        foreach (Permission::all() as $permission) {
            $name = explode(' ', $permission->name);

            $translatedName = $modelTranlations[$name[1]].' '.$actionTranslations[$name[0]];

            $permission->update(['translated_name' => ucwords($translatedName)]);
        }
    }
}
