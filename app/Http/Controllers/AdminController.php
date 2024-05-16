<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLoginPage()
    {
        return view('admin.admin-auth');
    }

    public function adminLogin(AdminAuthRequest $request)
    {
        $user = User::where('username', $request->username)->first();

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect(route('admin.index'))->with('user', $user);
        }

        return redirect(route('admin.index'));
    }

    public function adminPage(Request $request)
    {
        $all_users = User::all()->except(auth()->id());

        $username_search = $request->username_search;
        $sort_by = $request->sort;

        if ($username_search) {
            $all_users = $all_users->filter(function ($user) use ($username_search) {
                return str_contains($user->username, $username_search);
            });
        }


        if ($sort_by) {
            switch ($sort_by) {
                case 'username_sort':
                    $all_users = $all_users->sortBy('username');
                    break;
                case 'register_date_sort':
                    $all_users = $all_users->sortBy('created_at');
                    break;
            }
        }

        return view('admin.admin', ['users' => $all_users]);
    }

    function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return redirect(route('admin.index'));
    }
}
