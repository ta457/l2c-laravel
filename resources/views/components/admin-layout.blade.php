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
    <div id="site-header" class="z-10 w-full bg-white dark:bg-gray-800">
      <header class="w-full lg:w-5/6">
        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    </div>
    @endif

    <!-- Page Content -->
    <main id="site-main" class="pt-4 pb-4 sm:px-6 sm:pt-6 flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900">
      <div class="w-full lg:w-5/6 mt-20 pt-2 px-4 sm:px-4 sm:pt-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        {{ $slot }}
      </div>
      {{-- paginate --}}
      @if (isset($data))
        <div id="admin-paginate" class="w-full lg:w-5/6 mt-4 px-4 dark:text-white">
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

  // handle text content editor ======================================================
  function markUp( markup ) {
    document.execCommand( markup, false );
  }
  //const textEditor = document.getElementById('editor');
  let flag = 0;
  // textEditor.addEventListener('click', function() {
  //   if(flag === 0) {
  //     textEditor.innerHTML = '';
  //     flag = 1;
  //   }
  // });
  function wipePlaceHolder(textEditorId) {
    const textEditor = document.getElementById(textEditorId);
    if(flag === 0) {
      textEditor.innerHTML = '';
      flag = 1;
    }
  }
  function updateTextarea(editorId, textareaId) {
    var editorContent = document.getElementById(editorId).innerHTML;
    //document.getElementById(textareaId).innerHTML = editorContent;
    document.querySelector('.' + textareaId).value = editorContent;
  }
  function toggleBtnBg(btnId) {
    btn = document.getElementById(btnId);
    btn.classList.toggle('dark:bg-gray-900');
    btn.classList.toggle('bg-gray-200');
  }

  // handle multitab text editor in edit-article ============================================
  function changeTab(tabNumber) {
    // Remove "selected" class from all tab buttons and hide all tab contents
    for (let i = 1; i <= 2; i++) {
        const tabBtn = document.getElementById(`tab-btn-${i}`);
        const tabContent = document.getElementById(`tab-content-${i}`);

        tabBtn.classList.remove('selected');
        tabContent.classList.add('hidden');
    }
    // Add "selected" class to the clicked tab button and show the corresponding tab content
    const clickedTabBtn = document.getElementById(`tab-btn-${tabNumber}`);
    const correspondingTabContent = document.getElementById(`tab-content-${tabNumber}`);

    clickedTabBtn.classList.add('selected');
    correspondingTabContent.classList.remove('hidden');
  }

  // =============================================================
  let prevScrollPos = document.getElementById("site-main").scrollTop;
  const header = document.getElementById("site-header");
  const scrollableDiv = document.getElementById("site-main");

  scrollableDiv.onscroll = function() {
    const currentScrollPos = scrollableDiv.scrollTop;

    if (prevScrollPos > currentScrollPos) {
        header.style.top = "65px"; /* Adjust this value based on the height of your navbar */
    } else {
        header.style.top = `-${header.offsetHeight}px`;
    }

    prevScrollPos = currentScrollPos;
  };
</script>

</html>