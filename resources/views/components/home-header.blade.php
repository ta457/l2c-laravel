<header>
  <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
    <div
      @if (Str::contains(request()->route()->uri,'courses'))
        class="flex flex-wrap justify-between items-center max-w-screen-xl"
      @else
        class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl"
      @endif
      >
      <div class="flex items-center">
        {{-- toggle sidebar btn --}}
        @if (Str::contains(request()->route()->uri,'courses'))
          <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
            aria-controls="default-sidebar" type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
              </path>
            </svg>
          </button>
        @endif 

        <a href="/" class="flex items-center">
          <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
          <span class="ml-2 self-center text-xl font-bold whitespace-nowrap dark:text-white">Learn2Code</span>
        </a>
      </div>
      <div class="flex items-center lg:order-2">
        @if (!Auth::user())
        <a href="/register"
          class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
          Sign up
        </a>
        <a href="/login"
          class="hidden sm:block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Log in
        </a>
        @else
        <div class="flex items-center">
          <!-- Settings Dropdown -->
          <a class="text-sm font-semibold py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
            href="/dashboard">
            My Dashboard
          </a>
          <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-nav-avatar />
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                  <div>{{ Auth::user()->name }}</div>

                  <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                </button>
              </x-slot>

              <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                  {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                          this.closest('form').submit();">
                    {{ __('Log Out') }}
                  </x-dropdown-link>
                </form>
              </x-slot>
            </x-dropdown>
          </div>
        </div>
        @endif

        <button data-collapse-toggle="mobile-menu-2" type="button"
          class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="mobile-menu-2" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
          <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>

      <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
        <ul class="flex flex-col items-center mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
          <li class="w-full">
            <a href="/" @if ( !Str::contains(request()->route()->uri,'tutorials') &&
              !Str::contains(request()->route()->uri,'exercises') &&
              !Str::contains(request()->route()->uri,'html-editor') &&
              !Str::contains(request()->route()->uri,'courses')
              )
              class="block py-2 pr-4 pl-3 text-gray-900 rounded bg-blue-700 lg:bg-transparent lg:text-blue-700 lg:p-0
                dark:text-white text-white"
              @else
              class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400
                lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
                dark:border-gray-700"
              @endif
              aria-current="page">Home</a>
          </li>
          <li class="w-full">
            <a href="/tutorials" 
              @if (Str::contains(request()->route()->uri,'tutorials') ||
                Str::contains(request()->route()->uri,'courses')
              )
              class="hover:cursor-pointer block py-2 pr-4 pl-3 text-gray-900 rounded bg-blue-700 lg:bg-transparent
                lg:text-blue-700 lg:p-0 dark:text-white text-white"
              @else
              class="hover:cursor-pointer block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400
                lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
                dark:border-gray-700"
              @endif
              aria-current="page">Tutorials</a>
          </li>
          <li class="w-full">
            <a href="/exercises" @if (Str::contains(request()->route()->uri,'exercises'))
              class="hover:cursor-pointer block py-2 pr-4 pl-3 text-gray-900 rounded bg-blue-700 lg:bg-transparent
                lg:text-blue-700 lg:p-0 dark:text-white text-white"
              @else
              class="hover:cursor-pointer block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400
                lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
                dark:border-gray-700"
              @endif
              aria-current="page">Exercises</a>
          </li>

          <li class="w-full">
            <a href="/html-editor" @if (Str::contains(request()->route()->uri,'html-editor'))
              class="hover:cursor-pointer block py-2 pr-4 pl-3 text-gray-900 rounded bg-blue-700 lg:bg-transparent
                lg:text-blue-700 lg:p-0 dark:text-white text-white"
              @else
              class="hover:cursor-pointer block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50
                lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400
                lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
                dark:border-gray-700"
              @endif
              aria-current="page">CodeEditor</a>
          </li>

          <li class="w-full flex items-center gap-4">
            <x-theme-toggle-btn />
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>