<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function portal()
    {
        return $this->belongsTo(Portal::class);
    }

    public function scheduleTestCenters()
    {
        return $this->hasMany(ScheduleTestCenter::class);
    }
  

}