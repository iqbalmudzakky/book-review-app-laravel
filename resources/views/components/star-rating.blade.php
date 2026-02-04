@if ($rating)
@for ($i = 1; $i <= 5; $i++)
  {{ $i <= round($rating) ? '★' : '☆' }}
  @endfor
  @else
  <span class="text-gray-400">No rating yet</span>
  @endif