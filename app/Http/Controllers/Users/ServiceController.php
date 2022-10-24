<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ServicesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    private $serviceRepository;
    private $categoryRepository;

    public function __construct(ServicesRepositoryInterface $serviceRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $title = 'Manage Services';

        return view('users.account.services.index', compact('title'));
    }

    public function all()
    {
        $title = 'All Services';
        $user = auth()->user();
        $allServices = $this->serviceRepository->getUserService($user->id);
        $allServices->load('user');

        $user->load('profile');

        return view('users.account.services.all', compact('title', 'allServices', 'user'));
    }

    public function create()
    {
        $title = 'Post New Service';
        $categories = $this->categoryRepository->getAll('service');

        return view('users.account.services.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'service_name' => 'required|string|max:60',
            'category_id' => 'required|integer',
            'tagline' => 'nullable|string|max:100',
            'description' => 'required|string|max:1000',
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:800',
        ]);

        if ($request->hasFile('pictures')) {
            $images = $this->checkAndUploadImages('items', $request->pictures);
        } else {
            $images = null;
        }

        $data = [
            'slug' => $this->generateSlug($request->service_name),
            'service_name' => $request->service_name,
            'description' => $request->description,
            'pictures' => $images,
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'school_id' => $user->school_id,
            'logo' => $this->fileUploader('cover_images', $request->file('logo')),
        ];

        $this->serviceRepository->createOrUpdate($data);

        return response()->json(['message' => 'Service created successfully', 'redirect' => route('account.manage.services.all')], 200);
    }

    public function edit($uuid)
    {
        $service = $this->serviceRepository->getByUuid($uuid);
        $title = 'Edit '.$service->title;
        $categories = $this->categoryRepository->getAll('service');

        return view('users.account.services.create', compact('title', 'categories', 'service'));
    }

    public function update(Request $request, $uuid)
    {
        $user = $request->user();
        $item = $this->serviceRepository->getByUuid($uuid);
        $request->validate([
            'service_name' => 'required|string|max:60',
            'tagline' => 'nullable|string|max:100',
            'description' => 'required|string|max:1000',
        ]);

        $data = [
            'slug' => $this->generateSlug($request->service_name),
            'service_name' => $request->service_name,
            'description' => $request->description,
        ];

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->fileUploader('cover_images', $request->file('logo'));
        }

        $this->serviceRepository->createOrUpdate($data, $item->id);

        return response()->json(['message' => 'Service updated successfully', 'redirect' => route('account.manage.services.all')], 200);
    }
}
