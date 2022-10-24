<?php
namespace App\Repositories;

use App\Interfaces\GiveawayRepositoryInterface;
use App\Models\Giveaway;

class GiveawayRepository implements GiveawayRepositoryInterface
{
    public function createOrUpdate(array $data, int $id = null){
        if($id){
            $giveaway = Giveaway::findOrFail($id);
            if(count($data['beneficiaries']) >= $data['max_count']){
                $data['is_active'] = false;
            }
            $giveaway->update($data);
            return $giveaway;
        }
        $data['staff_id'] = auth()->user()->id;
        return Giveaway::create($data);
    }

    public function getAll(){
        return Giveaway::orderBy('created_at', 'desc')->paginate(20);
    }

    public function getBySchool(int $schoolId){
        return Giveaway::orderBy('created_at', 'desc')
                ->where('school_id', $schoolId)
                ->paginate(20);
    }

    public function getActiveGiveaways(int $schoolId = null){
        return ($schoolId) ?
                Giveaway::orderBy('created_at', 'desc')
                ->where(['school_id' => $schoolId, 'is_active' => 1])
                ->paginate(20) :
                Giveaway::orderBy('created_at', 'desc')
                ->where('is_active', 1)
                ->paginate(20);
    }

    public function getByStaff(int $staffId){
        return Giveaway::orderBy('created_at', 'desc')
                ->where('staff_id', $staffId)
                ->paginate(20);
    }
}
