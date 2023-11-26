@props([
'course' => $props['course'],
'currentArticle' => $props['currentArticle']
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
        <div class=" max-w-screen-xl p-6 mx-auto md:mx-2 lg:gap-8 xl:gap-0" style="min-height: 41rem;">
          <div class="mr-auto place-self-center">
            @if ($currentArticle->sections->count() == 0)
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
        </div>
      </section>

      <x-home-footer />
    </div>
  </div>
</x-main-page-layout>