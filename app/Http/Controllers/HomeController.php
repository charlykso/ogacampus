<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';

        return view('users.landing-page', compact('title'));
    }

    public function loggedInAccess()
    {
        $user = auth()->user()->load('role');

        switch ($user->role->title) {
            case 'User':
                return redirect()->route('items.index');
                break;
            case 'Admin':
            case 'Staff':
                return redirect()->route('dashboard');
                break;
            default:
                return redirect()->route('landing-page');
                break;
        }
    }

    public function generateUrl(Request $request)
    {
        return response()->json($request->url(), 200);
    }
}
