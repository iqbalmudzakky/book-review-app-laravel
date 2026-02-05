@extends('layouts.app')

@section('content')
<!-- Back Button -->
<div class="mb-6">
  <a href="{{ route('books.index') }}" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors duration-200">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
    </svg>
    Back to Books
  </a>
</div>

<!-- Book Header -->
<div class="bg-gradient-to-r from-slate-800/80 to-slate-800/40 backdrop-blur-sm rounded-2xl p-8 mb-8 border border-slate-700/50 shadow-2xl">
  <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
    {{ $book->title }}
  </h1>

  <div class="book-info">
    <div class="book-author mb-6 text-xl text-slate-300">
      by <span class="font-semibold text-slate-200">{{ $book->author }}</span>
    </div>
    
    <div class="flex items-center gap-6 flex-wrap">
      <div class="book-rating flex items-center gap-2">
        <div class="text-2xl">
          <x-star-rating :rating="$book->reviews_avg_rating" />
        </div>
        <span class="text-2xl font-bold text-slate-200">
          {{ $book->reviews_avg_rating ? number_format($book->reviews_avg_rating, 1) : 'N/A' }}
        </span>
      </div>
      <div class="h-8 w-px bg-slate-600"></div>
      <span class="text-slate-400">
        <span class="text-2xl font-semibold text-slate-300">{{ $book->reviews_count }}</span>
        {{ Str::plural('review', $book->reviews_count) }}
      </span>
    </div>
  </div>
</div>

<!-- Add Review Button -->
<div class="mb-8">
  <a href="{{ route('books.reviews.create', $book) }}" class="btn inline-flex items-center text-base px-6 py-3 h-auto">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
    Write a Review
  </a>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="mb-6 rounded-xl bg-gradient-to-r from-green-600/20 to-emerald-600/20 border border-green-500/30 p-4 backdrop-blur-sm">
  <div class="flex items-center">
    <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
    </svg>
    <span class="text-green-300 font-medium">{{ session('success') }}</span>
  </div>
</div>
@endif

<!-- Reviews Section -->
<div>
  <h2 class="text-3xl font-bold mb-6 text-slate-200 flex items-center">
    <svg class="w-8 h-8 mr-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
    </svg>
    Reviews
  </h2>
  
  <ul class="space-y-4">
    @forelse ($book->reviews as $review)
    <li>
      <div class="book-item">
        <div class="flex items-start justify-between mb-4">
          <div class="flex items-center gap-2">
            <div class="text-xl">
              <x-star-rating :rating="$review->rating" />
            </div>
            <span class="text-lg font-bold text-slate-200">{{ number_format($review->rating, 1) }}</span>
          </div>
          <div class="flex items-center text-slate-500 text-sm">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            {{ $review->created_at->format('M j, Y') }}
          </div>
        </div>
        <p class="text-slate-300 leading-relaxed text-base">{{ $review->review }}</p>
      </div>
    </li>
    @empty
    <li>
      <div class="empty-book-item">
        <div class="text-6xl mb-4">💬</div>
        <p class="empty-text text-xl mb-2">No reviews yet</p>
        <p class="text-slate-500">Be the first to review this book!</p>
      </div>
    </li>
    @endforelse
  </ul>
</div>
@endsection