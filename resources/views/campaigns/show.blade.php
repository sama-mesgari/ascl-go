@extends('app')

@section('content')
  <section id="show-content">
    <div class="container my-8 mx-auto px-4 md:px-0">
      <div class="bg-white rounded-2xl p-8">
        <img class="!mt-0 rounded-2xl mb-4" src="{{ \Illuminate\Support\Str::startsWith($campaign->thumbnail_url, 'https://') ? $campaign->thumbnail_url : asset('storage/'.$campaign->thumbnail_url) }}" alt="{{ $campaign->title }}">
        <h1 class="mb-2 font-bold text-2xl">{{ $campaign->title }}</h1>
        {!! $campaign->content !!}
      </div>
    </div>
  </section>
@endsection
