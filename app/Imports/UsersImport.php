<?php

namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Result([
            'examinee_id' => $row[0],
            'mathematics' => $row[2],
            'english' => $row[5],
            'filipino' => $row[8],
            'science' => $row[11],
            'social_studies' => $row[14],
            'overall_score' => $row[17],
        ]);
    }
}