<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\VerificationRepositoryInterface;

class VerificationController extends Controller
{
    private $verificationRepository;

    public function __construct(VerificationRepositoryInterface $verificationRepository){
        $this->verificationRepository = $verificationRepository;
    }

    public function index(){
        if(auth()->user()->role_id == 125){
            $verifications = $this->verificationRepository->getAll();
        } else {
            $verifications = $this->verificationRepository->getBySchool(auth()->user()->school_id);
        }
        $title = 'All Verification Requests';

        return view('admin.verifications.index', compact('title', 'verifications'));
    }

    public function status($status){
        $verifications = $this->verificationRepository->getByStatus($status);
        $title = ucfirst($status). ' Verification Requests';

        return view('admin.verifications.index', compact('title', 'verifications'));
    }

    public function update(Request $request, $id){

    }
}
