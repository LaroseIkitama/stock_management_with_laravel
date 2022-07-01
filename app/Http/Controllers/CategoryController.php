<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class CategoryController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('category.add');
    }

    /**
     * Undocumented function
     *
     * @param Category $category
     * @return void
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:categories', 'alpha', 'string', 'min:4', 'max:50']
        ]);

        Category::create(
            ['name' => $request->name]
        );
        return redirect()->route('category_list');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Category $category
     * @return void
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category_list');
    }

    /**
     * Undocumented function
     *
     * @param Category $category
     * @return void
     */
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category_list');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show()
    {
        $categories = Category::all();
        return view('category.list', ['categories' => $categories]);
    }
}
