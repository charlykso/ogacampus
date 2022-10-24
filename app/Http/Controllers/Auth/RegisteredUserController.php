<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\ProfileRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\SchoolRepositoryInterface;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    private $schoolRepository;
    private $roleRepository;
    private $profileRepository;

    public function __construct(
        SchoolRepositoryInterface $schoolRepository,
        RoleRepositoryInterface $roleRepository,
        ProfileRepositoryInterface $profileRepository
    ) {
        $this->schoolRepository = $schoolRepository;
        $this->profileRepository = $profileRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = 'Create Account';
        $schools = $this->schoolRepository->getAll();

        return view('auth.register', compact('title', 'schools'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'agree' => ['required'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'school_id' => ['required'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'school_id' => $request->school_id,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role_id' => $this->roleRepository->getByTitle('User')->id,
            'uuid' => $this->generateUniqueId(15),
            'email_verified_at' => now()
        ]);

        $profile = $this->profileRepository->createOrUpdate([
            'first_name' => $request->first_name,
            'surname' => $request->last_name,
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('landing-page');
    }
}
