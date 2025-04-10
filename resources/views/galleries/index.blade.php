@extends('app')

@section('content')
  <div class="container my-10 mx-auto px-4 md:px-0">
    <h2 class="text-2xl mb-4 font-bold">گالری</h2>
    @if(count($galleries))
      <div id="gallery" class="relative">
        @foreach ($galleries as $gallery)
          <div class="gallery-box rounded overflow-hidden shadow">
            <img
              src="{{ asset('storage/' . $gallery->thumbnail_url) }}"
              alt="{{ $gallery->title }}"
              class="w-full h-full object-cover"
              loading="lazy"
              onload="triggerLayout();"
            >
          </div>
        @endforeach
      </div>
    @endif

    {{ $galleries->links() }}
  </div>
@endsection
@push('scripts')
  <script>
    let layoutQueued = false;

    function triggerLayout() {
      if (layoutQueued) return;
      layoutQueued = true;

      setTimeout(() => {
        const images = Array.from(document.querySelectorAll('.gallery-box img'));
        justifyGallery(images, '#gallery');
      }, 100); // wait for images to load
    }

    window.addEventListener('resize', () => {
      const images = Array.from(document.querySelectorAll('.gallery-box img'));
      justifyGallery(images, '#gallery');
    });
  </script>
@endpush
