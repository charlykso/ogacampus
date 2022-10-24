<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;
    protected $fillable = ['profile_id', 'school_id','captured_photo', 'id_card', 'status', 'comment', 'staff_id'];

    public function profile(){
        return $this->belongsTo('Profile::class');
    }

    public function staff(){
        return $this->belongsTo('User::class', 'staff_id');
    }
}
