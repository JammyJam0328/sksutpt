<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Track;
use App\Models\Strand;
class TrackStrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academic = Track::create([
            'name' => 'Academic Track',
        ]);
        Strand::create([
            'track_id' => $academic->id,
            'name' => 'ACCOUNTANCY, BUSINESS AND MANAGEMENT (ABM) STRAND',
        ]);
        Strand::create([
            'track_id' => $academic->id,
            'name' => 'HUMANITIES AND SOCIAL SCIENCES STRAND (HUMSS)',
        ]);
        Strand::create([
            'track_id' => $academic->id,
            'name' => 'SCIENCE, TECHNOLOGY, ENGINEERING AND MATHEMATICS (STEM) STRAND',
        ]);
        Strand::create([
            'track_id' => $academic->id,
            'name' => 'GENERAL ACADEMIC STRAND',
        ]);

        $sports = Track::create([
            'name' => 'Sports Track',
        ]);
    }
}