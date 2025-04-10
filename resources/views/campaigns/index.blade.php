@extends('app')

@section('content')
  <div class="container my-10 mx-auto px-4 md:px-0">
    @if(count($campaigns))
      <div class="mb-16">
        <h2 class="font-bold mb-4 text-2xl">رویداد های {{ request()->get('is_old', false) ? 'آینده' : 'گذشته' }}</h2>
        <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 lg:grid-cols-4 sm:grid-cols-2 gap-x-5">
          @foreach($campaigns as $campaign)
            <x-campaign :campaign="$campaign"></x-campaign>
          @endforeach
        </div>
      </div>
    @endif

    {{ $campaigns->links() }}
  </div>
@endsection
