@props([
'course' => $props['course'],
'currentArticle' => $props['currentArticle']
])
<x-main-page-layout>
  <div class="md:grid" style="grid-template-columns: 16rem 1fr;">
    <div class="w-64">
      <x-user-sidebar :heading="$course->name">
        @foreach ($course->articles as $article)
          @php
            $completed = false;
            if(Auth::user()) {
              $completed = Auth::user()->articles->contains('id', $article->id);
            }
          @endphp
          <x-user-sidebar-item 
            active="{{ $currentArticle->id == $article->id }}"
            href="/courses/{{ $course->slug }}/{{ $article->id }}" 
            text="{{ $article->title }}"
            :completed="$completed" />
        @endforeach
      </x-user-sidebar>
    </div>

    <div class="w-full">
      <x-home-header />

      <section class="bg-white dark:bg-gray-900">
        <div class=" max-w-screen-xl p-6 mx-auto md:mx-2 lg:gap-8 xl:gap-0" style="min-height: 41rem;">
          <div class="mr-auto place-self-center">
            @php
              $hasContent = $currentArticle->sections->count() != 0;
            @endphp
            @if (!$hasContent)
              <div class="flex items-center justify-between">
                <h1 class="text-3xl dark:text-white">
                  This article don't have any content yet.
                </h1>
              </div>
            @else
              @foreach ($currentArticle->sections as $section)
                <div class="border-b dark:border-gray-500 pb-8 flex flex-col gap-5">
                  {{-- section header --}}

                  {{-- section title --}}
                  <div class="mt-6 flex items-center justify-between">
                    <h1 class="text-3xl dark:text-white">{{ $section->title }}</h1>
                  </div>

                  {{-- section content (subsections) --}}
                  @foreach ($section->subsections as $subsection)

                    @if ($subsection->type == 1)
                      <x-content-text :data="$subsection"/>
                    @endif

                    @if ($subsection->type == 3)
                      <x-content-link :data="$subsection" />
                    @endif

                    @if ($subsection->type == 2)
                      <x-content-code-example 
                        title="Example" 
                        :content="$subsection->code_example" 
                        :id="$subsection->id"
                        btnText="Try this code" />
                    @endif

                    @if ($subsection->type == 4)
                      <x-content-img :img="$subsection->img" />
                    @endif

                    @if ($subsection->type == 5)
                      @php
                        $exercise = $course->exercises->find($subsection->exercise_id);
                      @endphp
                      <x-content-exercise :exercise="$exercise" />
                    @endif

                    @if ($subsection->type == 6)
                      @php
                        $quiz = $course->quizzes->find($subsection->quiz_id);
                      @endphp
                      <x-content-quiz :quiz="$quiz" />
                    @endif

                  @endforeach
                </div>
              @endforeach
            @endif
          </div>

          <div class="flex items-center justify-between mt-6">
            <div></div>
            @if($hasContent && Auth::user())
              @if (Auth::user()->articles->contains('id', $currentArticle->id))
                <form action="/courses/{{ $course->slug }}/{{ $currentArticle->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                    class="w-fit flex items-center gap-2 justify-center p-4 text-sm font-medium text-white focus:outline-none bg-emerald-600 rounded-lg border border-gray-200 hover:bg-emerald-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    Completed
                  </button>
                </form>
              @else
                <form action="/courses/{{ $course->slug }}/{{ $currentArticle->id }}" method="POST">
                  @csrf
                  <button type="submit" class="w-fit flex items-center justify-center p-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Mark Complete
                  </button>
                </form>
              @endif
            @endif
          </div>
        </div>
      </section>
      
      <x-home-footer />
    </div>
  </div>
</x-main-page-layout>