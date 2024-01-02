@props([
'exercises' => $props['exercises'],
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
<x-admin-layout :data="$exercises">
  {{-- Page header ----------------------------------------------------------- --}}
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __($headline . ' Panel / Exercises') }} 
      <x-header-message />
    </h2>
  </x-slot>

  {{-- Table header ---------------------------------------------------------- --}}
  <x-admin-table-header action="{{ $dashboardUrl }}/exercises">
    <select name="course_id"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      <option @if (request('course_id')==0) @selected(true) @endif value="0">All</option>
      @foreach ($courses as $course)
      <option value="{{ $course->id }}" @if (request('course_id')==$course->id)
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
    <x-admin-table-body action='{{ $dashboardUrl }}/exercises' :heads="['ID','Title','Course','Description']">
      <tbody>
        @foreach ($exercises as $exercise)
        <tr class="border-b dark:border-gray-700">
          <td class="px-4 py-3">
            <input
              class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
              type="checkbox" name="selected[]" value="{{ $exercise->id }}">
          </td>
          <td class="px-4 py-3">
            {{ $exercise->id }}
          </td>
          <th scope="row" class="px-4 py-3 font-medium text-gray-900 dark:text-white">
            {{ $exercise->title }}
          </th>
          <td class="px-4 py-3">
            {{ $exercise->course->name }}
          </td>
          <td class="px-4 py-3">
            {{ $exercise->description }}
          </td>
          <x-admin-table-dropdown action='{{ $dashboardUrl }}/exercises' :id="$exercise->id" />
        </tr>
        @endforeach
      </tbody>
    </x-admin-table-body>
  </div>

  <!-- Create Group modal ------------------------- -->
  <x-admin-create-modal action="{{ $dashboardUrl }}/exercises" header="Create new exercise">
    {{-- modal form input fields --}}
    <div>
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
      <input type="text" name="title" id="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="HTML basic" required>
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
        placeholder="Fill in the missing code to complete the markup of the HTML hyperlink" required>
    </div>
    <div class="sm:col-span-2">
      <label for="text_content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Exercise content. Use ..... (5 dots) to represent the missing parts
      </label>
      <textarea id="text_content" name="text_content" rows="3" style="resize: none;"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
        placeholder="{{ '.....href="https://www.w3schools.com">This is a link.....' }}"></textarea>
    </div>
    <div class="sm:col-span-2">
      <label for="answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Answer
      </label>
      <textarea id="answer" name="answer" rows="3" style="resize: none;"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
        placeholder="{{ '<a href="https://www.w3schools.com">This is a link</a>' }}"></textarea>
    </div>
  </x-admin-create-modal>

  <!-- Delete modal ------------------------------ -->
  <x-admin-delete-modal />
  <x-admin-delete-all-modal />

</x-admin-layout>