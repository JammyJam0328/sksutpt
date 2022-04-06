<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campus;
use App\Models\Program;
class OffersSeeder extends Seeder
{
    /**
    
    * Run the database seeds.
    
     *
    
     * @return void
    
     */
    public function run()
    {
            $campus = Campus::create([
                'name'=>"ACCESS Campus"
            ]);
            
             $campus->programs()->create([
                'name'=>"Bachelor in Elementary Education (Level III)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor in Secondary Education major in: (Level III) English"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor in Secondary Education major in: (Level III) Filipino"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor in Secondary Education major in: (Level III) Science"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor in Secondary Education major in: (Level III) Mathematics"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor in Secondary Education major in: (Level III) Social Studies"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Physical Education"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Nursing (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Midwifery"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Medical Technology"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Criminology (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Industrial Security Management"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Agriculture"
            ]);
            $campus->programs()->create([
                'name'=>"Diploma in Teaching"
            ]);

        
//             ISULAN CAMPUS
// *Bachelor of Science in Civil Engineering (Level II)
//  *Bachelor of Science in Computer Engineering (Level III)
//  *Bachelor of Science in Computer Science (Level II)
//  *Bachelor of Science in Information Technology (Level III)
//  *Bachelor of Science in Information System (Level II)
//  *Bachelor in Technical-Vocational Teacher Education (Level II)
//  *Bachelor of Science in Industrial Technology ((Level IV)
//  *Bachelor of Science in Electronics and Communication    Engineering

            
            $campus = Campus::create([
                'name'=>"Isulan Campus"
            ]);

            $campus->programs()->create([
                'name'=>"Bachelor of Science in Civil Engineering (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Computer Engineering (Level III)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Computer Science (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Information Technology (Level III)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Information System (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor in Technical-Vocational Teacher Education (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Industrial Technology ((Level IV)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Electronics and Communication Engineering"
            ]);
        
            $campus = Campus::create([
                'name'=>"Tacurong Campus"
            ]);

            $campus->programs()->create([
                'name'=>"Bachelor of Science in Biology (Level III)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Arts in Economics (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Arts in Political Science (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Hospitality Management (Level III)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Entrepreneurship (Level II)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Accountancy (Level III)"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Accounting Information System"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Environmental Science"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Tourism Management"
            ]);
            $campus->programs()->create([
                'name'=>"Bachelor of Science in Management Accounting"
            ]);
     
        $campus = Campus::create([
            "name" => "Kalamansig Campus"
        ]);

        $campus->programs()->create([
            "name" => "Bachelor of Science in Fisheries (Level III)"
        ]);
        $campus->programs()->create([
            "name" => "Bachelor in Secondary Education major in: (Level II) English"
        ]);
        $campus->programs()->create([
            "name" => "Bachelor in Secondary Education major in: (Level II) Filipino"
        ]);
        $campus->programs()->create([
            "name" => "Bachelor in Secondary Education major in: (Level II) Science"
        ]);
        $campus->programs()->create([
            "name" => "Bachelor in Elementary Education (Level I)"
        ]);
        $campus->programs()->create([
            "name" => "Bachelor of Science in Information Technology (Level II)"
        ]);
        $campus->programs()->create([
            "name" => "Bachelor of Science in Biology"
        ]);
        $campus->programs()->create([
            "name" => "Bachelor of Science in Criminology"
        ]);
        







        $campus = Campus::create([
            "name" => "Bagumbayan Campus"
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness (Level II) '
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Technology and Livelihood Education major in Agri-fishery Arts'
        ]);

    
        $campus = Campus::create([
            "name" => "Palimbang Campus"
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education (Level II) '
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness'
        ]);

        $campus = Campus::create([
            "name" => "Lutayan Campus"
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education (Level II) '
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agriculture'
        ]);

    }
}