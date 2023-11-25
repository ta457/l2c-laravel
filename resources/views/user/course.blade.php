@props([
'courses' => $props['courses'],
'course' => $props['course'],
'currentArticle' => $props['currentArticle'],
'exercises' => $props['exercises'],
'quizzes' => $props['quizzes']
])

<x-main-page-layout>
  <div class="md:grid" style="grid-template-columns: 16rem 1fr;">
    <div class="w-64">
      <x-user-sidebar :heading="$course->name">
        @foreach ($course->articles as $article)
        <x-user-sidebar-item active="{{ $currentArticle->id == $article->id }}"
          href="/courses/{{ $course->slug }}/{{ $article->id }}" text="{{ $article->title }}" />
        @endforeach
      </x-user-sidebar>
    </div>

    <div class="w-full">
      <x-home-header />

      <section class="bg-white dark:bg-gray-900">
        <div class=" max-w-screen-xl px-5 py-6 mx-auto md:mx-2 lg:gap-8 xl:gap-0">
          <div class="mr-auto place-self-center">

            @foreach ($currentArticle->sections as $section)
            <div class="border-b dark:border-gray-500 pb-8 flex flex-col gap-5">
              {{-- section header --}}

              {{-- section title --}}
              <div class="flex items-center justify-between">
                <h1 class="text-3xl dark:text-white">{{ $section->title }}</h1>
              </div>

              {{-- section content (subsections) --}}
              @foreach ($section->subsections as $subsection)

                @if ($subsection->type == 1)
                  <div class="dark:text-white">
                    {!! $subsection->text_content !!}
                  </div>
                @endif

                @if ($subsection->type == 3)
                  <div>
                    <a class="flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                      href="{{ $subsection->link }}">
                      @if ($subsection->link_title)
                      {{ $subsection->link_title }}
                      @else
                      Link
                      @endif
                    </a>
                  </div>
                @endif

                @if ($subsection->type == 2)
                  {{-- <div class="bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg py-6 px-4">
                    <p class="text-xl mb-4">Example</p>
                    <div class="p-2 bg-white dark:bg-gray-900 border-l-4 border-primary-500">{!! $subsection->code_example
                      !!}</div>
                    <a class="mt-4 flex items-center w-fit justify-between text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                      href="/code-example/{{ $subsection->id }}">
                      Try this code
                    </a>
                  </div> --}}
                  <x-content-code-example 
                    title="Example" 
                    :content="$subsection->code_example" 
                    :id="$subsection->id"
                    btnText="Try this code" />
                @endif

                @if ($subsection->type == 4)
                  <div class="mb-4">
                    <img class="lg:max-w-2xl" src="/storage/{{ $subsection->img }}" alt="section_img">
                  </div>
                @endif

                @if ($subsection->type == 5)
                  @php
                  $exercise = $exercises->find($subsection->exercise_id);
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

                @if ($subsection->type == 6)
                  @php
                  $quiz = $quizzes->find($subsection->quiz_id);
                  @endphp
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
                      href="/quiz/{{ $quiz->id }}">
                      Try this quiz
                    </a>
                  </div>
                @endif

              @endforeach
            </div>
            @endforeach

          </div>
        </div>
      </section>

      <x-home-footer />
    </div>
  </div>
</x-main-page-layout>