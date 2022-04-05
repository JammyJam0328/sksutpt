<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}