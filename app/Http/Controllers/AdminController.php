<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAuthRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLoginPage()
    {
        return view('admin.admin-auth');
    }

    public function adminLogin(AdminAuthRequest $request)
    {
        return redirect(route('admin.index'));
    }

    public function adminPage()
    {
        return view('admin.admin');
    }
}
