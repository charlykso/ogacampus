<?php

namespace App\Repositories;

use App\Interfaces\ItemsRepositoryInterface;
use App\Models\Category;
use App\Models\Item;

class ItemsRepository implements ItemsRepositoryInterface
{
    public function getAll()
    {
        return auth()->user()->role_id == 5 ?
               Item::where('school_id', auth()->user()->school_id)->get()
               : Item::paginate(15);
    }

    public function getById(int $itemId)
    {
        return Item::findOrFail($itemId);
    }

    public function getByUuid(string $itemUuid)
    {
        return Item::where('uuid', $itemUuid)->firstOrFail();
    }

    public function getUserItems(int $userId)
    {
        return Item::where('user_id', $userId)->paginate(15);
    }

    public function getByCategory(int $category_id)
    {
        return Item::where('category_id', $category_id)->paginate(15);
    }

    public function getCategories()
    {
        return Category::where('type', 'Item')->get();
    }

    public function getFeaturedItems($count = 8)
    {
        return Item::where('school_id', auth()->user()->school_id)->inRandomOrder()->take($count)->get();
    }

    public function getBySlug(string $itemSlug)
    {
        return Item::where('slug', $itemSlug)->firstOrFail();
    }

    public function getByStatus(string $status)
    {
        return Item::where('status', $status)->paginate(15);
    }

    public function delete($itemId)
    {
        Item::destroy($itemId);
    }

    public function createOrUpdate(array $data, int $id = null)
    {
        if ($id) {
            $item = Item::find($id);
            $item->update($data);

            return $item;
        }

        return Item::create($data);
    }
}
