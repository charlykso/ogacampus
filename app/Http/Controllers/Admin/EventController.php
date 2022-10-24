<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\EventsRepositoryInterface;
use App\Notifications\UserEmailNotification;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\ReportViewRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;

class EventController extends Controller
{
    private EventsRepositoryInterface $eventRepository;
    private UserRepositoryInterface $userRepository;
    private ReportViewRepositoryInterface $reportViewRepository;
    private $orderRepository;

    public function __construct( EventsRepositoryInterface $eventRepository,
                                UserRepositoryInterface $userRepository ,
                                ReportViewRepositoryInterface $reportViewRepository,
                                OrderRepositoryInterface $orderRepository  )
    {
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
        $this->reportViewRepository = $reportViewRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['title']  = "All Events";
        $data['events'] = $this->eventRepository->getAll();
        return view('admin.events.index', $data);
    }

    public function report(Request $request)
    {

        $data['title']  = "Event Report";

        $data['reports'] = $this->reportViewRepository->getAllReport();

        return view('admin.events.report', $data);
    }


    public function pipeline($pipeline)
    {
        $data['title']  = ucfirst($pipeline)." Events";
        $data['events'] =  $this->eventRepository->getByStatus($pipeline);

        return view("admin.events.index", $data);
    }


    public function expired()
    {

        $data['title']  = "Expired events";
        $data['events'] =  $this->eventRepository->getExpiredEvent();
        return view('admin.events.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $event = $this->eventRepository->getByUuid($uuid);
        $title  = "Events - {$event->title}";
        $orders = $this->orderRepository->getByEvent($event->id);
        return view('admin.events.details', compact('title', 'event', 'orders'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function statusChange($uuid, $status)
    {
        $this->eventRepository->updateEventUuid($uuid, ['status'=> $status]);

        $event = $this->eventRepository->getByUuid($uuid);
        $message = "The event with title '{$event->title}' status has changed to {$status}.";
        $event->user->notify(new UserEmailNotification($message));

        toastr()->success('Event status changed successfully!');
        return redirect()->back();
    }



}
