<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ShopRepositoryInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $shopRepository;

    public function __construct(ShopRepositoryInterface $shopRepository){
        $this->shopRepository = $shopRepository;
    }

    public function index(){
        $shops = $this->shopRepository->getAll();
        $shops->load('school', 'user');
        $title = 'All Shops';

        return view('admin.shops.index', compact('title', 'shops'));
    }

    public function show($slug){
        $shop = $this->shopRepository->getBySlug($slug);
        $title = 'Shop - '.$shop->business_name;

        return view('admin.shops.show', compact('title', 'shop'));
    }

    public function status($status){
        $shops = $this->shopRepository->getByStatus($status);
        $shops->load('school', 'user');
        $title = ucfirst($status). ' Shops';

        return view('admin.shops.index', compact('shops', 'title'));
    }

    public function update(Request $request, $id){
        $status = $request->input('status');
        $shop = $this->shopRepository->getById($id);

        $update = $this->shopRepository->createOrUpdate(['status' => $status], $shop->id);
        toastr()->success('Status updated successfully!');
        return redirect()->back();
    }
}
