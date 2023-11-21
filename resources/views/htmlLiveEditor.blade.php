@props([
'html' => $props['html']
])

<x-html-editor-layout>
  <div class="flex flex-col bg-gray-200 dark:bg-gray-900 h-screen">
    <!-- Navigation Bar -->
    <nav class="p-4 bg-white dark:bg-gray-800 shadow-md">
      <div class="container mx-auto flex justify-between items-center">
        <div class="shrink-0 flex items-center">
          <a href="/">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
          </a>
          <span class="ml-4 text-2xl font-bold dark:text-white">HTML Code Runner</span>
        </div>
        <div class="flex items-center justify-items-center gap-6">
          <button id="theme-toggle" type="button"
            class="dark:border-gray-700 h-fittext-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
          </button>
          <button
            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
            onclick="runCode()">
            Run Code
          </button>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 flex gap-4 px-8">
      <!-- Left Side - HTML Code Textarea -->
      {{-- <textarea id="html-code" style="height:80vh;resize:none;"
        class="hidden w-1/2 p-4 border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-700 dark:text-white">{!! html_entity_decode($html) !!}</textarea> --}}
      <textarea id="html-code" style="height:80vh;resize:none;"
        class="w-1/2 p-4 border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-700 dark:text-white">{!! $html !!}</textarea>

      <!-- Right Side - Output Container -->
      <div id="output-container" style="height:80vh;"
        class="w-1/2 p-4 border border-gray-300 overflow-auto bg-white dark:border-gray-700">
        <!-- Output content goes here -->
      </div>
    </div>
  </div>
</x-html-editor-layout>