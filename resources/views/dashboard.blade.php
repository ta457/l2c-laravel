@props([
'courses' => $props['courses']
])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="relative h-screen">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-2xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ __("In Progress") }}
                    </div>
                    @php
                        $user = Auth::user();
                    @endphp

                    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-6 p-5">
                        @foreach($courses as $course)
                            <div class="rounded-lg border border-gray-200 dark:border-gray-500 shadow-lg">
                                @php
                                    $completedArticles = $user->articles->whereIn('course_id', $course->id)->count();
                                    $completedExercises = $user->exercises->whereIn('course_id', $course->id)->count();
                                    $completedQuizzes = $user->quizzes->whereIn('course_id', $course->id)->count();
                                    $totalArticles = $course->articles->count();
                                    $totalExercises = $course->exercises->count();
                                    $totalQuizzes = $course->quizzes->count();
                                    $percentCompleted = 100*($completedArticles + $completedExercises + $completedQuizzes) /
                                                        ($totalArticles + $totalExercises + $totalQuizzes);
                                    $percentCompleted = round($percentCompleted, 0);
                                @endphp

                                <div class="p-4 border-b border-gray-300 dark:border-gray-500">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        {{ $course->name }}
                                    </h2>
                                </div>
                                <div class="p-4 group">
                                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $percentCompleted }}%</p>
                                    <div class="w-full mt-1 h-4 border border-gray-300 dark:border-gray-500 rounded-full">
                                        <div class="rounded-full bg-emerald-500 h-full" 
                                            style="width:{{ $percentCompleted }}%;">
                                        </div>
                                    </div>
                                    <ul class="mt-4 text-gray-900 dark:text-white">
                                        <li>
                                            <span class="font-bold mr-1.5">{{ $completedArticles }}/{{$totalArticles }}</span>
                                            <span class="text-sm">Lessons completed</span>
                                        </li>
                                        <li>
                                            <span class="font-bold mr-1.5">{{ $completedExercises }}/{{ $totalExercises }}</span>
                                            <span class="text-sm">Exercises completed</span>
                                        </li>
                                        <li>
                                            <span class="font-bold mr-1.5">{{ $completedQuizzes }}/{{ $totalQuizzes }}</span>
                                            <span class="text-sm">Quizzes completed</span>
                                        </li>
                                    </ul>
                                    <div class="mt-2 flex items-center justify-between">
                                        <div></div>
                                        <a href="/courses/{{ $course->slug }}/{{ $course->articles->first()->id }}" 
                                            class="w-fit">
                                            <div class="flex gap-2 items-center group">
                                                <p class="text-sm font-semibold text-primary-600 group-hover:text-primary-500">Continue</p>
                                                <svg class="w-3.5 h-3.5 text-primary-600 group-hover:text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>