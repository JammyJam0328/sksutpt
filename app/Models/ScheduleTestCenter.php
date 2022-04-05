<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTestCenter extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function testCenter()
    {
        return $this->belongsTo(TestCenter::class);
    }
    public function scheduleTestCenterGroups()
    {
        return $this->hasMany(ScheduleTestCenterGroup::class);
    }

}