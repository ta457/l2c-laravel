@if (isset($props))
  @props([
    'subsection' => $props['subsection']
  ])
@endif

<x-html-editor-layout>
  <div class="flex flex-col bg-gray-200 dark:bg-gray-900 h-screen">
    <!-- Navigation Bar -->
    <x-home-header />

    <div class="mt-6 mb-2 grid grid-cols-2">
      <div class="justify-self-end px-2">
        @if(isset($subsection))
        <a href="/courses/{{ $subsection->section->article->course->slug }}/{{ $subsection->section->article->id }}" 
          style="margin-right:5px"
          class="w-fit text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          Back to lesson
        </a>
        @endif
        <button
          class="w-fit text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
          onclick="runCode()">
          Run Code
        </button>
      </div>
    </div>
    <!-- Main Content -->
    <div class="container mx-auto flex gap-4 px-8">
      <!-- Left Side - HTML Code Textarea -->
      {{-- <textarea id="html-code" style="height:80vh;resize:none;"
        class="hidden w-1/2 p-4 border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-700 dark:text-white">{!! html_entity_decode($html) !!}</textarea>
      --}}
      <textarea class="w-1/2 p-4 border border-gray-300 bg-white dark:bg-gray-700 dark:border-gray-700 dark:text-white"
        id="html-code" style="height:80vh;resize:none;"
        placeholder=
'// Write CSS code between <style></style> tag

<style>
  p {
    color: red;
  }
</style>

// Create an HTML element

<p id="text" onclick="changeText()">Hello World!</p>

// Write JavaScript code between <script></script> tag

<script>
  function changeText() {
    document.getElementById("text").textContent = "text changed!";
  }
</script>

// Then, hit the "Run Code" button to see the result'
      >@if (isset($subsection)) {!! $subsection->code_example !!} @endif</textarea>

      <!-- Right Side - Output Container -->
      <div id="output-container" style="height:80vh;"
        class="w-1/2 p-4 border border-gray-300 overflow-auto bg-white dark:border-gray-700">
        <!-- Output content goes here -->
      </div>
    </div>
  </div>
</x-html-editor-layout>