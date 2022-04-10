<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouping extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function examinationTestCenter()
    {
        return $this->belongsTo(ExaminationTestCenter::class);
    }
    public function permits()
    {
        return $this->hasMany(Permit::class);
    }
}