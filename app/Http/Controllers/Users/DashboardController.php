<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Interfaces\SchoolRepositoryInterface;
use App\Interfaces\StateRepositoryInterface;

class DashboardController extends Controller
{
    private $schoolRepository;
    private $stateRepository;

    public function __construct(SchoolRepositoryInterface $schoolRepository, StateRepositoryInterface $stateRepository)
    {
        $this->schoolRepository = $schoolRepository;
        $this->stateRepository = $stateRepository;
    }

    public function index()
    {
        $user = auth()->user();
        $title = 'My Account';
        $user->load('profile', 'school.state');

        return view('users.account.index', compact('title', 'user'));
    }

    public function edit()
    {
        $title = 'Edit Profile';
        $user = auth()->user();
        $user->load('profile', 'school.state');

        return view('users.account.edit', compact('title', 'user'));
    }

    public function verify()
    {
        $title = 'Get Verified';
        $user = auth()->user();
        $user->load('profile.verification');

        return view('users.account.verification', compact('title', 'user'));
    }
}
