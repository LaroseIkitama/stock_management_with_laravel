<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function create()
    {
        return view('entry.add');
    }
    public function show()
    {
        return view('entry.list');
    }
}
