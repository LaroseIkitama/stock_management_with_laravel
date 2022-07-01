<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $categories = Category::all();
        return view('product.add', ['categories' => $categories]);
    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories]);
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
            'description' => ['required', 'unique:products', 'alpha', 'string', 'min:4', 'max:50'],
            'stock' => ['numeric', 'min:0'],
            'category_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
        ]);
        Product::create(
            [
                'description' => $request->description,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]
        );
        return redirect()->route('product_list');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function update(Request $request, Product $product)
    {
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->user_id = $request->user_id;
        $product->save();
        return redirect()->route('product_list');
    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @return void
     */
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product_list');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show()
    {
        $products = Product::all();
        return view('product.list', ['products' => $products]);
    }
}
