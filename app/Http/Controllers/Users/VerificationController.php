<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\ProfileRepositoryInterface;
use App\Interfaces\VerificationRepositoryInterface;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    private $profileRepository;
    private $verificationRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository, VerificationRepositoryInterface $verificationRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->verificationRepository = $verificationRepository;
        $this->middleware('auth');
    }

    public function photo(Request $request)
    {
        $user = $request->user();
        $user->load('profile');

        if ($user->is_verified == 1) {
            return response()->json(['success' => false, 'message' => 'User already verified'], 405);
        }

        $request->validate([
            'id_card' => 'required|mimes:jpeg,jpg,png',
        ]);

        $upload = $this->fileUploader('verifications/id_cards', $request->file('id_card'));

        $data = [
            'profile_id' => $user->profile->id,
            'school_id' => $user->school_id,
            'id_card' => $upload,
        ];

        $this->verificationRepository->createOrUpdate($data, $user->profile->id);

        return response()->json(['success' => true, 'message' => 'ID Card uploaded successfully', 'image' => $upload], 200);
    }
}
