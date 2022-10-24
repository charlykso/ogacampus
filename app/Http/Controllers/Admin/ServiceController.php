<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ServicesRepositoryInterface;
use App\Interfaces\ReportViewRepositoryInterface;
use App\Notifications\UserEmailNotification;

class ServiceController extends Controller
{
    private ServicesRepositoryInterface $servicesRepository;
    private ReportViewRepositoryInterface $reportViewRepository;

    public function __construct( ServicesRepositoryInterface $servicesRepository, ReportViewRepositoryInterface $reportViewRepository  )
    {
        $this->servicesRepository = $servicesRepository;
        $this->reportViewRepository = $reportViewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['title']  = "All Services";
        $data['services'] = $this->servicesRepository->getAll();
        return view('admin.services.index', $data);
    }

    public function report()
    {

        $data['title']  = "Services Report";

        $data['reports'] = $this->reportViewRepository->getAllReport();

        return view('admin.services.report', $data);
    }

    public function pipeline($pipeline)
    {

        $data['title']  = ucfirst($pipeline)." services";
        $data['services'] =  $this->servicesRepository->getByStatus($pipeline);

        return view("admin.services.index", $data);
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
        $data['services'] = $this->servicesRepository->getByUuid($uuid);

        $data['title']  = "Service - {$data['services']->title}";
        return view('admin.services.details', $data);

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
        $service = $this->servicesRepository->getByUuid($uuid);

        $this->servicesRepository->createOrUpdate(['status'=> $status], $service->id);
        $message = "The service with title '{$service->title}' status has changed to {$status}.";
        $service->user->notify(new UserEmailNotification($message));


        toastr()->success('Service status changed successfully!');
        return redirect()->back();
    }


}
