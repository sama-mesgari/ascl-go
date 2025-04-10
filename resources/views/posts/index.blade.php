@extends('app')


@section('content')
    <div class="container mx-auto px-4 md:px-0">
      @if(count($posts))
        <div class="my-4">
          <h2 class="font-bold mb-4 text-xl">آخرین مقالات</h2>
          <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 lg:grid-cols-4 sm:grid-cols-2 gap-x-5">
            @foreach($posts as $post)
              <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                <a href="{{ route('posts.show', $post) }}">
                  <img class="object-cover h-[250px] rounded-t-lg w-full" src="{{ \Illuminate\Support\Str::startsWith($post->thumbnail_url, 'https://') ? $post->thumbnail_url : asset('storage/'.$post->thumbnail_url) }}" alt=""/>
                </a>
                <div class="p-5">
                  <a href="{{ route('posts.show', $post) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $post->title }}</h5>
                  </a>
                  <p class="mb-3 font-normal text-gray-700">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 20) }}</p>
                  <a href="{{ route('posts.show', $post) }}"
                     class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    ادامه مطلب
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 14 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      {{ $posts->links() }}
    </div>
@endsection
