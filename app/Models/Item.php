<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'category_id', 'description', 'slug', 'school_id', 'price', 'pictures', 'status'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function school(){
      return $this->belongsTo(School::class);
    }
}
