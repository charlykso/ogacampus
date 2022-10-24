<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Http\Requests\UserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\SchoolRepositoryInterface;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private RoleRepositoryInterface $roleRepository;
    private SchoolRepositoryInterface $schoolRepository;

    public function __construct( UserRepositoryInterface $userRepository,  RoleRepositoryInterface $roleRepository,  SchoolRepositoryInterface $schoolRepository )
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->schoolRepository = $schoolRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title  = "Staff";
        $staffs = $this->userRepository->getByRole(25);
        $staffs->load('staff');

        return view('admin.staff.index', compact('title', 'staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title  = "Create new staff";
        $role = $this->roleRepository->getAll();
        $schools = $this->schoolRepository->getAll();

        return view('admin.staff.create', compact('title', 'role', 'schools'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());/
        $request->validate([
            'role_id' => ['required', 'numeric'],
            'name' => ['required'],
            'phone' => ['required', 'numeric', 'min:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $this->userRepository->createOrUpdate
            ([
                'phone'     => $request->input('phone'),
                'role_id'   => $request->input('role_id'),
                'school_id' => 1,
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
        $user->staff()->save(new Staff([
            'name' => $request->input('name'),
            'access' => $request->input('access'),
            'created_by' => auth()->user()->id,
            'status' => 'active'
        ]));
        toastr()->success('Staff registered successfully!');
        return redirect()->route('admin.staff.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $data = ['access' => $request->input('access')];
        $staff = Staff::find($id);
        $staff->update($data);

        toastr()->success('Staff access updated successfully!');
        return redirect()->back();
    }

}
