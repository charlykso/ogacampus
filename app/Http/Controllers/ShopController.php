<?php

namespace App\Http\Controllers;

use App\Interfaces\ItemsRepositoryInterface;
use App\Interfaces\ShopRepositoryInterface;

class ShopController extends Controller
{
    private $shopRepository;
    private $itemsRepository;

    public function __construct(ShopRepositoryInterface $shopRepository, ItemsRepositoryInterface $itemsRepository)
    {
        $this->shopRepository = $shopRepository;
        $this->itemsRepository = $itemsRepository;
    }

    public function show($slug)
    {
        $title = 'Shops\'s Information';
        $shop = $this->shopRepository->getByUuid($slug);
        $shop->load('user');

        $imagesArray = [];
        array_push($imagesArray, $shop->cover_image);

        if(!is_null($shop->pictures)) {
            foreach ($shop->pictures as $picture) {
                array_push($imagesArray, $picture);
            }
        }
        $featuredItems = $this->itemRepository->getFeaturedItems(4);
        $featuredItems->load('user');

        return view('users.shops.show', compact('title', 'shop', 'imagesArray', 'featuredItems'));
    }
}
