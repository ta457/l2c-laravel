@props([
'section' => $props['section'],
'exercises' => $props['exercises'],
'quizzes' => $props['quizzes']
])

<x-admin-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Panel / Section ID = ') }}{{ $section->id }}
        <x-header-message />
      </h2>
      <x-goback-btn href="/admin-dashboard/articles/{{ $section->article_id }}/content" />
    </div>
  </x-slot>

  <div class="bg-white dark:bg-gray-800 px-5 pb-8">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Edit section
      </h3>
    </div>

    <div class="grid gap-4 mb-4 md:grid-cols-2">
      <div>
        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created at</label>
        <input type="text" name="created_at" id="created_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $section->created_at }}" readonly>
      </div>
      <div>
        <label for="updated_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated at</label>
        <input type="text" name="updated_at" id="updated_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $section->updated_at }}" readonly>
      </div>
    </div>
    <form action="/admin-dashboard/sections/{{ $section->id }}/edit" method="POST">
      @csrf
      @method('PATCH')
    <div class="relative pb-8">
      <div class="grid gap-4 mb-4 md:grid-cols-3">
        <div>
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text" name="title" id="title"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $section->title }}" required>
        </div>

        <div>
          <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
          <input type="file" name="img" id="img"
            class="block w-full font-normal text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            value="{{ $section->img }}">
        </div>

        <div>
          <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Exercise attachment
          </label>
          <select id="exercise_id" name="exercise_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            @foreach ($exercises as $exercise)
              <option @if ($exercise->id == $section->exercise_id) @selected(true) @endif value="{{ $exercise->id }}">
                (ID:{{ $exercise->id }}) {{ $exercise->title }}
              </option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
          <input type="text" name="link" id="link"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $section->link }}">
        </div>

        <div>
          <label for="link_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
            title</label>
          <input type="text" name="link_title" id="link_title"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $section->link_title }}">
        </div>

        <div>
          <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Quiz attachment
          </label>
          <select id="quiz_id" name="quiz_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            @foreach ($quizzes as $quiz)
              <option @if ($quiz->id == $section->quiz_id) @selected(true) @endif value="{{ $quiz->id }}">
                (ID:{{ $quiz->id }}) {{ $quiz->text_content }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div id="multitab-container"
        class="w-full h-80 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        
        <div id="tabs" class="h-12 flex rounded-lg dark:bg-gray-800">
          <div id="tab-btn-1" onclick="changeTab(1)"
            class="tab-btn selected flex items-center w-36 p-2 text-primary-500 border-b border-gray-300 dark:border-gray-600 rounded-t-lg hover:cursor-pointer">
            <p class="mx-auto">Text content</p>
          </div>
          <div id="tab-btn-2" onclick="changeTab(2)"
            class="tab-btn flex items-center w-36 p-2 text-primary-500 border-b border-gray-300 dark:border-gray-600 rounded-t-lg hover:cursor-pointer">
            <p class="mx-auto">Code example</p>
          </div>
          <div class="w-full border-b border-gray-300 dark:border-gray-600 rounded-t-lg"></div>
        </div>
        <div id="tab-content" class="">
          
          <div id="tab-content-1" class="tab-content h-full p-2.5">
            {{-- text-editor needs to be passed the section id --}}
            {{-- and an array of [attribute name, attribute value, true/false] --}}
            {{-- backup: nl2br(e($section->text_content)) --}}
            @php
              $txtContentProps = ["text_content", $section->text_content, true]
            @endphp
            <x-text-editor
              :id="$section->id" 
              :for="$txtContentProps">{!! $section->text_content !!}</x-text-editor>
          </div>

          <div id="tab-content-2" class="tab-content hidden h-full p-2.5">
            @php
              $codeExampleProps = ["code_example", $section->code_example, false]
            @endphp
            <x-text-editor
              :id="$section->id" 
              :for="$codeExampleProps">{!! $section->code_example !!}</x-text-editor>
          </div>
        </div>
      </div>

      <div class="w-full flex justify-between absolute">
        <button type="submit"
          class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          Save
        </button>
      </div>
    </div>
    </form>
  </div>
</x-admin-layout>