<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Quiz;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function show(Course $course, Article $article) {
        $props = [
            'course' => $course->load(['exercises', 'quizzes']),
            'currentArticle' => $article->load('sections.subsections')
        ];

        return view('user.course', ['props' => $props]);
    }
}
