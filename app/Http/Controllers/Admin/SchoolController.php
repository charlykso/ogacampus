<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\SchoolRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;

class SchoolController extends Controller
{

    private $schoolRepository;
    private $countryRepository;

    public function __construct(SchoolRepositoryInterface $schoolRepository, CountryRepositoryInterface $countryRepository )
    {
        $this->schoolRepository = $schoolRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = "Schools";
        $data['countries'] =  $this->countryRepository->getAll();
        $data['schools'] = $this->schoolRepository->getAll();
        return view('admin.schools.index', $data);
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
        $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'state_id' => ['required', 'numeric']
        ]);

        $this->schoolRepository->createOrUpdate
            ([
                'name'=> $request->name,
                'code'=> $request->code,
                'state_id'=> $request->state_id,
            ]);

        toastr()->success('School created successfully!');
        return redirect()->back();
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


    public function delete($uuid)
    {
        $this->schoolRepository->updateSchool($uuid, ['delete'=> 1]);
        toastr()->success('School deleted successfully!');
        return redirect()->back();
    }
}
