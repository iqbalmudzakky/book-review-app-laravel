@extends('layouts.app')

@section('content')
<div class="container">
  <!-- Header Section -->
  <div class="mb-8 text-center">
    <h1 class="text-5xl font-bold mb-3 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
      Book Reviews
    </h1>
    <p class="text-slate-400 text-lg">Discover and review your favorite books</p>
  </div>

  <!-- Search Bar -->
  <form action="{{ route('books.index') }}" method="GET" class="mb-6 flex items-center gap-3">
    <div class="flex-1 relative">
      <input
        type="text"
        name="title"
        placeholder="🔍 Search books by title..."
        value="{{ request('title') }}"
        class="input h-12 w-full pl-4" />
    </div>
    <input type="hidden" name="filter" value="{{ request('filter') }}" />
    <button type="submit" class="btn h-12 px-8">Search</button>
    <a href="{{ route('books.index') }}" class="btn-secondary h-12 px-8">Clear</a>
  </form>

  <!-- Filter Tabs -->
  <div class="filter-container mb-8">
    @php
    $filters = [
    ''=>'Latest',
    'popular_last_month'=>'Popular Last Month',
    'popular_last_6month'=>'Popular Last 6 Months',
    'highest_rated_last_month'=>'Highest Rated Last Month',
    'highest_rated_last_6month'=>'Highest Rated Last 6 Months',
    ];
    @endphp

    @foreach ($filters as $key => $label)
    <a href="{{ route('books.index', [...request()->query(),'filter' => $key]) }}" class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }}">
      {{ $label }}
    </a>
    @endforeach
  </div>

  <!-- Books Grid -->
  <ul class="space-y-5">
    @forelse ($books as $book)
    <li>
      <div class="book-item group">
        <div class="flex flex-wrap items-center justify-between gap-4">
          <div class="flex-1 min-w-0">
            <a href="{{ route('books.show', $book) }}" class="book-title block mb-2">
              {{ $book->title }}
            </a>
            <span class="book-author">by {{ $book->author }}</span>
          </div>
          <div class="text-right">
            <div class="book-rating flex items-center justify-end gap-1 text-lg">
              <x-star-rating :rating="$book->reviews_avg_rating" />
              <span class="text-slate-300 ml-2 font-semibold">
                {{ $book->reviews_avg_rating ? number_format($book->reviews_avg_rating, 1) : 'N/A' }}
              </span>
            </div>
            <div class="book-review-count">
              {{ $book->reviews_count }} {{Str::plural('review', $book->reviews_count)}}
            </div>
          </div>
        </div>
      </div>
    </li>
    @empty
    <li>
      <div class="empty-book-item">
        <div class="text-6xl mb-4">📚</div>
        <p class="empty-text mb-3">No books found</p>
        <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
      </div>
    </li>
    @endforelse
  </ul>

  <!-- Pagination -->
  @if ($books->count())
  <div class="pagination-container">
    {{ $books->links() }}
  </div>
  @endif
</div>
@endsection