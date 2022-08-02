<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'school_id', 'business_name', 'tagline', 'description', 'logo', 'pictures'];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

}
