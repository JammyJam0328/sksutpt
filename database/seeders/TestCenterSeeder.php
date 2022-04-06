<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TestCenter;
class TestCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 40
        TestCenter::create([
            'name'=>'SKSU ACCESS Campus',
        ]);
        // 20
        TestCenter::create([
            'name'=>'SKSU Isulan Campus',
        ]);
        // 20
        TestCenter::create([
            'name'=>'SKSU Tacurong Campus',
        ]);
        // 9
        TestCenter::create([
            'name'=>'SKSU Bagumbayan Campus',
        ]);
        // 10
        TestCenter::create([
            'name'=>'SKSU Kalamansig Campus',
        ]);
        // AM only ID 6 and 7
        // 8
        TestCenter::create([
            'name'=>'SKSU Palimbang Campus',
        ]);
        // 9
        TestCenter::create([
            'name'=>'SKSU Lutayan Campus',
        ]);
    
    }
}