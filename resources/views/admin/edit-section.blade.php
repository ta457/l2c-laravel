@props([
'section' => $props['section'],
'subsections' => $props['subsections'],
'articles' => $props['articles'],
'exercises' => $props['exercises'],
'quizzes' => $props['quizzes']
])

<x-admin-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Panel / Section ID = ') }}{{ $section->id }}
        <x-header-message />
      </h2>
      <x-goback-btn href="/admin-dashboard/articles/{{ $section->article_id }}/content" />
    </div>
  </x-slot>

  <div class="bg-white dark:bg-gray-800 px-5 pb-6">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Edit section info
      </h3>
    </div>

    <div class="grid gap-4 mb-4 md:grid-cols-2">
      <div>
        <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created at</label>
        <input type="text" name="created_at" id="created_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $section->created_at }}" readonly>
      </div>
      <div>
        <label for="updated_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated at</label>
        <input type="text" name="updated_at" id="updated_at"
          class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="{{ $section->updated_at }}" readonly>
      </div>
    </div>

    {{-- section info form --}}
    <form action="/admin-dashboard/sections/{{ $section->id }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="grid gap-4 mb-4 md:grid-cols-2">
        <div>
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text" name="title" id="title"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="{{ $section->title }}" required>
        </div>
        <div>
          <label for="article_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article</label>
          <select id="article_id" name="article_id" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option selected="">Select article</option>
            @foreach ($articles as $article)
              <option @if ($article->id == $section->article_id) @selected(true) @endif value="{{ $article->id }}">{{ $article->title }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="w-full flex justify-between mt-8">
        <button type="submit"
          class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          Save
        </button>
      </div>
    </form>
  </div>


  <div class="bg-white dark:bg-gray-800 px-5 pb-6 mt-6">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Edit section content
      </h3>
    </div>

    {{-- subsection form --}}
    @php
      $tabName = ['Text','Code','Link','Image','Exercise','Quiz'];
    @endphp

    <div id="multitab-container"
      class="w-full h-fit mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:text-white">  
      <div id="tabs" class="h-12 flex rounded-lg dark:bg-gray-800">
        @php $tabCount = 1; @endphp
        @foreach ($subsections as $subsection)
          <div id="tab-btn-{{ $tabCount }}" onclick="changeTab({{ $tabCount }}, {{ $subsections->count() }})"
            class="@if ($tabCount == 1) selected @endif tab-btn flex items-center w-36 p-2 text-primary-500 border-b border-gray-300 dark:border-gray-600 rounded-t-lg hover:cursor-pointer">
            <p class="mx-auto">
              {{ $tabName[$subsection->type - 1] }}
            </p>
          </div>
          @php $tabCount += 1; @endphp
        @endforeach
        {{-- filler div && new subsection btn container --}}
        <div class="flex items-center justify-between w-full border-b border-gray-300 dark:border-gray-600 rounded-t-lg px-2.5">
          <div></div>
          <button type="button" id="createModalButton" data-modal-target="createModal" data-modal-toggle="createModal"
            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
            <svg class="h-4 w-4" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true">
              <path clip-rule="evenodd" fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
          </button>
        </div>
      </div>

      <div id="tab-content" class="">
        <!-- text-editor needs to be passed the subsection id -->
        <!-- and an array of [attribute name, attribute value, true/false] -->
        <!-- backup: nl2br(e($subsection->text_content)) -->
        @php $tabContentCount = 1; @endphp
        @foreach ($subsections as $subsection)
          <form action="/admin-dashboard/subsections/{{ $subsection->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div id="tab-content-{{ $tabContentCount }}" style="border:0px !important;"
              @if ($tabContentCount == 1)
                class="selected tab-content h-full p-2.5"
              @else
                class="hidden tab-content h-full p-2.5"
              @endif
            >
              <input type="text" name="type" id="type" value="{{ $subsection->type }}" class="hidden">
              {{-- text content tab --}}
              @if ($subsection->type == 1)
                @php
                  $txtContentProps = ["text_content",$subsection->text_content,true,"h-48"]
                @endphp
                <x-text-editor
                  :id="$tabContentCount" 
                  :for="$txtContentProps"
                >{!! $subsection->text_content !!}</x-text-editor>
              @endif

              {{-- code example tab --}}
              @if ($subsection->type == 2)
                @php
                  $txtContentProps = ["code_example",$subsection->code_example,false,"h-48"]
                @endphp
                <x-text-editor
                  :id="$tabContentCount" 
                  :for="$txtContentProps"
                >{!! $subsection->code_example !!}</x-text-editor>
              @endif

              {{-- link tab --}}
              @if ($subsection->type == 3)
                <div class="grid gap-4 mb-4 md:grid-cols-2">
                  <div>
                    <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
                    <input type="text" name="link" id="link"
                      class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                      value="{{ $subsection->link }}">
                  </div>
                  <div></div>
                  <div>
                    <label for="link_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Title</label>
                    <input type="text" name="link_title" id="link_title"
                      class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                      value="{{ $subsection->link_title }}">
                  </div>
                </div>
              @endif
              
              {{-- img tab --}}
              @if ($subsection->type == 4)
                <div class="grid gap-4 mb-4 md:grid-cols-2">
                  <div class="max-w-sm">
                    {{-- <label for="cur_img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current image</label>
                    <input type="text" name="cur_img" id="cur_img"
                      class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                      value="{{ $subsection->img }}" readonly> --}}
                    <img src="/storage/{{ $subsection->img }}" alt="subsection-img">
                  </div>
                  <div></div>
                  <div>
                    <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload new image</label>
                    <input type="file" name="img" id="img"
                      class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    >
                  </div>
                </div>
              @endif
              
              {{-- exercise tab --}}
              @if ($subsection->type == 5)
                <div>
                  <label for="exercise_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select exercise attachment</label>
                  <select id="exercise_id" name="exercise_id" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @foreach ($exercises as $exercise)
                      <option @if ($exercise->id == $subsection->exercise_id) @selected(true) @endif value="{{ $exercise->id }}">{{ $exercise->title }}</option>
                    @endforeach
                  </select>
                </div>
              @endif
              
              {{-- quiz tab --}}
              @if ($subsection->type == 6)
                <div>
                  <label for="quiz_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select quiz attachment</label>
                  <select id="quiz_id" name="quiz_id" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @foreach ($quizzes as $quiz)
                      <option @if ($quiz->id == $subsection->quiz_id) @selected(true) @endif value="{{ $quiz->id }}">{{ $quiz->text_content }}</option>
                    @endforeach
                  </select>
                </div>
              @endif

              <div class="flex gap-4 items-center mt-4">
                <button type="submit"
                  class="h-fit text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                  Save
                </button>
                <button onclick="changeDeleteFormAction('/admin-dashboard/subsections/', {{ $subsection->id }})" type="button"
                  data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                  class="h-fit text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                  Delete
                </button>
                <button type="button" onclick="clickBackwardBtn({{ $subsection->id }})"
                  class="w-full md:w-auto flex items-center justify-center py-2.5 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                  </svg>
                </button>
                <button type="button" onclick="clickForwardBtn({{ $subsection->id }})"
                  class="w-full md:w-auto flex items-center justify-center py-2.5 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                  </svg>
                </button>
              </div>
            </div>
          </form>
          @php $tabContentCount += 1; @endphp

          <form action="/admin-dashboard/subsections/{{ $subsection->id }}/backward" method="POST">
            @csrf @method('PATCH')
            <button type="submit" class="hidden" id="backward-btn-{{ $subsection->id }}"></button>
          </form>
          <form action="/admin-dashboard/subsections/{{ $subsection->id }}/forward" method="POST">
            @csrf @method('PATCH')
            <button type="submit" class="hidden" id="forward-btn-{{ $subsection->id }}"></button>
          </form>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Create modal ------------------------------ -->
  <div id="createModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create new subsection</h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-target="createModal" data-modal-toggle="createModal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="grid gap-4 sm:grid-cols-2">
          <form id="createSubsection" 
            action="/admin-dashboard/sections/{{ $section->id }}/store-subsection" method="POST">
            @csrf
            <input class="hidden" type="number" name="section_id" value="{{ $section->id }}">
            <select name="type" id="type"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            >
              <option value="">Choose a subsection type</option>
              <option value="1">Text content</option>
              <option value="2">Code example</option>
              <option value="3">Link</option>
              <option value="4">Image</option>
              <option value="5">Exercise attachment</option>
              <option value="6">Quiz attachment</option>
            </select>
            <x-form-submit-btn />
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete modal ------------------------------ -->
  <x-admin-delete-modal />
</x-admin-layout>