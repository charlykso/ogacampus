<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function getByRole(int $role)
    {
        return User::where('role_id', $role)->paginate(15);
    }

    public function getByUuid($uuid)
    {
        return User::where('uuid', $uuid)->first();
    }

    public function getById($userId)
    {
        return User::findOrFail($userId);
    }

    public function delete($userId)
    {
        User::destroy($userId);
    }

    public function createOrUpdate(array $data, int $id = null)
    {
        if($id){
            $user = User::findOrFail($id);
            $user->update($data);
            return $user;
        }
        return User::create($data);
    }

    public function getByVerificationStatus($status = null)
    {
        $status = !empty($status) && $status == true ? 1 : 0;
        return User::whereHas('profile', function(Builder $query) use ($status) {
                $query->where('is_verified', $status);
            })->paginate(15);

    }


    public function getBySchool(int $schoolId){
        return User::where('school_id', $schoolId)->paginate(15);
    }

}
