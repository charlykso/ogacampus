<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'first_name', 'surname', 'other_name', 'gender', 'course', 'degree_type', 'level'];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
