@props([
'article' => $props['article'],
'sections' => $props['sections'],
'exercises' => $props['exercises'],
'quizzes' => $props['quizzes']
])

<x-admin-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Panel / Article ID = ') }}{{ $article->id }}
        <x-header-message />
      </h2>
      <x-goback-btn href="/admin-dashboard/articles/{{ $article->id }}" />
    </div>
  </x-slot>

  <div class="bg-white dark:bg-gray-800 px-5 pb-8">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Article Content
      </h3>
    </div>

    @foreach ($sections as $section)
    <div class="border-b pb-8 flex flex-col gap-5">
      <div class="pt-2 text-gray-400 dark:text-white text-sm flex justify-between items-center">
        <p>Section ID = {{ $section->id }}</p>
        <a href="/admin-dashboard/sections/{{ $section->id }}/edit"
          class="rounded-lg flex items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
          <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
          </svg>
          Edit section
        </a>
      </div>
      
      @if ($section->title)
        <div class="text-3xl dark:text-white">{{ $section->title }}</div>
      @endif
      
      @if ($section->text_content)
        <div class="dark:text-white">
          {!! $section->text_content !!}
        </div>
      @endif
      
      @if ($section->link)
        <div>
          <a class="flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
            href="{{ $section->link }}">
            @if ($section->link_title)
              {{ $section->link_title }}
            @else
              Link
            @endif
          </a>
        </div>
      @endif
      
      @if ($section->code_example)
        <div class="bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg py-6 px-4">
          <p class="text-xl mb-4">Example</p>
          <div class="p-2 bg-white dark:bg-gray-900 border-l-4 border-primary-500">
            {{-- {!! nl2br(e($section->code_example)) !!} --}}
           {!! $section->code_example !!}
          </div>
          <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
            href="/code-example/{{ $section->id }}">
            Try this code
          </a>
        </div>
      @endif
      
      @if ($section->img)
        <div class="mb-4">
          <img class="lg:max-w-2xl" src="{{ $section->img }}" alt="section_img">
        </div>
      @endif

      @if ($section->exercise_id)
        @php
          $exercise = $exercises->find($section->exercise_id);
        @endphp
        <div class="bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg py-6 px-4 mb-4">
          <p class="text-xl mb-4">Exercise</p>
          <p class="mb-2">{{ $exercise->title }}</p>
          <div class="text-gray-900 dark:bg-gray-900 dark:text-white p-2 bg-white border-l-4 border-primary-500">
            <p>{{ $exercise->description }}</p>
            <p>{!! nl2br(e($exercise->text_content)) !!}</p>
          </div>
          <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
            href="/exercise/{{ $exercise->id }}">
            Try this exercise
          </a>
        </div>
      @endif

      @if ($section->quiz_id)
        @php
          $quiz = $quizzes->find($section->quiz_id);
        @endphp
        <div class="dark:bg-gray-700 dark:text-white bg-gray-200 rounded-lg py-6 px-4">
          <p class="text-xl mb-4">Quiz</p>
          <p class="mb-2">{!! nl2br(e($quiz->text_content)) !!}</p>
          <div class="text-gray-900 dark:bg-gray-900 dark:text-white p-2 bg-white border-l-4 border-primary-500 flex flex-col gap-2">      
            <div>
              <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_1" name="quiz_{{ $quiz->id }}" value="1">
              <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_1">{{ $quiz->choice_1 }}</label><br>
            </div>
            <div>
              <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_2" name="quiz_{{ $quiz->id }}" value="2">
              <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_2">{{ $quiz->choice_2 }}</label><br>
            </div>
            <div>
              <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_3" name="quiz_{{ $quiz->id }}" value="3">
              <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_3">{{ $quiz->choice_3 }}</label>
            </div>
          </div>
          <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
            href="/quiz/{{ $quiz->id }}">
            Try this quiz
          </a>
        </div>
      @endif

    </div>
    @endforeach
  </div>
</x-admin-layout>