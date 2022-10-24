<?php

namespace App\Repositories;

use App\Interfaces\VerificationRepositoryInterface;
use App\Models\Verification;

class VerificationRepository implements VerificationRepositoryInterface
{
    public function createOrUpdate(array $data, int $id = null)
    {
        $verification = Verification::where('id', $id)->orWhere('profile_id', $id)->first();

        if ($verification) {
            $verification->update($data);

            return $verification;
        }

        return Verification::create($data);
    }

    public function getAll()
    {
        return Verification::orderBy('created_at', 'desc')->paginate(20);
    }

    public function getBySchool(int $schoolId)
    {
        return Verification::orderBy('created_at', 'desc')->where('school_id', $schoolId)->paginate(20);
    }

    public function getByStatus(string $status = 'pending')
    {
        return Verification::orderBy('created_at', 'desc')->where('status', $status)->paginate(20);
    }

    public function getByStaff(int $staffId)
    {
        return Verification::orderBy('created_at', 'desc')->where('staff_id', $staffId)->paginate(20);
    }
}
