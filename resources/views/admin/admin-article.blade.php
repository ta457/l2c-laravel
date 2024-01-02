@props([
'articles' => $props['articles'],
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
<x-admin-layout :data="$articles">
  {{-- Page header ----------------------------------------------------------- --}}
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __($headline . ' Panel / Articles') }} 
        <x-header-message />
    </h2>
  </x-slot>

  {{-- Table header ---------------------------------------------------------- --}}
  <x-admin-table-header action="{{ $dashboardUrl }}/articles">
    <select name="course_id"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      <option @if (request('course_id') == 0) @selected(true) @endif  value="0">All</option>
      @foreach ($courses as $course)
        <option value="{{ $course->id }}"
          @if (request('course_id') == $course->id)
            @selected(true)  
          @endif  
        >
          {{ $course->name }}
        </option>
      @endforeach
    </select>
  </x-admin-table-header>

  {{-- Table body ------------------------------------------------------------ --}}
  <div class="overflow-x-auto">
    <x-admin-table-body action='{{ $dashboardUrl }}/articles' :heads="['ID','Title','Course','Description']">
      <tbody>
        @foreach ($articles as $article)
        <tr class="border-b dark:border-gray-700">
          <td class="px-4 py-3">
            <input class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" 
              type="checkbox" name="selected[]" value="{{ $article->id }}">
          </td>
          <td class="px-4 py-3">
            {{ $article->id }}
          </td>
          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $article->title }}
          </th>
          <td class="px-4 py-3">
            {{ $article->course->name }}
          </td>
          <td class="px-4 py-3">
            {{ $article->description }}
          </td>
          <x-admin-table-dropdown action='{{ $dashboardUrl }}/articles' :id="$article->id">
            <li>
              <a href="{{ $dashboardUrl }}/articles/{{ $article->id }}/content"
                class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17v1a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2M6 1v4a1 1 0 0 1-1 1H1m13.14.772 2.745 2.746M18.1 5.612a2.086 2.086 0 0 1 0 2.953l-6.65 6.646-3.693.739.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                </svg>
                Edit content
              </a>
            </li>
          </x-admin-table-dropdown>
        </tr>
        @endforeach
      </tbody>
    </x-admin-table-body>
  </div>

  <!-- Create Group modal ------------------------- -->
  <x-admin-create-modal action="{{ $dashboardUrl }}/articles" header="Create new article">
    {{-- modal form input fields --}}
    <div>
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
      <input type="text" name="title" id="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="VueJS Introduction" required>
    </div>
    <div>
      <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
      <select id="course_id" name="course_id" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        <option selected="">Select course</option>
        @foreach ($courses as $course)
          <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="sm:col-span-2">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
      <input type="description" name="description" id="description"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Type article description here" required>
    </div>
  </x-admin-create-modal>

  <!-- Delete modal ------------------------------ -->
  <x-admin-delete-modal />
  <x-admin-delete-all-modal />
</x-admin-layout>