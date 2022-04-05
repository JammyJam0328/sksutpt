<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTestCenterGroup extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scheduleTestCenter()
    {
        return $this->belongsTo(ScheduleTestCenter::class);
    }

}