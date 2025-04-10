<!DOCTYPE html>
<html
  dir="rtl"
  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta
    charset="utf-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1">

  <title>طبیعت</title>
  <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet"
        type="text/css"/>
  <link rel="stylesheet" href="{{ asset('css/init.css') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'false',
    }
  </script>

  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet"/>
  @stack('styles')
</head>
<body class="bg-gray-100">

<nav dir="ltr" class="bg-white border-gray-100">
  <div
    class="container flex flex-wrap items-center justify-between mx-auto py-4 px-4 md:px-0">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 gap-2 rtl:space-x-reverse">
      <img src="{{ asset('images/logo.png') }}" alt="NSCL-GO" width="50" height="50">
      <span class="self-center text-2xl font-semibold whitespace-nowrap">NSCL-GO</span>
    </a>
    <button
      data-collapse-toggle="navbar-default"
      type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200  -700 -600"
      aria-controls="navbar-default"
      aria-expanded="false">
      <span
        class="sr-only">Open main menu</span>
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 17 14">
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div
      class="hidden w-full md:block md:w-auto"
      id="navbar-default">
      <ul
        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="{{ route('galleries.index') }}"
             class="block py-2 px-3 {{ request()->routeIs('galleries.index') ? 'text-blue-700' : 'text-gray-900' }} rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">گالری</a>
        </li>
        <li>
          <a href="{{ route('campaigns.index', ['is_old' => true]) }}"
             class="block py-2 px-3 {{ request()->routeIs('campaigns.index') && request()->get('is_old', false) == true ? 'text-blue-700' : 'text-gray-900' }} rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">رویداد های گذشته</a>
        </li>
        <li>
          <a href="{{ route('campaigns.index', ['is_old' => false]) }}"
             class="block py-2 px-3 {{ request()->routeIs('campaigns.index') && request()->get('is_old', false) == false ? 'text-blue-700' : 'text-gray-900' }} rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">رویداد های آینده</a>
        </li>
        <li>
          <a
            href="{{ route('posts.index') }}"
            class="block py-2 px-3 {{ request()->routeIs('posts.index') ? 'text-blue-700' : 'text-gray-900' }}  rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">مقالات</a>
        </li>
        <li>
          <a
            href="/"
            class="block py-2 px-3 {{ request()->routeIs('main.page') ? 'text-blue-700' : 'text-gray-900' }} md:hover:text-blue-700 rounded-sm md:bg-transparent md:p-0"
            aria-current="page">خانه</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="min-h-screen relative z-10">
  @yield('content')
</div>

<div class="container mt-10 px-4 md:px-0 mx-auto lg:px-0 pb-8">
  <footer class="bg-white rounded-lg shadow-sm">
    <div class="w-full mx-auto p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/" class="hover:underline">NSCL™</a>. All Rights Reserved.</span>
      <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
          <a href="/" class="hover:underline me-4 md:me-6">خانه</a>
        </li>
        <li>
          <a href="{{ route('posts.index') }}" class="hover:underline me-4 md:me-6">مقالات</a>
        </li>
        <li>
          <a href="{{ route('campaigns.index') }}" class="hover:underline me-4 md:me-6">کمپین ها</a>
        </li>
      </ul>
    </div>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>
