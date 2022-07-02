<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Product;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $products = Product::all();
        return view('entry.add', ['products' => $products]);
    }


    /**
     * Undocumented function
     *
     * @param Entry $entry
     * @return void
     */
    public function edit(Entry $entry)
    {
        $products = Product::all();
        return view('entry.edit', ['products' => $products, 'entry' => $entry]);
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

        Entry::create([
            'quantity' => $request->quantity,
            'price' => $request->price,
            'product_id' => $request->product_id,
        ]);



        $product = Product::find($request->product_id);
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->route('entry_list');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Entry $entry
     * @return void
     */
    public function update(Request $request, Entry $entry)
    {
        $entry->product_id = $request->product_id;

        $product = Product::find($request->product_id);

        if ($entry->quantity < $request->quantity) {
            $product->stock -= ($request->quantity - $entry->quantity);
            $product->stock += $request->quantity;
        }

        if ($entry->quantity > $request->quantity) {
            $product->stock -= $entry->quantity;
            $product->stock += $request->quantity;
        }

        $entry->price = $request->price;
        $entry->quantity = $request->quantity;
        $product->save();
        $entry->save();

        return redirect()->route('entry_list');
    }

    /**
     * Undocumented function
     *
     * @param Entry $entry
     * @return void
     */
    public function delete(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('entry_list');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function show()
    {
        $entries = Entry::all();
        return view('entry.list', ['entries' => $entries]);
    }
}
