<aside id="default-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
  aria-label="Sidenav">
  <div class="overflow-y-auto px-2 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="shrink-0 flex items-center py-4 mb-2">
      <p class="ml-2 text-2xl font-semibold text-gray-600 dark:text-gray-200">
        {{ $heading }}
      </p>
    </div>
    
    <ul class="space-y-2">
      {{ $slot }}
    </ul>
  </div>
</aside>