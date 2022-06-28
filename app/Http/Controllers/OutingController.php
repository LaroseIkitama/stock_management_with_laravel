<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutingController extends Controller
{
    public function create()
    {
        return view('outing.add');
    }
    public function show()
    {
        return view('outing.list');
    }
}
