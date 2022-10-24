<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giveaway extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'staff_id', 'type', 'school_id', 'max_count', 'beneficiaries', 'is_active', 'amount'];

    protected $casts = [
        'is_active' => 'boolean',
        'beneficiaries' => 'json'
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function getBeneficiariesAttribute($value){
        $results = json_decode($value, true);
        $res = [];
        if(is_array($results)){
            foreach($results as $key => $value){
                $beneficiary = [
                    'time' => date('Y-m-d H:i:s', $value),
                    'profile' => Profile::where('id', $key)->first()
                ];
                array_push($res, $beneficiary);
            }
        }
            return $res;

    }

    public function staff(){
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }
}
