<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\StatusCodeTrait;

class Staff extends Model
{
    use HasFactory, StatusCodeTrait;

    protected $fillable = ['user_id', 'access', 'name', 'status', 'created_by', 'updated_by'];

    protected $casts = [
        'access' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updated_by');
    }

}
