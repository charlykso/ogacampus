<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\EventsRepositoryInterface;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventRepository;
    private $categoryRepository;

    public function __construct(EventsRepositoryInterface $eventRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['url' => $request->getUri()], 200);
        }

        $title = 'All Events';
        $activeTab = 'events';

        $selectedCategory = $request->get('category');

        $events = $this->eventRepository->getAllActive($selectedCategory);
        $events->load('category');
        $categories = $this->categoryRepository->getAll('event');

        return view('users.events.index', compact('title', 'activeTab', 'events', 'categories', 'selectedCategory'));
    }

    public function show($slug)
    {
        $event = $this->eventRepository->getByUuid($slug);
        $title = $event->title;
        $event->load('user.profile', 'school.state');

        $randomEvents = $this->eventRepository->getRandom(3);
        $randomEvents->load('category');

        if ($event->isFree == 1) {
            $readableAmount = 'Free';
        } else {
            if (count($event->ticket_price) > 1) {
                $readableAmount = 'Multi Ticket';
            } else {
                $amount = $event->ticket_price[0]['price'];
                $readableAmount = '&#8358;'.number_format($amount, 2);
            }
        }

        return view('users.events.show', compact('title', 'event', 'randomEvents', 'readableAmount'));
    }
}
