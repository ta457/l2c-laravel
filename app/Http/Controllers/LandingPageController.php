<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Subsection;

class LandingPageController extends Controller
{
    public function index()
    {
        $codeSubsection = Subsection::find(8);
        $props = [
            'subsection' => $codeSubsection
        ];
        return view('welcome', ['props' => $props]);
    }

    public function show()
    {
        $courses = Course::with('group');
        $articles = Article::with('course');
        $exercises = Exercise::with('course');
        $quizzes = Quiz::with('course');

        if(request('search')) {
            $courses
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
            $articles
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
            $exercises
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
            $quizzes->where('text_content', 'like', '%' . request('search') . '%');
        }
        $props = [
            'courses' => $courses->paginate(10),
            'articles' => $articles->paginate(10),
            'exercises' => $exercises->paginate(10),
            'quizzes' => $quizzes->paginate(10)
        ];

        return view('user.search', ['props' => $props]);
    }
}
