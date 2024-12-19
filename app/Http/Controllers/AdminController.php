<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getUsersView(){

        $users = User::all();

        return view("admin.users")->with("users", $users);
    }
}
