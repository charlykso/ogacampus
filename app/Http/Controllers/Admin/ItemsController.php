<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ItemsRepositoryInterface;
use App\Interfaces\ReportViewRepositoryInterface;
use App\Notifications\UserEmailNotification;

class ItemsController extends Controller
{
    private ItemsRepositoryInterface $itemsRepository;
    private ReportViewRepositoryInterface $reportViewRepository;

    public function __construct( ItemsRepositoryInterface $itemsRepository, ReportViewRepositoryInterface $reportViewRepository  )
    {
        $this->itemsRepository = $itemsRepository;
        $this->reportViewRepository = $reportViewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['title']  = "Items";
        $data['items'] = $this->itemsRepository->getAll();
        return view('admin.items.index', $data);
    }

    public function report()
    {

        $data['title']  = "Items Report";

        $data['reports'] = $this->reportViewRepository->getAllReport();

        return view('admin.items.report', $data);
    }

    public function status($status)
    {

        $data['items'] =  $this->itemsRepository->getByStatus($status);

        $data['title']  = ucfirst($status)." items";
        return view("admin.items.index", $data);
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
        $data['items'] = $this->itemsRepository->getByUuid($uuid);
        $data['title']  = "Items - {$data['items']->title}";
        return view('admin.items.details', $data);

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

    public function updatestatus($uuid, Request $request)
    {
        $item = $this->itemsRepository->getByUuid($uuid);
        $item = $this->itemsRepository->createOrUpdate(['status'=> $request->status], $item->id);



        $message = "The Item with title '{$item->title}' status has changed to {$request->status}.";
        $item->user->notify(new UserEmailNotification($message));


        toastr()->success('Item status changed successfully!');
        return redirect()->back();
    }


}
