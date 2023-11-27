<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function index()
    {   
        if(Auth::user()) {
            $courses = Course::with(['exercises', 'quizzes'])->get();
            $props = [
                'courses' => $courses->where('id', '!=', 1)
            ];
            return view('user.exercises', ['props' => $props]);
        } else {
            return redirect('/login')->with('failed', 'Login to do exercises and quizzes');
        }
        
    }

    public function show(Course $course, Exercise $exercise) {
        if(Auth::user()) {
            // construct the question by replacing [.....] with input fields
            $question = str_replace('[.....]', '<input style="padding: 3px 0 !important;" class="text-center inline w-8 text-gray-900" type="text" name="user_answers[]" value="" />',$exercise->text_content);
            
            $props = [
                'course' => $course->load(['exercises']),
                'currentExercise' => $exercise,
                'question' => $question
            ];
            return view('user.show-exercise', ['props' => $props]);
        } else {
            return redirect('/login')->with('failed', 'Login to do exercises and quizzes');
        }
    }

    public function store(Course $course, Exercise $exercise) {
        // get user answers from request
        $userAnswers = request()->user_answers;
        // construct the full answer by replacing [.....] with user answers 
        $constructedAnswer = $exercise->text_content;
        foreach ($userAnswers as $userAnswer) {
            $constructedAnswer = preg_replace('/\[\.+]/', $userAnswer, $constructedAnswer, 1);
        }
        // check if user answer is correct & save to exercise_user table
        $isCorrect = $constructedAnswer === $exercise->answer ? true : false;
        if ($isCorrect) {
            $user = Auth::user();
            $existingRecord = $user->finishedExercises()->where('exercise_id', $exercise->id)->first();
            if ($existingRecord) {
                $existingRecord->pivot->update(['finish' => true]);
            } else {
                $user->finishedExercises()->attach($exercise, ['finish' => true]);
            }
        }

        // replace [.....] with input fields contain the user answers
        // to keep the previous user answers after submitting
        $question = $exercise->text_content;
        foreach ($userAnswers as $userAnswer) {
            $inputField = '<input style="padding: 3px 0 !important;" class="text-center inline w-8 text-gray-900" type="text" name="user_answers[]" value="' . $userAnswer . '" />';
            $question = preg_replace('/\[.....\]/', $inputField, $question, 1);
        }

        $props = [
            'course' => $course->load(['exercises']),
            'currentExercise' => $exercise,
            'question' => $question,
            'isCorrect' => $isCorrect
        ];
        return view('user.show-exercise', ['props' => $props]);
    }
}
