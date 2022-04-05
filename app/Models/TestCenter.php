<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCenter extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function permits()
    {
        return $this->hasMany(Permit::class);
    }
    public function examinationTestCenter()
    {
        return $this->hasMany(ExaminationTestCenter::class);
    }

}