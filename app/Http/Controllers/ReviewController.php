<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewDetailResource;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
        //return  Product::find($id)->reviews;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request, Product $product)
    {
        $review = Review::create([
            'product_id' => $request->product->id,
            'name' => $request->name,
            'review' => $request->review,
            'star' => $request->star,
        ]);
        return new ReviewResource($review);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product, Review $review)
    {
        if ($product->id == $review->product_id)
            return new ReviewDetailResource($review);
        return response()->json([
            'message' => 'Record not found.'
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request,Product $product,Review $review)
    {
        $data = Review::findOrFail($review->id);
        $data->name = $request->name;
        $data->review = $request->review;
        $data->star = $request->star;
        $data->save;
        return new ReviewDetailResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,Review $review)
    {
        $review = Review::findOrFail($review->id)->delete();
        return $review;
    }
}
