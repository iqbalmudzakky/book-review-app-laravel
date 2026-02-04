@extends('layouts.app')

@section('content')
<h1 class="mb-10 text-2xl font-bold">Add a New Review for {{ $book->title }}</h1>

<form action="{{ route('books.reviews.store', $book) }}" method="POST">
  @csrf
  <!-- tambahkan message error di masing2 input -->
  <div>
    <label for="review">Review:</label>

    @error('review')
    <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    <textarea id="review" name="review" required maxlength="1000" class="input mb-4">{{ old('review') }}</textarea>
  </div>

  <div>
    <label for="rating">Rating:</label>

    @error('rating')
    <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror

    <select name="rating" id="rating" required class="input mb-4">
      <option value="" disabled selected>Select rating</option>
      @for ($i = 1; $i <= 5; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit Review</button>
</form>
@endsection