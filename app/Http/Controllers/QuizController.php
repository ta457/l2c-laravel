<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show(Course $course, Quiz $quiz) {
        if(Auth::user()) {
            
            $props = [
                'course' => $course->load(['quizzes']),
                'currentQuiz' => $quiz
            ];
            return view('user.show-quiz', ['props' => $props]);
        } else {
            return redirect('/login')->with('failed', 'Login to do exercises and quizzes');
        }
    }

    public function store(Course $course, Quiz $quiz) {
        // check if user answer is correct & save to quiz_user table
        $isCorrect = request()->answer*1 === $quiz->answer ? true : false;
        if ($isCorrect) {
            $user = Auth::user();
            $existingRecord = $user->finishedQuizzes()->where('quiz_id', $quiz->id)->first();
            if ($existingRecord) {
                $existingRecord->pivot->update(['finish' => true]);
            } else {
                $user->finishedQuizzes()->attach($quiz, ['finish' => true]);
            }
        }
        $props = [
            'course' => $course->load(['quizzes']),
            'currentQuiz' => $quiz,
            'isCorrect' => $isCorrect,
            'oldAnswer' => request()->answer
        ];
        return view('user.show-quiz', ['props' => $props]);
    }
}
