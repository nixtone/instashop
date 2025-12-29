<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $userGroups = UserGroup::all();

        return view('admin.user.index', compact('users', 'userGroups'));
    }

    public function auth(AuthUserRequest $request)
    {

        $validated = $request->validated();

        $attempt = Auth::attempt(
            [
                'login' => $validated['login'],
                'password' => $validated['password'],
            ],
            $validated['remember']
        );
        if ($attempt) {
            return redirect()->intended(route('admin.index'));
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.index');
    }
}
