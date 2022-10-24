<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ServicesRepositoryInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceRepository;
    private $categoryRepository;

    public function __construct(ServicesRepositoryInterface $serviceRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['url' => $request->getUri()], 200);
        }

        $title = 'All Services';
        $activeTab = 'services';
        $selectedCategory = $request->get('category');
        $categories = $this->categoryRepository->getAll('service');

        $services = $this->serviceRepository->getAllActive($selectedCategory);
        $services->load('user.profile');

        return view('users.services.index', compact('title', 'activeTab', 'services', 'categories', 'selectedCategory'));
    }

    public function show($slug)
    {
        $title = 'Service slug';
        $activeTab = 'about';
        $service = $this->serviceRepository->getByUuid($slug);
        $service->load('user.profile');

        $randomServices = $this->serviceRepository->getRandom(3);
        $randomServices->load('user.profile');

        return view('users.services.show', compact('title', 'activeTab', 'slug', 'service', 'randomServices'));
    }

    public function projects($slug)
    {
        $title = 'Service slug projects';
        $activeTab = 'projects';
        $service = $this->serviceRepository->getByUuid($slug);
        $service->load('user.profile');

        return view('users.services.projects', compact('title', 'activeTab', 'slug', 'service'));
    }

    public function reviews($slug)
    {
        $title = 'Service slug reviews';
        $activeTab = 'reviews';
        $service = $this->serviceRepository->getByUuid($slug);
        $service->load('user.profile');

        return view('users.services.reviews', compact('title', 'activeTab', 'slug', 'service'));
    }
}
