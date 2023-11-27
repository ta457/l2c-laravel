<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = Course::with(['articles', 'exercises', 'quizzes'])
        ->whereHas('articles', function ($query) use ($user) {
            $query->whereHas('users', function ($subquery) use ($user) {
                $subquery->where('user_id', $user->id);
            });
        })
        ->orWhereHas('exercises', function ($query) use ($user) {
            $query->whereHas('users', function ($subquery) use ($user) {
                $subquery->where('user_id', $user->id);
            });
        })
        ->orWhereHas('quizzes', function ($query) use ($user) {
            $query->whereHas('users', function ($subquery) use ($user) {
                $subquery->where('user_id', $user->id);
            });
        })
        ->get();
        // $courses = Course::...->whereHas('articles', function ($query) use ($user)...)
        // ==> Select courses where there are articles that...
        // (further customise by passing $query and $user to the callback function)
        // $query->whereHas('users', function ($subquery) use ($user) {
        //     $subquery->where('user_id', $user->id);
        // });
        // ==> Select articles that related to $user->id 
        // Conclusion: Select courses where there are articles, 
        // and for each article, there are users with a specific user_id in article_user table

        $props = [
            'courses' => $courses
        ];

        return view('dashboard',  ['props' => $props]);
    }
}
