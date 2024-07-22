@extends('user.layout')

@section('content')
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="max-w-4xl mx-auto">
            <!-- Title Section -->
            <div class=" dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
                <h1 class="text-4xl font-bold mb-4 text-gray-900 dark:text-white">{{ $newsItem['title'] }}</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                    {{ \Carbon\Carbon::parse($newsItem['date'])->format('F j, Y') }} - {{ $newsItem['category'] }}
                </p>
                <!-- Image Section -->
                <div class="relative w-full h-96 overflow-hidden rounded-lg shadow-lg mb-4">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ $newsItem['image_url'] }}" alt="{{ $newsItem['title'] }}">
                </div>
                <!-- Image Caption -->
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-center">{{ $newsItem['image_caption'] }}</p>
                <!-- Content Section -->
                <div class="prose dark:prose-dark max-w-none">
                    <p class="text-lg text-gray-800 dark:text-gray-300 leading-relaxed">{{ $newsItem['body'] }}</p>
                </div>
            </div>

            <!-- Related News Section -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Related News</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($relatedNews as $related)
                        <a href="{{ route('news.detail', $related['id']) }}" class="flex items-center bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 p-2">
                            <img class="w-16 h-16 object-cover rounded-lg" src="{{ $related['image_url'] }}" alt="{{ $related['title'] }}">
                            <div class="ml-3">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $related['title'] }}</h3>
                                <p class="text-xs text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($related['date'])->format('F j, Y') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
