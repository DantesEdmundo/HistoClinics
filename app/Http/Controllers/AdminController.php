<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getUsersView(){

        $users = DB::table("users")->get();

        return view("admin.users")->with("users", $users);
    }
}
