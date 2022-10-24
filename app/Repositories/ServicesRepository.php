<?php

namespace App\Repositories;

use App\Interfaces\ServicesRepositoryInterface;
use App\Models\Service;

class ServicesRepository implements ServicesRepositoryInterface
{
    public function getAll()
    {
        return Service::paginate(15);
    }

    public function getById($serviceId)
    {
        return Service::findOrFail($serviceId);
    }

    public function getRandom($number = 2)
    {
        return Service::active()->take($number)->get()->shuffle();
    }

    public function getByUuid($uuid)
    {
        return Service::where('uuid', $uuid)->firstOrFail();
    }

    public function getAllActive($category = null, $price = null)
    {
        $query = Service::query();

        $query->when($category, function ($q) use ($category) {
            return $q->where('category_id', $category);
        });
        // $query->when($price, function ($q) {
        //     return $q->orderBy('created_at', request('ordering_rule', 'desc'));
        // });

        return $query->active()->paginate(15);
    }

    public function getByStatus($status)
    {
        return Service::where('status', $status)->paginate(15);
    }

    public function delete($serviceId)
    {
        Service::destroy($serviceId);
    }

    public function createOrUpdate(array $data, int $id = null)
    {
        if ($id) {
            $service = Service::findOrFail($id);
            $service->update($data);

            return $service;
        }

        return Service::create($data);
    }

    public function getUserService(int $userId)
    {
        return Service::whereUserId($userId)->paginate(15);
    }

    public function getSchoolService(int $schoolId)
    {
        return Service::whereSchoolId($schoolId)->paginate(15);
    }
}
