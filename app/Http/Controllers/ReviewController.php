<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ReviewController extends Controller implements HasMiddleware
{
  /**
   * Get the middleware that should be assigned to the controller.
   */
  public static function middleware(): array
  {
    return [
      new Middleware('throttle:reviews', only: ['store']),
    ];
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Book $book)
  {
    return view('books.reviews.create', [
      'book' => $book,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Book $book)
  {
    $data = $request->validate([
      'review' => 'required|string|max:1000|min:10',
      'rating' => 'required|integer|min:1|max:5',
    ]);

    $book->reviews()->create($data);

    return redirect()->route('books.show', $book)->with('success', 'Review added successfully!');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
