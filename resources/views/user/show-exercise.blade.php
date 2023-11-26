@props([
'course' => $props['course'],
'currentExercise' => $props['currentExercise'],
'question' => $props['question'],
'isCorrect' => $props['isCorrect'] ?? null
])
<x-main-page-layout>
  <div class="md:grid" style="grid-template-columns: 16rem 1fr;">
    <div class="w-64">
      <x-user-sidebar :heading="$course->name">
        @php
          $count = 1;
        @endphp
        @foreach ($course->exercises as $exercise)
          <x-user-sidebar-item active="{{ $currentExercise->id == $exercise->id }}"
            href="/exercises/{{ $course->slug }}/{{ $exercise->id }}" text="Exercise {{ $count }}" />
          @php $count += 1; @endphp
        @endforeach
      </x-user-sidebar>
    </div>

    <div class="w-full">
      <x-home-header />

      <section class="bg-white dark:bg-gray-900">
        <div class=" max-w-screen-xl p-6 mx-auto md:mx-2 lg:gap-8 xl:gap-0" style="min-height: 41rem;">
          <div class="mr-auto place-self-center">
            
            <div class="mt-6 flex items-center justify-between">
              <h1 class="text-3xl dark:text-white">
                {{ $currentExercise->title }}
                @if ($isCorrect == 'true')
                  <p class="inline text-emerald-500 md:inline md:ml-8">Correct</p>
                @elseif ($isCorrect == 'false')
                  <p class="inline text-rose-500 md:inline md:ml-8">Wrong</p>
                @endif
              </h1>
            </div>

            <p class="mt-6 text-gray-900 dark:text-white">
              {{ $currentExercise->description }}
            </p>

            <form action="/exercises/{{ $course->slug }}/{{ $currentExercise->id }}" method="post">
              @csrf
              <div style="min-height: 10rem;" 
                class="flex flex-col justify-between mt-6 p-4 w-full bg-gray-200 dark:bg-gray-700 rounded-lg">

                {{-- <input type="text" class=""
                  name="correct-answer" id="correct-answer" 
                  value="{{ $currentExercise->answer }}"
                > --}}
                <p class="text-gray-900 dark:text-white hidden" id="exercise-answer">
                  <strong>Answer:</strong> {{ $currentExercise->answer }}
                </p>
              
                <p class="text-gray-900 dark:text-white">{!! $question !!}</p>

                <button type="button" onclick="showAnswer()" id="show-answer-btn"
                  class="self-end w-fit flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  Show Answer
                </button>
              </div>

              <button class="mt-4 w-fit text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Submit Answer
              </button>
            </form>
          </div>
        </div>
      </section>

      <x-home-footer />
    </div>
  </div>
</x-main-page-layout>