<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ItemsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    private $itemRepository;
    private $categoryRepository;

    public function __construct(ItemsRepositoryInterface $itemRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function all()
    {
        $title = 'All Items';
        $user = auth()->user();
        $allItems = $this->itemRepository->getUserItems($user->id);

        return view('users.account.items.all', compact('title', 'allItems'));
    }

    public function create()
    {
        $title = 'Post New Item';
        $categories = $this->categoryRepository->getAll('item');

        return view('users.account.items.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string|max:60',
            'condition' => 'required|string',
            'amount' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'type' => 'nullable|string',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('pictures')) {
            $images = $this->checkAndUploadImages('items', $request->pictures);
        } else {
            $images = null;
        }

        $data = [
            'slug' => $this->generateSlug($request->title),
            'title' => strtolower($request->input('title')),
            'category_id' => $request->category_id,
            'condition' => $request->condition,
            'price' => $request->amount * 100,
            'phone_number' => $request->phone_number,
            'type' => $request->type,
            'description' => $request->description,
            'user_id' => $user->id,
            'school_id' => $user->school_id,
            'pictures' => $images,
            'uuid' => Str::uuid(),
        ];

        $this->itemRepository->createOrUpdate($data);

        return response()->json(['message' => 'Item created successfully', 'redirect' => route('account.manage.items.all')], 200);
    }

    public function edit($uuid)
    {
        $item = $this->itemRepository->getByUuid($uuid);
        $title = 'Edit '.$item->title;
        $categories = $this->categoryRepository->getAll('item');

        return view('users.account.items.create', compact('title', 'categories', 'item'));
    }

    public function update(Request $request, $uuid)
    {
        $user = $request->user();
        $item = $this->itemRepository->getByUuid($uuid);
        $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string|max:60',
            'condition' => 'required|string',
            'amount' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'type' => 'nullable|string',
            'description' => 'required|string',
        ]);

        $data = [
            'slug' => $this->generateSlug($request->title),
            'title' => strtolower($request->input('title')),
            'category_id' => $request->category_id,
            'condition' => $request->condition,
            'price' => $request->amount,
            'phone_number' => $request->phone_number,
            'type' => $request->type,
            'description' => $request->description,
            'user_id' => $user->id,
            'school_id' => $user->school_id,
        ];

        if ($request->hasFile('pictures')) {
            $data['images'] = $this->checkAndUploadImages('items', $request->pictures);
        }

        $this->itemRepository->createOrUpdate($data, $item->id);

        return response()->json(['message' => 'Item updated successfully', 'redirect' => route('account.manage.items.all')], 200);
    }
}
