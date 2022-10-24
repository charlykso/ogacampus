<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\EventsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    private $categoryRepository;
    private $eventRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, EventsRepositoryInterface $eventRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $title = 'Manage Events';

        return view('users.account.events.index', compact('title'));
    }

    public function all()
    {
        $title = 'All Events';
        $user = auth()->user();
        $allEvents = $this->eventRepository->getUserEvent($user->id);

        return view('users.account.events.all', compact('title', 'allEvents'));
    }

    public function edit($uuid)
    {
        $event = $this->eventRepository->getByUuid($uuid);
        $title = 'Edit '.$event->title;
        $categories = $this->categoryRepository->getAll('event');

        return view('users.account.events.create', compact('title', 'categories', 'event'));
    }

    public function create()
    {
        $title = 'Post New Event';
        $categories = $this->categoryRepository->getAll('event');

        return view('users.account.events.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'pictures' => 'required',
            'time' => 'required',
            'title' => 'required|string|max:60',
            'category_id' => 'required|integer',
            'event_date' => 'required|date|date_format:Y-m-d',
            'event_time' => 'required',
            'organizer' => 'required|string',
            'contact' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'isFree' => 'required',
            'refund_policy' => 'required',
        ]);

        if ($request->hasFile('pictures')) {
            $images = $this->checkAndUploadImages('events', $request->pictures);
        } else {
            $images = null;
        }

        $data = [
            'slug' => $this->generateSlug($request->title),
            'organizer' => ucfirst(strtolower($request->input('organizer'))),
            'title' => strtolower($request->input('title')),
            'event_date' => $request->event_date,
            'event_time' => \Carbon\Carbon::parse($request->time)->format('H:i a'),
            'contact' => $request->contact,
            'isFree' => $request->isFree,
            'address' => $request->address,
            'refund_policy' => $request->refund_policy == 'yes' ? 1 : 0,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => $user->id,
            'school_id' => $user->school_id,
            'pictures' => $images,
            'ticket_price' => json_decode($request->ticket_types),
        ];

        $this->eventRepository->createOrUpdate($data);

        return response()->json(['message' => 'Event created successfully', 'redirect' => route('account.manage.events.all')], 200);
    }

    public function update(Request $request, $uuid)
    {
        $user = $request->user();
        $event = $this->eventRepository->getByUuid($uuid);
        $request->validate([
            'time' => 'required',
            'title' => 'required|string|max:60',
            'category_id' => 'required|integer',
            'event_date' => 'required|date|date_format:Y-m-d',
            'event_time' => 'required',
            'organizer' => 'required|string',
            'contact' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'isFree' => 'required',
            'refund_policy' => 'required',
        ]);

        $data = [
            'slug' => $this->generateSlug($request->title),
            'organizer' => ucfirst(strtolower($request->input('organizer'))),
            'title' => strtolower($request->input('title')),
            'event_date' => $request->event_date,
            'event_time' => \Carbon\Carbon::parse($request->time)->format('H:i a'),
            'contact' => $request->contact,
            'isFree' => $request->isFree,
            'address' => $request->address,
            'refund_policy' => $request->refund_policy == 'yes' ? 1 : 0,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => $user->id,
            'school_id' => $user->school_id,
            'uuid' => Str::uuid(),
            'ticket_price' => json_decode($request->ticket_types),
        ];
        if ($request->has('pictures')) {
            $data['images'] = $this->checkAndUploadImages('events', $request->pictures);
        }

        $this->eventRepository->createOrUpdate($data, $event->id);

        return response()->json(['message' => 'Event updated successfully', 'redirect' => route('account.manage.events.all')], 200);
    }
}
