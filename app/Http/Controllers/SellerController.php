<?php

namespace App\Http\Controllers;

use App\Interfaces\EventsRepositoryInterface;
use App\Interfaces\ItemsRepositoryInterface;
use App\Interfaces\ServicesRepositoryInterface;
use App\Interfaces\ShopRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class SellerController extends Controller
{
    private $userRepository;
    private $shopRepository;
    private $itemsRepository;
    private $eventsRepository;
    private $servicesRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ItemsRepositoryInterface $itemsRepository,
        ShopRepositoryInterface $shopRepository,
        EventsRepositoryInterface $eventsRepository,
        ServicesRepositoryInterface $servicesRepository
    ) {
        $this->userRepository = $userRepository;
        $this->servicesRepository = $servicesRepository;
        $this->shopRepository = $shopRepository;
        $this->itemsRepository = $itemsRepository;
        $this->eventsRepository = $eventsRepository;
    }

    public function show($slug)
    {
        $title = 'Seller\'s Information';
        $seller = $this->userRepository->getByUuid($slug);
        $seller->load('profile', 'school.state');

        return view('users.sellers.show', compact('title', 'seller'));
    }

    public function items($slug)
    {
        $title = 'Seller\'s Items';
        $seller = $this->userRepository->getByUuid($slug);
        $items = $this->itemsRepository->getUserItems($seller->id);

        return view('users.sellers.items', compact('title', 'items'));
    }

    public function services($slug)
    {
        $title = 'Seller\'s Services';
        $seller = $this->userRepository->getByUuid($slug);
        $services = $this->servicesRepository->getUserService($seller->id);
        $seller->load('profile');

        return view('users.sellers.services', compact('title', 'services', 'seller'));
    }

    public function events($slug)
    {
        $title = 'Seller\'s Events';
        $seller = $this->userRepository->getByUuid($slug);
        $events = $this->eventsRepository->getUserEvent($seller->id);

        return view('users.sellers.events', compact('title', 'events'));
    }

    public function shops($slug)
    {
        $title = 'Seller\'s Shops';
        $seller = $this->userRepository->getByUuid($slug);
        $shops = $this->shopRepository->getAllByUserId($seller->id);

        return view('users.sellers.shops', compact('title', 'shops'));
    }
}
