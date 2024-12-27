<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Ormawa;

class ListController extends Controller
{
    public function index(){
        $admins = Admin::all();
        $users = User::all();
        $ormawa = Ormawa::all();

        return view('login', compact('admins', 'users', 'ormawa'));
    }
}
