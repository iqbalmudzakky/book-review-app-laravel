@if ($rating)
  <span class="inline-flex items-center gap-0.5">
    @for ($i = 1; $i <= 5; $i++)
      @if ($i <= round($rating))
        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
          <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
        </svg>
      @else
        <svg class="w-5 h-5 text-slate-600 fill-current" viewBox="0 0 20 20">
          <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
        </svg>
      @endif
    @endfor
  </span>
@else
  <span class="text-slate-500 text-sm">No rating yet</span>
@endif