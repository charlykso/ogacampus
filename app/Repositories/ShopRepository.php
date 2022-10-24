<?php

namespace App\Repositories;

use App\Interfaces\ShopRepositoryInterface;
use App\Models\Shop;

class ShopRepository implements ShopRepositoryInterface
{
    public function getAll()
    {
        return Shop::orderBy('created_at', 'desc')->paginate(20);
    }

    public function createOrUpdate(array $data, int $id = null)
    {
        if ($id) {
            $shop = Shop::findOrFail($id);
            $shop->update($data);

            return $shop;
        }

        return Shop::create($data);
    }

    public function getBySchool(int $schoolId)
    {
        return Shop::where('school_id', $schoolId)->paginate(20);
    }

    public function getById(int $id)
    {
        return Shop::findOrFail($id);
    }

    public function getAllByUserId(int $id)
    {
        return Shop::where('user_id', $id)->paginate(20);
    }

    public function getByUuid($uuid)
    {
        return Shop::where('uuid', $uuid)->firstOrFail();
    }

    public function getBySlug(string $slug)
    {
        return Shop::where('slug', $slug)->firstOrFail();
    }

    public function getByStatus(string $status)
    {
        return Shop::where('status', $status)->orderBy('created_at', 'desc')->paginate(20);
    }
}
