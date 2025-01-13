<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $data = json_decode(file_get_contents(public_path('assets/data.json')), 1);

        foreach ($data as $il) {
            $prov = Province::createOrFirst([
                'name' => $il['name'],
            ]);

            foreach ($il['counties'] as $county) {
                $town = County::createOrFirst([
                    'province_id' => $prov->id,
                    'name' => $county['name'],
                ]);

                foreach ($county['districts'] as $mahalle) {
                    foreach ($mahalle['neighborhoods'] as $m) {
                        District::createOrFirst([
                            'county_id' => $town->id,
                            'name' => $m['name'],
                        ]);
                    }
                }
            }
        }
    }
}
