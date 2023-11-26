<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $question = str_replace('[.....]', '<input class="inline w-10 px-0 py-1" type="text" name="user_answers[]" value="" />',$exercise->text_content);
            
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
        //dd(request()->user_answers);
        $userAnswers = request()->user_answers;
        //dd($userAnswers);
        $constructedAnswer = $exercise->text_content;
        foreach ($userAnswers as $userAnswer) {
            $constructedAnswer = preg_replace('/\[\.+]/', $userAnswer, $constructedAnswer, 1);
        }
        //dd($constructedAnswer === $exercise->answer);
        $isCorrect = 0;
        if ($constructedAnswer === $exercise->answer) {
            $isCorrect = 'true';
        } else {
            $isCorrect = 'false';
        }
        //dd($message);

        // Replace [.....] with input fields contain the user answers
        $question = $exercise->text_content;
        foreach ($userAnswers as $userAnswer) {
            $inputField = '<input class="inline w-10 px-0 py-1" type="text" name="user_answers[]" value="' . $userAnswer . '" />';
            $question = preg_replace('/\[.....\]/', $inputField, $question, 1);
        }
        $props = [
            'course' => $course->load(['exercises']),
            'currentExercise' => $exercise,
            'question' => $question,
            'isCorrect' => $isCorrect
        ];
        //return redirect("/exercises/$course->slug/$exercise->id")->with($message[0],$message[1]);
        return view('user.show-exercise', ['props' => $props]);
    }
}
