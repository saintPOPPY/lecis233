<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use \App\Models\Review;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): Response
    {
        // Assigning variables to sort by 'name' in ascending order in our sql call below
        $sortBy = $request->query('sortBy') ?? 'name';
        $direction = $request->query('direction') ?? 'asc';

        // Eager loaded products
        // $products = Product::with('products')->orderBy($sortBy, $direction);

        // Non-eager loaded products
        $reviews = Review::query()->orderBy($sortBy, $direction);
        return response(view('reviews.index', ['reviews' => $reviews->paginate(10)]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $review = new Review;
        return response(view('reviews.create', ['review' => $review]));
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
        Review::create($this->validateData($request));
        return redirect()->route('products.index')->with('success', 'Review was created successfully');
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
        $review = Review::findOrFail($id);
        return response(view('reviews.show', ['review' => $review]));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): Response
    {
        $review = Review::findOrFail($id);
        return response(view('reviews.edit', ['review' => $review]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        Review::find($id)->update($this->validateData($request));
        return redirect()->route('products.index')->with('success', 'Review was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('products.index')->with('success', 'Review was deleted');
    }

    private function validateData($request) {
        return $request->validate([
            'comment' => 'required',
            'rating' => 'integer|required',
            'product_id' => 'integer|required',
        ]);
    }
}
