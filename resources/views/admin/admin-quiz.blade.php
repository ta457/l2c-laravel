@props([
'quizzes' => $props['quizzes'],
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
<x-admin-layout :data="$quizzes">
  {{-- Page header ----------------------------------------------------------- --}}
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __($headline . ' Panel / Quizzes') }} 
      <x-header-message />
    </h2>
  </x-slot>

  {{-- Table header ---------------------------------------------------------- --}}
  <x-admin-table-header action="{{ $dashboardUrl }}/quizzes">
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
    <x-admin-table-body action='{{ $dashboardUrl }}/quizzes' :heads="['ID','Course','Content','Choice 1', 'Choice 2', 'Choice 3','Answer']">
      <tbody>
        @foreach ($quizzes as $quiz)
        <tr class="border-b dark:border-gray-700">
          <td class="px-4 py-3">
            <input
              class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
              type="checkbox" name="selected[]" value="{{ $quiz->id }}">
          </td>
          <td class="px-4 py-3">
            {{ $quiz->id }}
          </td>
          <td class="px-4 py-3">
            {{ $quiz->course->name }}
          </td>
          <td class="px-4 py-3">
            {{ $quiz->text_content }}
          </td>
          <td class="px-4 py-3">
            {{ $quiz->choice_1 }}
          </td>
          <td class="px-4 py-3">
            {{ $quiz->choice_2 }}
          </td>
          <td class="px-4 py-3">
            {{ $quiz->choice_3 }}
          </td>
          <td class="px-4 py-3">
            {{ $quiz->answer }}
          </td>
          <x-admin-table-dropdown action='{{ $dashboardUrl }}/quizzes' :id="$quiz->id" />
        </tr>
        @endforeach
      </tbody>
    </x-admin-table-body>
  </div>

  <!-- Create Group modal ------------------------- -->
  <x-admin-create-modal action="{{ $dashboardUrl }}/quizzes" header="Create new quiz">
    {{-- modal form input fields --}}
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
    <div>
      <label for="answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Correct answer
      </label>
      <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        name="answer" id="answer">
        <option value="1">Choice 1</option>
        <option value="2">Choice 2</option>
        <option value="3">Choice 3</option>
      </select>
    </div>
    <div class="sm:col-span-2">
      <label for="text_content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Quiz content
      </label>
      <textarea id="text_content" name="text_content" rows="2" style="resize: none;"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
        placeholder="What does HTML stand for?"></textarea>
    </div>
    <div class="sm:col-span-2">
      <label for="correct_choice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Choice 1
      </label>
      <textarea id="correct_choice" name="choice_1" rows="2" style="resize: none;"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
        placeholder="Hyper Text Markup Language"></textarea>
    </div>
    <div class="sm:col-span-2">
      <label for="w_choice_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Choice 2
      </label>
      <textarea id="w_choice_1" name="choice_2" rows="2" style="resize: none;"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
        placeholder="Hyperlinks and Text Markup Language"></textarea>
    </div>
    <div class="sm:col-span-2">
      <label for="w_choice_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Choice 3
      </label>
      <textarea id="w_choice_2" name="choice_3" rows="2" style="resize: none;"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
        placeholder="Home Tool Markup Language"></textarea>
    </div>
  </x-admin-create-modal>

  <!-- Delete modal ------------------------------ -->
  <x-admin-delete-modal />
  <x-admin-delete-all-modal />

</x-admin-layout>