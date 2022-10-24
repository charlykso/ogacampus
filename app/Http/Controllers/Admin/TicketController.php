<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\EventsRepositoryInterface;

class TicketController extends Controller
{
    private $orderRepository;
    private $eventRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, EventsRepositoryInterface $eventRepository){
        $this->orderRepository = $orderRepository;
        $this->eventRepository = $eventRepository;
    }

    public function index(){
        $title = 'All Ticket Orders';
        $orders = $this->orderRepository->getAll();
        $orders->load('event', 'user');

        return view('admin.orders.index', compact('title', 'orders'));
    }

    public function status($status){
        $title = ucfirst($status) . ' Orders';
        $orders = $this->orderRepository->getAll($status);
        $orders->load('event', 'user');

        return view('admin.orders.index', compact('title', 'orders'));
    }

    public function show($reference){
        $order = $this->orderRepository->getByReference($reference);
        $title = 'Ticket Order #'.$reference;

        return view('admin.orders.show', compact('title', 'order'));
    }

    public function report(){
        $events = $this->eventRepository->getPaidEvents();
        $events->load('user', 'orders', 'school');
        $title = 'Ticket Payments';
        return view('admin.orders.payment', compact('events', 'title'));
    }
}
