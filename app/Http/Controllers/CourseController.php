<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show(Course $course, Article $article) {
        $props = [
            'course' => $course->load(['exercises', 'quizzes']),
            'currentArticle' => $article->load('sections.subsections')
        ];

        return view('user.course', ['props' => $props]);
    }

    public function store(Course $course, Article $article) {
        // if user mark this article as completed
        $user = Auth::user();
        $existingRecord = $user->articles()->where('article_id', $article->id)->first();
        if (!$existingRecord) {
            $user->articles()->attach($article);
        }

        $props = [
            'course' => $course->load(['exercises', 'quizzes']),
            'currentArticle' => $article->load('sections.subsections')
        ];
        return view('user.course', ['props' => $props]);
    }

    public function delete(Course $course, Article $article) {
        Auth::user()->articles()->detach($article);
        return redirect("/courses/$course->slug/$article->id");
    }
}
