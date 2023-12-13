<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        $reviews = $product->reviews;

        return view('user.reviews.index', compact('product', 'reviews'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'comment' => 'required',
        ]);

        // Check if the user has already reviewed the product
        $existingReview = Review::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingReview) {
            // If a review already exists, you might want to handle it appropriately,
            // like showing an error message or updating the existing review.
            return redirect()->back()->with('error', 'You have already reviewed this product.');
        }

        // Create a new review
        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $request->product_id;
        $review->comment = $request->comment;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
