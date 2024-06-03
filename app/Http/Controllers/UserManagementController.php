<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(){
        $title = 'User Listing';
        $users = User::orderBy('id', 'DESC')->paginate(10);

        return view('users.index', compact([
            'title',
            'users'
        ]));
    }
}
