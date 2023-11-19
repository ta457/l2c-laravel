@props([
'article' => $props['article'],
'courses' => $props['courses']
])

<x-admin-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Panel / Article ID = ') }}{{ $article->id }}
        <x-header-message />
      </h2>
      <x-goback-btn href="/admin-dashboard/articles" />
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
        Update Article 
      </h3>
    </div>
    <!-- Modal body -->
    <div class="grid gap-4 mb-4 md:grid-cols-2">
      <div>
        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created at</label>
        <input type="text" name="created_at" id="created_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $article->created_at }}" readonly>
      </div>
      <div>
        <label for="updated_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated at</label>
        <input type="text" name="updated_at" id="updated_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $article->updated_at }}" readonly>
      </div>
    </div>
    <form action="/admin-dashboard/articles/{{ $article->id }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="grid gap-4 mb-4 md:grid-cols-2">
        <div>
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text" name="title" id="title"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $article->title }}" required>
        </div>
        <div>
          <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
          <select id="course_id" name="course_id" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option selected="">Select course</option>
            @foreach ($courses as $course)
              <option @if ($course->id == $article->course_id) @selected(true) @endif value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="sm:col-span-2">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <input type="description" name="description" id="description"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $article->description }}" required>
        </div>
      </div>
      
      <div class="w-full flex justify-between">
        <button type="submit"
          class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          Save
        </button>
        <a href="/admin-dashboard/articles/{{ $article->id }}/content" 
          class="flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
          View article content
          <svg class="h-3.5 w-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
          </svg>
        </a>
      </div>
    </form>
  </div>
</x-admin-layout>