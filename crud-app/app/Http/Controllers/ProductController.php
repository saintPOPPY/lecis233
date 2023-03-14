<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use \App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): Response
    {
        $products = Product::paginate(10);
        return response(view('products.index', ['products' => $products]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $product = new Product;
        return response(view('products.create', ['product' => $product]));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response 
     * 
     */
    public function store(Request $request): RedirectResponse
    {
        Product::create($this->validateData($request));
        return redirect()->route('products.index')->with('success', 'Product was created successfully');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(string $id): Response
    {   
        $product = Product::with('reviews')->findOrFail($id);
        return response(view('products.show', ['product' => $product]));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): Response
    {
        $product = Product::findOrFail($id);
        return response(view('products.edit', ['product' => $product]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        Product::find($id)->update($this->validateData($request));
        return redirect()->route('products.index')->with('success', 'Product was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product was deleted');
    }

    private function validateData($request) {
        return $request->validate([
            'name' => 'required',
            'price' => 'decimal:2|required',
            'description' => 'required',
            'item_number' => 'integer|required',
            'image' => 'required',
        ]);
    }
}
