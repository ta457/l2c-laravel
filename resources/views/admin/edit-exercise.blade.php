@props([
'exercise' => $props['exercise'],
'courses' => $props['courses']
])
@php 
  $dashboardUrl = '';
  $headline = '';
  if(Auth::user()->role == 1) {
    $dashboardUrl = '/admin-dashboard';
    $headline = 'Admin';
  } else if(Auth::user()->role == 2) {
    $dashboardUrl = '/editor-dashboard';
    $headline = 'Editor';
  }
@endphp
<x-admin-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __($headline . ' Panel / Exercise ID = ') }}{{ $exercise->id }}
        <x-header-message />
      </h2>
      <x-goback-btn href="{{ $dashboardUrl }}/exercises" />
    </div>
  </x-slot>

  <!-- Update modal -->
  {{-- <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->

  </div> --}}
  <div class="bg-white dark:bg-gray-800 px-5 pb-8">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Update Exercise 
      </h3>
    </div>
    <!-- Modal body -->
    <div class="grid gap-4 mb-4 md:grid-cols-2">
      <div>
        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created at</label>
        <input type="text" name="created_at" id="created_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $exercise->created_at }}" readonly>
      </div>
      <div>
        <label for="updated_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated at</label>
        <input type="text" name="updated_at" id="updated_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $exercise->updated_at }}" readonly>
      </div>
    </div>
    <form action="{{ $dashboardUrl }}/exercises/{{ $exercise->id }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="grid gap-4 mb-4 md:grid-cols-2">
        <div>
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text" name="title" id="title"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $exercise->title }}" required>
        </div>
        <div>
          <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
          <select id="course_id" name="course_id" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            @foreach ($courses as $course)
              <option @if ($course->id == $exercise->course_id) @selected(true) @endif value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="sm:col-span-2">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <input type="description" name="description" id="description"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $exercise->description }}" required>
        </div>
        <div class="sm:col-span-2">
          <label for="text_content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Exercise content. Use ..... (5 dots) to represent the missing parts
          </label>
          <textarea id="text_content" name="text_content" rows="3" style="resize: none;"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            placeholder="{{ '.....href="https://www.w3schools.com">This is a link.....' }}">{{ $exercise->text_content }}</textarea>
        </div>
        <div class="sm:col-span-2">
          <label for="answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Answer
          </label>
          <textarea id="answer" name="answer" rows="3" style="resize: none;"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            placeholder="{{ '<a href="https://www.w3schools.com">This is a link</a>' }}">{{ $exercise->answer }}</textarea>
        </div>
      </div>
      <button type="submit"
        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        Save
      </button>
    </form>
  </div>
</x-admin-layout>