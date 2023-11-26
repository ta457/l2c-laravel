<div class="dark:bg-gray-700 dark:text-white bg-gray-200 rounded-lg py-6 px-4">
  <p class="text-xl mb-4">Quiz</p>
  <p class="mb-2">{!! nl2br(e($quiz->text_content)) !!}</p>
  <div
    class="text-gray-900 dark:bg-gray-900 dark:text-white p-2 bg-white border-l-4 border-primary-500 flex flex-col gap-2">
    <div>
      <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_1"
        name="quiz_{{ $quiz->id }}" value="1">
      <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_1">{{ $quiz->choice_1 }}</label><br>
    </div>
    <div>
      <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_2"
        name="quiz_{{ $quiz->id }}" value="2">
      <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_2">{{ $quiz->choice_2 }}</label><br>
    </div>
    <div>
      <input class="dark:bg-gray-700" type="radio" id="quiz_{{ $quiz->id }}_choice_3"
        name="quiz_{{ $quiz->id }}" value="3">
      <label class="ml-2" for="quiz_{{ $quiz->id }}_choice_3">{{ $quiz->choice_3 }}</label>
    </div>
  </div>
  <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
    href="/quizzes/{{ $quiz->course->slug }}/{{ $quiz->id }}">
    Try this quiz
  </a>
</div>