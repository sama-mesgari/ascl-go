@extends('app')

@section('content')
  <div class="container mx-auto px-4 md:px-0">
    <div class="mt-8 mb-20">
      <div class="relative">
        <div class="swiper" dir="ltr">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img class="h-[500px] object-left rounded-xl object-cover w-full" src="{{ asset('images/main.webp') }}"
                   alt="">
            </div>
            <div class="swiper-slide">
              <img class="h-[500px] objec-left rounded-xl object-cover w-full" src="{{ asset('images/main.webp') }}"
                   alt="">
            </div>
            <div class="swiper-slide">
              <img class="h-[500px] object-left rounded-xl object-cover w-full" src="{{ asset('images/main.webp') }}"
                   alt="">
            </div>
          </div>
          <div class="swiper-pagination"></div>

          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

          <div class="swiper-scrollbar"></div>
        </div>
        <div class="absolute z-10 -bottom-10 bg-white p-8 max-w-[600px] inset-x-0 mx-auto  rounded-2xl">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="flex flex-col justify-center text-center">
              <span class="text-4xl font-bold text-blue-800 counter" data-target="500">0+</span>
              <span class="text-md text-[#717270]">بوستان احیا شده</span>
            </div>
            <div class="flex flex-col justify-center text-center">
              <span class="text-4xl font-bold text-blue-800 counter" data-target="500">0+</span>
              <span class="text-md text-[#717270]">کمپین موفق</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if(count($galleries))
      <div class="mb-16">
        <div class="flex mb-4 items-center justify-between">
          <h2 class="text-2xl font-bold">گالری</h2>
          <a href="{{ route('galleries.index') }}"
             class="inline-block px-5 py-1 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300">
            مشاهده همه
          </a>
        </div>
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
      </div>
    @endif
    @if(count($oldCampaigns))
      <div class="mb-16">
        <div class="flex mb-4 items-center justify-between">
          <h2 class="text-2xl font-bold mb-4">رویداد های گذشته</h2>
          <a href="{{ route('campaigns.index', ['is_old' => true]) }}"
             class="inline-block px-5 py-1 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300">
            مشاهده همه
          </a>
        </div>
        <div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 md:grid-cols-2 lg:grid-cols-4 sm:grid-cols-2 gap-x-5">
          @foreach($oldCampaigns as $campaign)
            <x-campaign :campaign="$campaign"></x-campaign>
          @endforeach
        </div>
      </div>
    @endif
    @if(count($newCampaigns))
      <div class="mb-16">
        <div class="flex mb-4 items-center justify-between">
          <h2 class="text-2xl font-bold mb-4">رویداد های آینده</h2>
          <a href="{{ route('campaigns.index', ['is_old' => false]) }}"
             class="inline-block px-5 py-1 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300">
            مشاهده همه
          </a>
        </div>
        <div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 md:grid-cols-2 lg:grid-cols-4 sm:grid-cols-2 gap-x-5">
          @foreach($newCampaigns as $campaign)
            <x-campaign :campaign="$campaign"></x-campaign>
          @endforeach
        </div>
      </div>
    @endif
    @if(count($posts))
      <div class="mb-4">
        <div class="flex mb-4 items-center justify-between">
          <h2 class="text-2xl font-bold mb-4">آخرین مقالات</h2>
          <a href="{{ route('posts.index') }}"
             class="inline-block px-5 py-1 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300">
            مشاهده همه
          </a>
        </div>
        <div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 md:grid-cols-2 lg:grid-cols-4 sm:grid-cols-2 gap-x-5">
          @foreach($posts as $post)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
              <a href="{{ route('posts.show', $post) }}">
                <img class="object-cover h-[250px] rounded-t-lg w-full"
                     src="{{ \Illuminate\Support\Str::startsWith($post->thumbnail_url, 'https://') ? $post->thumbnail_url : asset('storage/'.$post->thumbnail_url) }}"
                     alt=""/>
              </a>
              <div class="p-5">
                <a href="{{ route('posts.show', $post) }}">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $post->title }}</h5>
                </a>
                <p
                  class="mb-3 font-normal text-gray-700">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 20) }}</p>
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
  </div>
@endsection


@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

  <script>
    const swiper = new Swiper('.swiper', {
      // If we need pagination

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      spaceBetween: 10,
    });
  </script>

  <script>
    function animateCounter(element) {
      let target = +element.getAttribute("data-target");
      let count = 0;
      let step = Math.ceil(target / 100); // Control speed
      let interval = setInterval(() => {
        count += step;
        if (count >= target) {
          count = target;
          clearInterval(interval);
        }
        element.innerText = `${count}+`;
      }, 10);
    }

    let counters = document.querySelectorAll(".counter");
    let observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target); // Stop observing after animation
          }
        });
      },
      {threshold: 0.5}
    );

    counters.forEach((counter) => observer.observe(counter));
  </script>
@endpush


@push('styles')
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />

  <style>
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
    }
  </style>
@endpush
