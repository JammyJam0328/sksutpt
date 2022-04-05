<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
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
    public function grouping()
    {
        return $this->belongsTo(Grouping::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}