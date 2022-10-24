<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\ProfileRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileRepository;
    private $userRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository, UserRepositoryInterface $userRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    public function uploadPhoto(Request $request)
    {
        $user = $request->user();
        $user->load('profile');

        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png',
        ]);

        $upload = $this->fileUploader('profile/photos', $request->file('photo'));

        $data = [
            'photo' => $upload,
        ];

        $this->profileRepository->createOrUpdate($data, $user->profile->id);

        return response()->json(['success' => true, 'message' => 'Photo uploaded successfully', 'image' => $upload], 200);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $user->load('profile');

        $request->validate([
            'school_id' => 'required|integer',
            'phone' => 'required|numeric|unique:users,phone,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'first_name' => 'required|alpha',
            'surname' => 'required|alpha',
            'course' => 'required|string|regex:/^[a-zA-Z\s]*$/',
            'degree_type' => 'required|string',
            'level' => 'required|integer',
        ]);

        $userData = [
            'email' => $request->email,
            'phone' => $request->phone,
            'school_id' => $request->school_id,
        ];

        $this->userRepository->createOrUpdate($userData, $user->id);

        $profileData = [
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'course' => $request->course,
            'degree_type' => $request->degree_type,
            'level' => $request->level,
        ];

        $this->profileRepository->createOrUpdate($profileData, $user->profile->id);

        $request->session()->flash('success', 'Profile updated successfully');

        return redirect()->route('account.dashboard');
    }
}
