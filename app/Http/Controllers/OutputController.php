<?php

namespace App\Http\Controllers;

use App\Models\Output;
use App\Models\Product;
use Illuminate\Http\Request;

class OutputController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $products = Product::all();
        return view('output.add', ['products' => $products]);
    }


    /**
     * Undocumented function
     *
     * @param Output $output
     * @return void
     */
    public function edit(Output $output)
    {
        $products = Product::all();
        return view('output.edit', ['products' => $products, 'output' => $output]);
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
            'quantity' => ['required', 'numeric', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'product_id' => ['required', 'numeric'],
        ]);

        Output::create([
            'quantity' => $request->quantity,
            'price' => $request->price,
            'product_id' => $request->product_id,
        ]);



        $product = Product::find($request->product_id);
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('output_list');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Output $output
     * @return void
     */
    public function update(Request $request, Output $output)
    {
        $output->product_id = $request->product_id;

        $product = Product::find($request->product_id);

        if ($output->quantity < $request->quantity) {
            $product->stock -= ($request->quantity - $output->quantity);
            $product->stock += $request->quantity;
        }

        if ($output->quantity > $request->quantity) {
            $product->stock -= $output->quantity;
            $product->stock += $request->quantity;
        }

        $output->price = $request->price;
        $output->quantity = $request->quantity;
        $product->save();
        $output->save();

        return redirect()->route('output_list');
    }

    /**
     * Undocumented function
     *
     * @param Output $output
     * @return void
     */
    public function delete(Output $output)
    {
        $output->delete();
        return redirect()->route('output_list');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show()
    {
        $outputs = Output::all();
        return view('output.list', ['outputs' => $outputs]);
    }
}
