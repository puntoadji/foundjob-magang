<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.user.list');
    }
}
