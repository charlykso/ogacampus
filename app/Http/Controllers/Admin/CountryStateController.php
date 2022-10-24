<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\StateRepositoryInterface;

class CountryStateController extends Controller
{

    private CountryRepositoryInterface $countryRepository;
    private StateRepositoryInterface $stateRepository;

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( CountryRepositoryInterface $countryRepository,  StateRepositoryInterface $stateRepository )
    {
        $this->stateRepository = $stateRepository;
        $this->countryRepository = $countryRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] =  $this->countryRepository->getAll();
        return response()->json($data);
    }

    public function fetchState(Request $request)
    {
        $data['states'] = $this->stateRepository->getCountryStates($request->country_id);
        return response()->json($data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
