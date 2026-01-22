<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Services\ReviewService;
use Modules\Product\Http\Requests\StoreReviewRequest;
use Modules\Product\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $reviews = $this->reviewService->all();
        return view('product::reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = $this->reviewService->find($id);
        return view('product::reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = $this->reviewService->find($id);
        return view('product::reviews.edit', compact('review'));
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        $this->reviewService->update($id, $request->validated());

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $this->reviewService->delete($id);
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
