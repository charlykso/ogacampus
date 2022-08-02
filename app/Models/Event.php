<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'school_id', 'title', 'slug', 'event_date', 'description', 'pictures', 'isFree', 'ticket_price'];

    public function school(){
      return $this->belongsTo(School::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
}
