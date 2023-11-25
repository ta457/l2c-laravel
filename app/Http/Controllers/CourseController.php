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
            'courses' => Course::where('id', '!=', 1)->get(),
            'course' => $course,
            'currentArticle' => $article,
            'exercises' => Exercise::all(),
            'quizzes' => Quiz::all()
        ];
        return view('user.course', ['props' => $props]);
    }
}
