<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ShopRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    private $categoryRepository;
    private $shopRepository;

    public function __construct(ShopRepositoryInterface $shopRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->shopRepository = $shopRepository;
    }

    public function index()
    {
        $title = 'Manage Shops';
        $items = $this->shopRepository->getAllByUserId(auth()->user()->id);
        return view('users.account.shops.index', compact('title', 'items'));
    }

    public function all()
    {
        $title = 'All Shops';
        $user = auth()->user();
        $allShops = $this->shopRepository->getAllByUserId($user->id);

        return view('users.account.shops.all', compact('title', 'allShops'));
    }

    public function create()
    {
        $title = 'Post New Shop';
        $categories = $this->categoryRepository->getAll('item');

        return view('users.account.shops.create', compact('title'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'business_name' => 'required|string|max:60',
            'tagline' => 'nullable|string|max:100',
            'description' => 'required|string|max:1000',
            'cover_image' => 'required|image|mimes:jpeg,jpg,png|max:800',
        ]);

        if ($request->hasFile('pictures')) {
            $images = $this->checkAndUploadImages('items', $request->pictures);
        } else {
            $images = null;
        }

        $data = [
            'slug' => $this->generateSlug($request->business_name),
            'title' => strtolower($request->input('business_name')),
            'business_name' => $request->business_name,
            'tagline' => $request->tagline,
            'description' => $request->description,
            'pictures' => $images,
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'school_id' => $user->school_id,
            'cover_image' => $this->fileUploader('cover_images', $request->file('cover_image')),
        ];

        $this->shopRepository->createOrUpdate($data);

        return response()->json(['message' => 'Shop created successfully', 'redirect' => route('account.manage.shops.all')], 200);
    }

    public function edit($uuid)
    {
        $shop = $this->shopRepository->getByUuid($uuid);
        $title = 'Edit '.$shop->business_name;
        $categories = $this->categoryRepository->getAll('item');

        return view('users.account.shops.create', compact('title', 'categories', 'shop'));
    }

    public function update(Request $request, $uuid)
    {
        $user = $request->user();
        $item = $this->shopRepository->getByUuid($uuid);
        $request->validate([
            'business_name' => 'required|string|max:60',
            'tagline' => 'nullable|string|max:100',
            'description' => 'required|string|max:1000',
        ]);

        $data = [
            'slug' => $this->generateSlug($request->business_name),
            'title' => strtolower($request->input('business_name')),
            'business_name' => $request->business_name,
            'tagline' => $request->tagline,
            'description' => $request->description,
            'user_id' => $user->id,
            'school_id' => $user->school_id,
        ];

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->fileUploader('cover_images', $request->file('cover_image'));
        }

        $this->shopRepository->createOrUpdate($data, $item->id);

        return response()->json(['message' => 'Shop updated successfully', 'redirect' => route('account.manage.shops.all')], 200);
    }
}
