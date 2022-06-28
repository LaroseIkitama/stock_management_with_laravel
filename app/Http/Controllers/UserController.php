<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('user.add');
    }
    public function show(){
        return view('user.list');
    }
}
