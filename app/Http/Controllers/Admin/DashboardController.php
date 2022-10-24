<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\ReportViewRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserMonthlyReport;

class DashboardController extends Controller
{

    private UserRepositoryInterface $userRepository;
    private ReportViewRepositoryInterface $reportViewRepository;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( UserRepositoryInterface $userRepository,  ReportViewRepositoryInterface $reportViewRepository )
    {
        $this->userRepository = $userRepository;
        $this->reportViewRepository = $reportViewRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $data['title']  = "Dashboard";

        $data['reports'] = $this->reportViewRepository->getAllReport($request->get('rfilter'));

        return view('admin.dashboard', $data);
    }

    public function profile()
    {
         $data['profile'] = $this->userRepository->getByUuid(Auth::user()->uuid);
         $data['title']  = "Admin - profile";
        return view('admin.account.profile', $data);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

         $this->userRepository->createOrUpdate([
            'password' => Hash::make($request->password)
         ], Auth::Id(), );


        toastr()->success('Password changed successfully!');
        return redirect()->back();

    }
}
