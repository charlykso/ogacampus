<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ItemsRepositoryInterface;

class ItemController extends Controller
{
    private $itemRepository;
    private $categoryRepository;

    public function __construct(ItemsRepositoryInterface $itemRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $title = 'All Items';
        $activeTab = 'items';
        $categories = $this->itemRepository->getCategories();
        $featuredItems = $this->itemRepository->getFeaturedItems();
        $featuredItems->load('user');

        return view('users.items.index', compact('title', 'activeTab', 'categories', 'featuredItems'));
    }

    public function show($slug)
    {
        $title = 'Name of Item';
        $item = $this->itemRepository->getByUuid($slug);
        $item->load('user');
        $randomItems = $this->itemRepository->getFeaturedItems(4);
        $randomItems->load('user');

        return view('users.items.show', compact('title', 'slug', 'item', 'randomItems'));
    }

    public function categories($slug)
    {
        $category = $this->categoryRepository->getBySlug($slug);
        $items = $this->itemRepository->getByCategory($category->id);
        $title = $category->name;
        $activeTab = 'items';

        return view('users.items.categories', compact('title', 'category', 'items', 'activeTab'));
    }
}
