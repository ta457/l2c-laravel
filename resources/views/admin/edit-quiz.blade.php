@props([
'quiz' => $props['quiz'],
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
        {{ __($headline . ' Panel / Quiz ID = ') }}{{ $quiz->id }}
        <x-header-message />
      </h2>
      <x-goback-btn href="{{ $dashboardUrl }}/quizzes" />
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
        Update Quiz 
      </h3>
    </div>
    <!-- Modal body -->
    <div class="grid gap-4 mb-4 md:grid-cols-2">
      <div>
        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created at</label>
        <input type="text" name="created_at" id="created_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $quiz->created_at }}" readonly>
      </div>
      <div>
        <label for="updated_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated at</label>
        <input type="text" name="updated_at" id="updated_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $quiz->updated_at }}" readonly>
      </div>
    </div>
    <form action="{{ $dashboardUrl }}/quizzes/{{ $quiz->id }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="grid gap-4 mb-4 md:grid-cols-2">
        <div>
          <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
          <select id="course_id" name="course_id" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            @foreach ($courses as $course)
              <option @if ($course->id == $quiz->course_id) @selected(true) @endif value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label for="answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Correct answer
          </label>
          <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            name="answer" id="answer">
            <option @if ($quiz->answer == 1) @selected(true) @endif value="1">Choice 1</option>
            <option @if ($quiz->answer == 2) @selected(true) @endif value="2">Choice 2</option>
            <option @if ($quiz->answer == 3) @selected(true) @endif value="3">Choice 3</option>
          </select>
        </div>
        <div class="sm:col-span-2">
          <label for="text_content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Quiz content
          </label>
          <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            id="text_content" name="text_content" rows="2" style="resize: none;"
          >{{ $quiz->text_content }}</textarea>
        </div>
        <div class="sm:col-span-2">
          <label for="choice_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Correct choice
          </label>
          <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            id="choice_1" name="choice_1" rows="2" style="resize: none;"
          >{{ $quiz->choice_1 }}</textarea>
        </div>
        <div class="sm:col-span-2">
          <label for="choice_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Wrong choice 1
          </label>
          <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            id="choice_2" name="choice_2" rows="2" style="resize: none;"
          >{{ $quiz->choice_2 }}</textarea>
        </div>
        <div class="sm:col-span-2">
          <label for="choice_3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Wrong choice 2
          </label>
          <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
            id="choice_3" name="choice_3" rows="2" style="resize: none;"
          >{{ $quiz->choice_3 }}</textarea>
        </div>
      </div>
      <button type="submit"
        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        Save
      </button>
    </form>
  </div>
</x-admin-layout>