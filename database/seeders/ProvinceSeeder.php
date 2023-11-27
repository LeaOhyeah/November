<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $dataProvinces = [
            ['id' => 1, 'name' => 'ACEH'],
            ['id' => 2, 'name' => 'SUMATERA UTARA'],
            ['id' => 3, 'name' => 'SUMATERA BARAT'],
            ['id' => 4, 'name' => 'RIAU'],
            ['id' => 5, 'name' => 'JAMBI'],
            ['id' => 6, 'name' => 'SUMATERA SELATAN'],
            ['id' => 7, 'name' => 'BENGKULU'],
            ['id' => 8, 'name' => 'LAMPUNG'],
            ['id' => 9, 'name' => 'KEPULAUAN BANGKA BELITUNG'],
            ['id' => 10, 'name' => 'KEPULAUAN RIAU'],
            ['id' => 11, 'name' => 'DKI JAKARTA'],
            ['id' => 12, 'name' => 'JAWA BARAT'],
            ['id' => 13, 'name' => 'JAWA TENGAH'],
            ['id' => 14, 'name' => 'DI YOGYAKARTA'],
            ['id' => 15, 'name' => 'JAWA TIMUR'],
            ['id' => 16, 'name' => 'BANTEN'],
            ['id' => 17, 'name' => 'BALI'],
            ['id' => 18, 'name' => 'NUSA TENGGARA BARAT'],
            ['id' => 19, 'name' => 'NUSA TENGGARA TIMUR'],
            ['id' => 20, 'name' => 'KALIMANTAN BARAT'],
            ['id' => 21, 'name' => 'KALIMANTAN TENGAH'],
            ['id' => 22, 'name' => 'KALIMANTAN SELATAN'],
            ['id' => 23, 'name' => 'KALIMANTAN TIMUR'],
            ['id' => 24, 'name' => 'KALIMANTAN UTARA'],
            ['id' => 25, 'name' => 'SULAWESI UTARA'],
            ['id' => 26, 'name' => 'SULAWESI TENGAH'],
            ['id' => 27, 'name' => 'SULAWESI SELATAN'],
            ['id' => 28, 'name' => 'SULAWESI TENGGARA'],
            ['id' => 29, 'name' => 'GORONTALO'],
            ['id' => 30, 'name' => 'SULAWESI BARAT'],
            ['id' => 31, 'name' => 'MALUKU'],
            ['id' => 32, 'name' => 'MALUKU UTARA'],
            ['id' => 33, 'name' => 'PAPUA'],
            ['id' => 34, 'name' => 'PAPUA BARAT'],
            ['id' => 35, 'name' => 'PAPUA SELATAN'],
            ['id' => 36, 'name' => 'PAPUA TENGAH'],
            ['id' => 37, 'name' => 'PAPUA PEGUNUNGAN'],
            ['id' => 38, 'name' => 'PAPUA BARAT DAYA'],
        ];

        foreach ($dataProvinces as $key => $province) {
            Province::create($province);
        }
    }
}
