<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('product.add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => ['required', 'unique:products', 'alpha', 'string', 'min:4', 'max:50'],
            'stock' => ['numeric', 'min:0'],
            'category' => ['required', 'numeric']
        ]);
    }
    public function show()
    {
        return view('product.list');
    }
}
