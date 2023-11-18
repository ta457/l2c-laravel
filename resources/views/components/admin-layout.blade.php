<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Learn2Code') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex h-screen bg-gray-100 dark:bg-gray-900"
  style="{{ Str::contains(request()->route()->uri,'admin-dashboard') ? 'overflow:hidden;' : ''}}">
  <!-- Sidebar -->
  <x-admin-sidebar :active="request()->route()->uri" />

  <div class="flex-1 flex flex-col overflow-hidden">
    {{-- Top navbar --}}
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white dark:bg-gray-800 shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
    @endif

    <!-- Page Content -->
    <main class="pt-4 pb-4 sm:px-6 sm:pt-6 flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900">
      <div class="pt-2 px-4 sm:px-4 sm:pt-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        {{ $slot }}
      </div>
      {{-- paginate --}}
      @if (isset($data))
        <div id="admin-paginate" class="mt-4 px-4 dark:text-white">
          {{ $data->links() }}
        </div>
      @endif
    </main>
  </div>
</body>

<script>
  // handle toggle sidebar ===============================================================
  const toggleSidebarBtn = document.getElementById('toggle-sidebar-btn');
  const sidebar = document.getElementById('default-sidebar');
  toggleSidebarBtn.addEventListener('click', function() {
    sidebar.classList.toggle('hidden');
  });
  document.addEventListener('click', function(event) {
    const isClickInside = sidebar.contains(event.target) || toggleSidebarBtn.contains(event.target);
    if (!isClickInside && !sidebar.classList.contains('hidden')) {
      sidebar.classList.add('hidden');
    }
  });

  // handle delete modal ==============================================================
  function changeDeleteFormAction(url, id) {
    var form = document.getElementById('deleteRecordForm');
    var deleteMessage = document.getElementById('deleteMessage'); 
    form.action = url + id;
    deleteMessage.textContent ='ID = ' + id;
  }

  // handle delete all btn ===========================================================
  function clickDeleteAllBtn() {
    realBtn = document.getElementById('realDeleteAllBtn');
    realBtn.click();
  }

</script>

</html>