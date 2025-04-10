<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
  <a href="{{ route('campaigns.show', $campaign) }}">
    <img class="object-cover h-[250px] rounded-t-lg w-full"
         src="{{ \Illuminate\Support\Str::startsWith($campaign->thumbnail_url, 'https://') ? $campaign->thumbnail_url : asset('storage/'.$campaign->thumbnail_url) }}"
         alt=""/>
  </a>
  <div class="p-5">
    <a href="{{ route('campaigns.show', $campaign) }}">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $campaign->title }}</h5>
    </a>
    <p
      class="mb-3 font-normal text-gray-700">{{ \Illuminate\Support\Str::limit(strip_tags($campaign->content), 20) }}</p>
    <p class="mb-1 text-base font-medium">حمایت های مالی</p>
    <div class="mb-1">
      <span class="text-base font-normal text-gray-700">هدف:</span>
      <span class="text-base font-bold">{{ number_format($campaign->goal_amount, 3) }}</span>
      <span class="text-base font-normal text-gray-700">تومان</span>
    </div>
    <div class="mb-1">
      <span class="text-base font-bold">{{ sprintf('%s درصد', $percentage) }}</span>
      <span class="text-base font-normal text-gray-700">از هدف تامین شد</span>
    </div>
    <div class="mb-1"></div>
    @if($percentage <= 100)
      <div class="max-w- bg-gray-200 rounded-full w-full h-1.5 mb-4">
        <div class="bg-blue-600 h-1.5 rounded-full"
             style="width: {{intval($percentage)}}%"></div>
      </div>
    @endif

    <a href="{{ route('campaigns.show', $campaign) }}"
       class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
      ادامه مطلب
      <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
           xmlns="http://www.w3.org/2000/svg"
           fill="none"
           viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9"/>
      </svg>
    </a>
  </div>
</div>
