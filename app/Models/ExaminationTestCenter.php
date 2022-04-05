<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationTestCenter extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function testCenter()
    {
        return $this->belongsTo(TestCenter::class);
    }
    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
    public function groupings()
    {
        return $this->hasMany(Grouping::class);
    }
}