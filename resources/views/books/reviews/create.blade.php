@extends('layouts.app')

@section('content')
<!-- Back Button -->
<div class="mb-6">
  <a href="{{ route('books.show', $book) }}" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors duration-200">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
    </svg>
    Back to {{ $book->title }}
  </a>
</div>

<!-- Form Header -->
<div class="mb-8">
  <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
    Write a Review
  </h1>
  <p class="text-slate-400 text-lg">Share your thoughts about <span class="text-slate-300 font-semibold">{{ $book->title }}</span></p>
</div>

<!-- Review Form -->
<div class="bg-slate-800/50 backdrop-blur-sm rounded-2xl p-8 border border-slate-700/50 shadow-2xl">
  <form action="{{ route('books.reviews.store', $book) }}" method="POST">
    @csrf
    
    <!-- Rating Field -->
    <div class="mb-6">
      <label for="rating" class="block text-slate-300 text-sm font-semibold mb-3">
        Rating <span class="text-red-400">*</span>
      </label>

      @error('rating')
      <div class="mb-3 text-red-400 text-sm flex items-center bg-red-500/10 border border-red-500/30 rounded-lg p-3">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
        </svg>
        {{ $message }}
      </div>
      @enderror

      <div class="grid grid-cols-5 gap-3">
        @for ($i = 1; $i <= 5; $i++)
        <label class="cursor-pointer">
          <input 
            type="radio" 
            name="rating" 
            value="{{ $i }}" 
            {{ old('rating') == $i ? 'checked' : '' }}
            class="peer sr-only" 
            required
          />
          <div class="flex flex-col items-center justify-center p-4 bg-slate-900/50 border-2 border-slate-700 rounded-xl transition-all duration-200 hover:border-indigo-500 peer-checked:border-indigo-500 peer-checked:bg-gradient-to-br peer-checked:from-indigo-600/20 peer-checked:to-purple-600/20 peer-checked:shadow-lg peer-checked:shadow-indigo-500/20">
            <span class="text-3xl mb-1">⭐</span>
            <span class="text-lg font-bold text-slate-300">{{ $i }}</span>
          </div>
        </label>
        @endfor
      </div>
    </div>

    <!-- Review Field -->
    <div class="mb-8">
      <label for="review" class="block text-slate-300 text-sm font-semibold mb-3">
        Your Review <span class="text-red-400">*</span>
      </label>

      @error('review')
      <div class="mb-3 text-red-400 text-sm flex items-center bg-red-500/10 border border-red-500/30 rounded-lg p-3">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
        </svg>
        {{ $message }}
      </div>
      @enderror

      <textarea 
        id="review" 
        name="review" 
        required 
        maxlength="1000" 
        rows="6"
        placeholder="Share your experience with this book..."
        class="input w-full resize-none text-base"
      >{{ old('review') }}</textarea>
      <p class="mt-2 text-sm text-slate-500">Maximum 1000 characters</p>
    </div>

    <!-- Submit Buttons -->
    <div class="flex gap-3">
      <button type="submit" class="btn px-8 py-3 text-base h-auto">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        Submit Review
      </button>
      <a href="{{ route('books.show', $book) }}" class="btn-secondary px-8 py-3 text-base h-auto">
        Cancel
      </a>
    </div>
  </form>
</div>
@endsection