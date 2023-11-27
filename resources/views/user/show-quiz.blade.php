@props([
'course' => $props['course'],
'currentQuiz' => $props['currentQuiz'],
'isCorrect' => $props['isCorrect'] ?? null,
'oldAnswer' => $props['oldAnswer'] ?? null
])
<x-main-page-layout>
  <div class="md:grid" style="grid-template-columns: 16rem 1fr;">
    <div class="w-64">
      <x-user-sidebar :heading="$course->name">
        @php
          $count = 1;
        @endphp
        @foreach ($course->quizzes as $quiz)
          @php
            $completed = Auth::user()->finishedQuizzes->contains('id', $quiz->id);
          @endphp
          <x-user-sidebar-item 
            active="{{ $currentQuiz->id == $quiz->id }}"
            href="/quizzes/{{ $course->slug }}/{{ $quiz->id }}" 
            text="Quiz {{ $count }}"
            :completed="$completed"/>
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
                Quiz
                @if (!is_null($isCorrect) && $isCorrect == true)
                  <p class="inline font-semibold text-emerald-500 md:inline md:ml-8">Correct</p>
                @elseif (!is_null($isCorrect) && $isCorrect == false)
                  <p class="inline font-semibold text-rose-500 md:inline md:ml-8">Not Correct</p>
                @endif
              </h1>
            </div>

            <p class="mt-6 text-gray-900 dark:text-white">
              {{ $currentQuiz->text_content }}
            </p>

            <form action="/quizzes/{{ $course->slug }}/{{ $currentQuiz->id }}" method="post">
              @csrf
              @php
                $quizChoices = [$currentQuiz->choice_1,$currentQuiz->choice_2,$currentQuiz->choice_3];
              @endphp
              <div style="min-height: 10rem;" 
                class="flex flex-col justify-between mt-6 p-4 w-full bg-gray-200 dark:bg-gray-700 rounded-lg">

                {{-- <input type="text" class=""
                  name="correct-answer" id="correct-answer" 
                  value="{{ $currentQuiz->answer }}"
                > --}}
                <p class="mb-4 text-gray-900 dark:text-white hidden" id="exercise-answer">
                  <strong class="dark:text-yellow-100">Answer:</strong> {{ $quizChoices[$currentQuiz->answer - 1] }}
                </p>
              
                <div>
                  <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $currentQuiz->id }}_choice_1"
                    name="answer" value="1"
                    @if (!is_null($oldAnswer) && $oldAnswer == 1)
                      @checked(true)
                    @endif>
                  <label class="text-gray-900 dark:text-white ml-2" for="quiz_{{ $currentQuiz->id }}_choice_1">{{ $currentQuiz->choice_1 }}</label><br>
                </div>
                <div>
                  <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $currentQuiz->id }}_choice_2"
                    name="answer" value="2"
                    @if (!is_null($oldAnswer) && $oldAnswer == 2)
                      @checked(true)
                    @endif>
                  <label class="text-gray-900 dark:text-white ml-2" for="quiz_{{ $currentQuiz->id }}_choice_2">{{ $currentQuiz->choice_2 }}</label><br>
                </div>
                <div>
                  <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $currentQuiz->id }}_choice_3"
                    name="answer" value="3"
                    @if (!is_null($oldAnswer) && $oldAnswer == 3)
                      @checked(true)
                    @endif>
                  <label class="text-gray-900 dark:text-white ml-2" for="quiz_{{ $currentQuiz->id }}_choice_3">{{ $currentQuiz->choice_3 }}</label>
                </div>

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