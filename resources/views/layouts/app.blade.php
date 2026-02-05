<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Book Reviews</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    * {
      font-family: 'Inter', sans-serif;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      @apply bg-slate-900;
    }

    ::-webkit-scrollbar-thumb {
      @apply bg-slate-700 rounded-full;
    }

    ::-webkit-scrollbar-thumb:hover {
      @apply bg-slate-600;
    }

    .btn {
      @apply bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-lg px-5 py-2.5 text-center font-medium shadow-lg shadow-indigo-500/50 transition-all duration-200 h-10 flex items-center justify-center;
    }

    .btn-secondary {
      @apply bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg px-5 py-2.5 text-center font-medium shadow-lg shadow-slate-900/50 transition-all duration-200 h-10 flex items-center justify-center;
    }

    .input {
      @apply bg-slate-800 border border-slate-700 text-slate-200 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 placeholder-slate-500 transition-all duration-200;
    }

    .filter-container {
      @apply mb-6 flex space-x-2 rounded-xl bg-slate-800/50 p-2 backdrop-blur-sm border border-slate-700/50;
    }

    .filter-item {
      @apply flex w-full items-center justify-center rounded-lg px-4 py-2.5 text-center text-sm font-medium text-slate-400 hover:text-slate-200 transition-all duration-200 cursor-pointer;
    }

    .filter-item-active {
      @apply bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg shadow-indigo-500/30 text-white flex w-full items-center justify-center rounded-lg px-4 py-2.5 text-center text-sm font-medium;
    }

    .book-item {
      @apply text-sm rounded-xl bg-slate-800/50 backdrop-blur-sm p-6 leading-6 text-slate-200 shadow-xl border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300 hover:shadow-indigo-500/20;
    }

    .book-title {
      @apply text-xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent hover:from-indigo-300 hover:to-purple-300 transition-all duration-200;
    }

    .book-author {
      @apply block text-slate-400 text-sm mt-1;
    }

    .book-rating {
      @apply text-sm font-medium text-yellow-400;
    }

    .book-review-count {
      @apply text-xs text-slate-500 mt-1;
    }

    .empty-book-item {
      @apply text-sm rounded-xl bg-slate-800/50 backdrop-blur-sm py-16 px-4 text-center leading-6 text-slate-400 shadow-xl border border-slate-700/50;
    }

    .empty-text {
      @apply font-medium text-slate-400 text-lg;
    }

    .reset-link {
      @apply text-indigo-400 hover:text-indigo-300 underline underline-offset-4 transition-colors duration-200;
    }

    .pagination-container {
      @apply mt-8;
    }
  </style>
  {{-- blade-formatter-enable --}}
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">
  <div class="container mx-auto px-4 py-10 mb-10 max-w-5xl">
    @yield('content')
  </div>
</body>

</html>