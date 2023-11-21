{{-- section id is passed into buttons id to make them unique (so the js code in admin-layout can work) --}}
{{-- the 1st and 2nd array value is used to name the textarea and filled its value --}}
{{-- the 3rd value is to decide to allow bold/italic/underline --}}
{{-- {!! nl2br(e($for[1])) !!} --}}
<div class="mt-2">
  {{-- hidden textarea - its value will be submited --}}
  <label for="{{ $for[0].'-'.$id }}" class="hidden text-sm font-medium text-gray-900 dark:text-white"></label>
  <textarea id="{{ $for[0].'-'.$id }}" rows="4" name="{{ $for[0] }}"
    class="formTextarea_{{ $for[0].'-'.$id }} hidden block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  
  >{!! nl2br(e($for[1])) !!}</textarea>

  {{-- bold/italic/underline toggle btns --}}
  @if ($for[2])
  <button id="bold-btn-{{ $id }}"
    class="py-2 px-3 text-sm font-medium text-gray-500 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
    type="button" onclick="markUp('bold'); toggleBtnBg('bold-btn-{{ $id }}')">
    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 14 16">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M3 1h4.5a3.5 3.5 0 1 1 0 7H3m0-7v7m0-7H1m2 7h6.5a3.5 3.5 0 1 1 0 7H3m0-7v7m0 0H1" />
    </svg>
  </button>
  <button id="italic-btn-{{ $id }}"
    class="py-2 px-3 text-sm font-medium text-gray-500 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
    type="button" onclick="markUp('italic'); toggleBtnBg('italic-btn-{{ $id }}')">
    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 14 16">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m3.874 15 6.143-14M1 15h6.33M6.67 1H13" />
    </svg>
  </button>
  <button id="underline-btn-{{ $id }}"
    class="py-2 px-3 text-sm font-medium text-gray-500 rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
    type="button" onclick="markUp('underline'); toggleBtnBg('underline-btn-{{ $id }}')">
    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 16 20">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 1v9.5a4.5 4.5 0 1 1-9 0V1M1 1h4m5 0h4M1 19h14" />
    </svg>
  </button>
  @else
  <div class="h-4"></div>
  @endif

  {{-- editor div --}}
  <div contenteditable="true" id="editor-{{ $for[0].'-'.$id }}" 
    {{-- onclick="wipePlaceHolder('editor-{{ $for[0] }}')"  --}}
    oninput="updateTextarea('editor-{{ $for[0].'-'.$id }}', 'formTextarea_{{ $for[0].'-'.$id }}')"
    class="mt-2 overflow-auto h-48 block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
    >{{ $slot }}
  </div>
</div>