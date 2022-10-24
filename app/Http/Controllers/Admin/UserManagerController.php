<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\ReportViewRepositoryInterface;

class UserManagerController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private ReportViewRepositoryInterface $reportViewRepository;

    public function __construct( UserRepositoryInterface $userRepository,  ReportViewRepositoryInterface $reportViewRepository)
    {
        $this->userRepository = $userRepository;
        $this->reportViewRepository = $reportViewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  = "All Users";
        $users = $this->userRepository->getByRole(5);

        $users->load('profile');
        return view('admin.users.index', compact('title', 'users'));
    }

    public function pending()
    {

        $title  = "Users pending Verification";
        $users = $this->userRepository->getByVerificationStatus(false);
        // dd($users);
        return view('admin.users.index', compact('title', 'users'));
    }

    public function verified()
    {

        $title  = "Verified Users";
        $users = $this->userRepository->getByVerificationStatus(true);
        return view('admin.users.index', compact('title', 'users'));
    }

    public function report()
    {
        $reports = $this->reportViewRepository->getAllReport();
        $title = 'User Reports';
        $unVerifiedUsers = $this->userRepository->getByVerificationStatus();
        $verifiedUsers = $this->userRepository->getByVerificationStatus(true);

        return view('admin.users.report', compact('title', 'reports', 'verifiedUsers', 'unVerifiedUsers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $data['user'] = $this->userRepository->getByUuid($uuid);
        $data['title']  = "User - {$data['user']->profile->first_name}  {$data['user']->profile->surname}";
        return view('admin.users.details', $data);
    }

    public function delete($id)
    {
        $this->userRepository->createOrUpdate(['delete'=> 1], $id);
        toastr()->success('User deleted successfully!');
        return redirect()->back();
    }

    public function verify($uuid, $status)
    {
        $user = $this->userRepository->getByUuid($uuid);
        $this->userRepository->createOrUpdate(['is_verified'=> $status], $user->id);
        toastr()->success('User verification status saved successfully!');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        try{
        $request->validate([
            'uuid' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $this->userRepository->getByUuid($request->uuid);
         $this->userRepository->createOrUpdate([
            'password' => Hash::make($request->password),
         ], $user->id);


        toastr()->success('Password changed successfully!');
        return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
            toastr()->error($e->getMessage());
        }
    }
}
