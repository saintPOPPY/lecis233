<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        // Assigning variables to sort by 'name' in ascending order in our sql call below
        $sortBy = $request->query('sortBy') ?? 'rating';
        $direction = $request->query('direction') ?? 'desc';

        // Eager loaded products
        // $reviews = Review::with('reviews')->orderBy($sortBy, $direction);

        // Non-eager loaded products
        $reviews = Review::query()->orderBy($sortBy, $direction);
        return response(view('products.show', ['products' => $reviews->paginate(10)]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Review::create($this->validateData($request));
        return redirect()->route('products.show', ['product' => $request->product_id])->with('success', 'Thanks for your review!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->delete();
        
        return redirect()->route('products.show', $review->product_id)->with('success', 'Review was deleted');
    }

    // Validate data
    private function validateData($request) {
        return $request->validate([
            'comment' => 'required',
            'rating' => 'integer|required',
            'product_id' => 'integer|required',
        ]);
    }
}
