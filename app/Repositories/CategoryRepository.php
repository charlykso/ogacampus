<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll($type = null)
    {
        if (!$type) {
            return Category::all();
        }

        return Category::where('type', strtolower($type))->orderBy('name', 'ASC')->get();
    }

    public function getBySlug($slug)
    {
        return Category::where('slug', $slug)->firstOrFail();
    }
}
