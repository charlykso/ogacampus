<?php

namespace App\Repositories;

use App\Interfaces\SchoolRepositoryInterface;
use App\Models\School;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function getAll()
    {
        return School::orderBy('name')->paginate(15);
    }

    public function fetchAll()
    {
        return School::orderBy('name')->get();
    }

    public function getById($schoolId)
    {
        return School::findOrFail($schoolId);
    }

    public function delete($schoolId)
    {
        School::destroy($schoolId);
    }

    public function createOrUpdate(array $data, int $schoolId = null)
    {
        return School::create($data);
    }

    public function fetchAllByOrder($table, $dir = 'DESC')
    {
        return School::orderBy($table, $dir)->get();
    }
}
