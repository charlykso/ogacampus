<?php

namespace App\Repositories;

use App\Interfaces\ProfileRepositoryInterface;
use App\Models\Profile;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function getByColumn($column, $value)
    {
        return Profile::where($column, $value)->firstOrFail();
    }

    public function createOrUpdate(array $data, $profile_id = null)
    {
        if ($profile_id) {
            $profile = Profile::findOrFail($profile_id);
            $profile->update($data);

            return $profile;
        }

        return Profile::create($data);
    }
}
