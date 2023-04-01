<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        DB::table('products')->paginate(2)

        return view('products', ['products' => DB::table('products')->latest()->paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AddProducts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'number_of_products' => 'required',
            'price' => 'required',
            'image'
        ]);

        $product = new Product;

//        'product_name' => $request->get('product_name'),
//            'number_of_products' => $request->get('number_of_products'),
//            'price' => $request->get('price')

        $product->product_name = $request->get('product_name');
        $product->number_of_products = $request->get('number_of_products');
        $product->price = $request->get('price');

        if ($request->hasFile('image')) {
//            $product['image'] = $request->file('image')->store('images', 'public');
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect(route('product'))->with('success', 'Product added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->find($id);
        return view('show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')->find($id);
        return view('updateProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'product_name' => 'required',
            'number_of_products' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }
        $product->update($formFields);

        return redirect(route('product'))->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('product'))
            ->with('success', 'Product deleted successfully');
    }
}
