<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $organisasi = Organisasi::count();
        $users = User::count();

        return view('pages.admin.index', compact('organisasi', 'users'));
    }
}
